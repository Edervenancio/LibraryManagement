<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('client')->only('show');
        $this->middleware('backhistory');
    }


    // auth for login
    public function auth(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (auth()->user()->access) {
                if (auth()->user()->level) {
                    return redirect()->route('books.index');
                } else {
                    $data = User::where('email', $request->email)->first();
                    return redirect()->route('users.show', [$data]);
                }
            } else {
                return redirect()->back()->with('danger', 'You dont have permission to login!');
            }
        } else {
            return redirect()->back()->with('danger', 'Email or password incorrect');
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // function to register user
    public function store(Request $request) {
        $sql = User::where('cpf', $request->cpf)->orWhere('email', $request->email)->first();

        if (
            Str::contains($request->cpf, "_", "__", "___") ||
            Str::contains($request->phone, "_", "__", "___", "_____")
        ) {
            return redirect()->back()->with('danger', 'CPF or phone number invalid');
        }

        if ($request->password == $request->rpassword) {
            if ($sql) {
                return redirect()->back()->with('danger', 'The user has already been registered!');
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'birth' => $request->birth,
                    'cpf' => $request->cpf,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'password' => bcrypt($request->password),
                    'access' => 1,
                    'uniqueCode' => time() . Str::random(10)
                ]);
            }
        } else {
            return redirect()->back()->with('danger', 'Password doesnt match!');
        }

        return view('user/login')->with('success', 'The user has already been registered!');
    }



    // function to redirect the user to form
    public function create() {
        return view('user/registerUser');
    }


    // function to show user page after login
    public function show($data) {
        $sql = User::find($data);
        return view('user/index', compact('sql'));
    }


    public function logoff(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
