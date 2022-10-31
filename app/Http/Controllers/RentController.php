<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentdetail;
use App\Models\User;
use App\Models\Book;

class RentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('admin')->except('show');
        $this->middleware('client')->only('show');
        $this->middleware('backhistory');
    }


    // returns all rent detail of db
    public function index() {

        $sql = Rentdetail::paginate(15);
        return view('rent/indexRent', compact('sql'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // function to register books/users at RentDetail on DB
    public function store(Request $request) {


        $userGetCode = User::where('uniqueCode', $request->uniqueCode)->first();

        $userGetBook = Rentdetail::where('user', $request->uniqueCode)
            ->where('active', '=', 1)->first();


        if (!($userGetCode)) {
            return redirect()->back()->with('danger', 'User doesnt exist!');
        }
        if ($userGetBook) {
            return redirect()->back()->with('danger', 'User has an active pending!');
        }


        Rentdetail::create([
            'rentDate' => $request->rentDate,
            'expirationDate' => $request->expirationDate,
            'book' => $request->id,
            'user' => $request->uniqueCode,
            'active' => 1
        ]);


        $bookAvaliable = Book::find($request->id);
        $bookAvaliable->quantity = $bookAvaliable->quantity - 1;
        $bookAvaliable->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // function to redirect to current book which user is reading
    public function show($uniqueCode) {


        $rent = Rentdetail::where('user', $uniqueCode)
            ->where('active', 1)
            ->first();


        if ($rent == null) {
            return redirect()->back()->with('danger', 'You dont have permission to login!');
        }
        $user = $rent->user()->get()->first();

        $books = $rent->books()->get()->first();

        if ($user && $books) {
            return view('rent/showRent', compact('rent', 'user', 'books'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // function to redirect to form to make renovation 
    public function edit($id) {

        $sql = Rentdetail::where('id', $id)->first();


        if (empty($sql->renovationDate) && $sql->active == 1) {
            return view('rent/renovate', compact('sql'));
        } else {
            return redirect()->back()->with('danger', 'User isnt active or already renewed');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // function to update Rentdetail and make a renovation date (direct on database).
    public function update(Request $request, $id) {
        $sql = Rentdetail::find($id);

        $sql->renovationDate = $request->renovationDate;
        $sql->save();
        return redirect()->route('rent.index');
    }


    // function to deactive current user rent
    public function deactive($id) {
        $deactive = Rentdetail::find($id);

        if ($deactive->active == 0) {
            return redirect()->back()->with('danger', 'Registry has already been deactivated !');
        } else {
            $sql = Book::find($deactive->book);

            $sql->quantity = $sql->quantity + 1;

            $sql->save();
            $deactive->active = 0;
            $deactive->save();
            return redirect()->back();
        }
    }


    // function to search box on website
    public function searchRent() {

        $search_text = $_GET['query'];


        $rent = Rentdetail::where('rentDate', 'like', '%' . $search_text . '%')
            ->orWhere('expirationDate', 'like', '%' . $search_text . '%')
            ->orWhere('user', 'like', '%' . $search_text . '%')
            ->paginate(10);



        return view('rent.searchRent', compact('rent'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
