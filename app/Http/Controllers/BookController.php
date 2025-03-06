<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
            'genre' => 'nullable|string',
            'pages' => 'required|integer|min:1',
        ]);
    
        // Criando o registro no banco
        $book = Book::create($validatedData);
            return redirect()->intended('/browse_books');
        // Retornando resposta de sucesso
        // return response()->json([
        //     'message' => 'Livro cadastrado com sucesso!',
        //     'data' => $book
        // ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view ('browse_books', [
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontrar o livro pelo ID
        $book = Book::findOrFail($id);

        // Deletar o livro
        $book->delete();

        // Redirecionar para a lista de livros com uma mensagem de sucesso
        return redirect()->route('browse_books');
    }
}
