<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function yandex(Request $request)
    {
        $tableBook = new Book;
        $tableBook->title = $request->input('title');
        $tableBook->description = $request->input('description');

        $tableBook->save();
    }

    public function spandex()
    {
        $book = Book::all();
        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'successsfully create book',
            'data' => $book
        ]);
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return response()->json([
            'message' => 'successsfully delete book',
        ]);
    }

    public function update(Request $request,$id)
    {
        //
        $book = Book::find($id);
        $book->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'successsfully update book',
            'data' => [
                $book
            ]
        ]);
    }

}



