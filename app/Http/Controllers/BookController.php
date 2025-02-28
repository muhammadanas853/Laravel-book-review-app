<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::orderBy('created_at','DESC')->paginate(3);
        
        return view('books.list',[
            'books' => $books
        ]);
    }
    public function create(){
        return view('books.create');
    }
    public function store(Request $request){
        $rules = [
            'title' => 'required|min:5',
            'author' => 'required|min:3',
            'status' => 'required'
        ];
        if(!empty($request->image)){
            $rules['image'] = 'image';
        }
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('books.create')->withInput()->withErrors($validator);
        }

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->status = $request->status;
        $book->save();

        if(!empty($request->image)){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/books'),$imageName);
            
            $book->status = $request->status;
            $book->save();

            $manager = new ImageManager(Driver::class);
            $img = $manager->read(public_path('uploads/books/' . $imageName));
            
            $img->resize(990);
            $img->save(public_path('uploads/books/thumb/'.$imageName));
        }
        return redirect()->route('books.index')->with('success','Book Added sucessfully.');
        
    }
    public function edit(){
        
    }
    public function update(){
        
    }
    public function destory(){
        
    }
}
