<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books=book::all();
        $books=Book::simplePaginate(10);
        return view("book.index",compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.addbook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',

        ]);
        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => Auth::id(),

        ]);

        return redirect()->route('book.index')
                        ->with('status','New book Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // using policy
        Gate::authorize('view',$book);
        return view('book.viewbook',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // $books = book::findOrFail($book->id);
        return view('book.updatebook',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
          // using policy
          Gate::authorize('update',$book);
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
        ]);
        // $books =book::where('id',$book)
        // ->update([
        //     'title' => $request->title,
        //     'price' => $request->price,
        //     'user_id' => Auth::id(),
        $book->update([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('book.index')
        ->with('status','Book  Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // using policy
        Gate::authorize('delete',$book);
        // $books=Book::find($book);
        $book->delete();
        return redirect()->route('book.index')
        ->with('status','Book Data Deleted Successfully.');
    }
}
