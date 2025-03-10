@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-lg">
                <div class="card-header  text-white">
                    Welcome, {{ Auth::user()->name }}                        
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        @if(Auth::user()->image != "")
                            <img src="{{ asset('uploads/profile/thumb/'.Auth::user()->image) }}" class="img-fluid rounded-circle" alt="Luna John">                            
                        @endif
                    </div>
                    <div class="h5 text-center">
                        <strong>{{ Auth::user()->name }} </strong>
                        <p class="h6 mt-2 text-muted">5 Reviews</p>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-lg mt-3">
                <div class="card-header  text-white">
                    Navigation
                </div>
                <div class="card-body sidebar">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @include('layouts.message')
            <div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Books
                    </div>
                    <div class="card-body pb-0">      
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>            
                            <div class="d-flex">
                                <form action="" method="get">
                                    <input type="text" class="form-control" placeholder="Keyword">
                                    <button type="submit" class="'btn btn-primary ms-2">Search</button>
                                </form>
                                </div>
                        </div> 

                        <table class="table  table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th width="150">Action</th>
                                </tr>
                                <tbody>
                                    @if ($books->isNotEmpty())
                                        @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>3.0 (3 Reviews)</td>
                                            <td>
                                                @if ($book->status == 1)
                                                <span class="text-success">Active</span>
                                                @else
                                                <span class="text-danger">Block</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5">
                                                Books not found
                                            </td>
                                        </tr>
                                    @endif
                               </tbody>
                            </thead>
                        </table>   
                        @if ($books->isNotEmpty())
                            {{ $books->links() }}
                        @endif 
                    </div>
                    
                </div>                
            </div>
        </div>               
    </div>       
</div>
@endsection
<div class="solar-accordion">
    <button class="accordion-head">
        <div class="inneraccordion-head">
            <div class="search-icon">
                <p>Q</p>
            </div>
            <span>Is Arlington a solar-friendly area?</span>
        </div>
        <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel-faq">
        <p>A. Yes, Arlington is a solar-friendly area. The higher officials offer various incentives and rebate programs to make the city affordable for residents. There are 19 local incentives and rebates available. Moreover, Federal tax credits and property tax exemptions are also available. </p>
    </div>    
</div> 
 