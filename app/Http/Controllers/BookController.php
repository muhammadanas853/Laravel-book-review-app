<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'published_year' => 'required|integer',
            'description' => 'nullable',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        $coverImage = null;
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'description' => $request->description,
            'published_year' => $request->published_year,
            'cover_image' => $coverImage
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
}
