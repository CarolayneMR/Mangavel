<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'  => 'required|string|max:255',
            'author'   => 'required|string|max:255',
            'genres' => 'nullable|string',
            'pages' => 'required|integer|min:1',
        ]);
    
        $validatedData['user_id'] = Auth::id();

        $book = Book::create($validatedData);
            return redirect()->intended('/browse_books');
    }

    public function show()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('browse_books', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('edit_book', compact('book'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genres' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($id);


        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genres' => $request->genres,
            'pages' => $request->pages,
        ]);

        return redirect()->route('browse_books')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {

        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('browse_books');
    }
}
