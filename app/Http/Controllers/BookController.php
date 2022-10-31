<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $sql = Book::paginate(12);
        return view('books.index', compact('sql'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function to redirect to books form
    public function create() {
        return view('books.createBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // function to create new books, registering on DB
    public function store(Request $request) {
        $file = $request->hasFile('imageUrl');

        if ($file) {
            //            $newFile = $request->file('imageUrl');

            //          $request->imageUrl->move(public_path('/images'), $newFile);

            $imageName =  time()  . rand(0, 500000) . $request->imageUrl->getClientOriginalExtension();
            $request->imageUrl->move(public_path('/images'), $imageName);

            Book::create([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'imageUrl' => $imageName
            ]);
        }



        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Function to GET books, and atribute it to user
    public function show($id) {



        $sql = Book::find($id);

        if ($sql->quantity < 1) {
            return redirect()->back()->with('danger', 'We dont have enough book!');
        }

        return view('books.showBook')->with('sql', $sql);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // function to modify books attributes
    public function edit($id) {

        $sql = Book::where('id', $id)->first();
        return view('books.editBook', ['sql' => $sql]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $file = $request->hasFile('imageUrl');


        $bookUpdate = Book::find($id);

        if (!empty($request)) {
            if ($file) {
                $imageName = Str::random(3) . time() . '.' . Str::random(40) . $request->imageUrl->getClientOriginalExtension();
                $request->imageUrl->move(public_path('/images'), $imageName);
                $bookUpdate->name = $request->name;
                $bookUpdate->description = $request->description;
                $bookUpdate->category = $request->category;
                $bookUpdate->price = $request->price;
                $bookUpdate->quantity = $request->quantity;
                $bookUpdate->imageUrl = $imageName;
                $bookUpdate->save();
            } else {
                $bookUpdate->name = $request->name;
                $bookUpdate->description = $request->description;
                $bookUpdate->category = $request->category;
                $bookUpdate->price = $request->price;
                $bookUpdate->quantity = $request->quantity;
                $bookUpdate->save();
            }
        }



        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Book::find($id)->delete();
        return redirect()->route('books.index');
    }

    public function logoff(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function searchBook() {

        $search_text = $_GET['query'];


        $book = Book::where('name', 'like', '%' . $search_text . '%')
            ->orWhere('category', 'like', '%' . $search_text . '%')
            ->paginate(12);


        return view('books.searchBook', compact('book'));
    }
}
