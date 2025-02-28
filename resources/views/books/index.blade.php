@extends('layouts.app')

@section('content')
<h1>All Books</h1>
@foreach($books as $book)
    <div>
        <h2><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></h2>
        <p>Author: {{ $book->author }}</p>
        <p>Genre: {{ $book->genre }}</p>
    </div>
@endforeach
@endsection
