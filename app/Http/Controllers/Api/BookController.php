<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAll(){
        return Book::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return response()->json(['message'=>'Book Created Successfully'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $book = Book::find($id);

        if($book)
            return $book;
        else
            return response()->json(['message'=>'Book Not found'],404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        // ]);
        $book = Book::find($id);
        $book->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        if($book)
            return response()->json(['message'=>'Book Updated Successfully'],200);
        else
            return response()->json(['message'=>'Book Not found'],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id)->delete();
        return response()->json(['message'=>'Book Deleted Successfully'],200);
    }
}