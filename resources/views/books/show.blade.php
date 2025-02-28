@extends('layouts.app')

@section('content')
<h1>{{ $book->title }}</h1>
<p>Author: {{ $book->author }}</p>
<p>Genre: {{ $book->genre }}</p>
<p>{{ $book->description }}</p>

<h2>Reviews</h2>
@foreach($book->reviews as $review)
    <p>{{ $review->rating }} ⭐ - {{ $review->review_text }}</p>
@endforeach

@if(auth()->check())
    <form action="{{ route('books.reviews.store', $book) }}" method="POST">
        @csrf
        <label for="rating">Rating:</label>
        <input type="number" name="rating" min="1" max="5" required>
        <textarea name="review_text" required></textarea>
        <button type="submit">Submit Review</button>
    </form>
@endif
@endsection
