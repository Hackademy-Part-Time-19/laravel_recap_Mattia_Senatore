<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class Bookcontroller extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    

    public function index(){
        

        $books=Book::all();
        return view('booklist',compact('books'));
    }

    public function show($id){
        $books=Book::find($id);
        return view('bookid', ['books' => $books]);
    }

    public function byCategory($category){
        $booksByCategories = Book::where('category', $category)->get();

        return view('booksBycategory', ['books'=>$booksByCategories]);
    }

    public function create(){
        
        
        return view('bookcreate');
    }
    
    
    public function store(BookRequest $request){
        
        $validated = $request->validated();
        
        $book = Book::create(['title'=>$validated['title'],'genre'=>$validated['genre'],'publication'=>$validated['publication']]);
        
        if($request->hasFile('image')){
            
            $path = 'public/images';
            $name = $book['id'].'copertina'.'.'.$request->file('image')->extension();
            $file = $request->file('image')->storeAs($path,$name);
            $image = $path . '/' . $name;
            $book->image= $image;
            $book->save(); 
        }
        
        return redirect()->back()->with('success','Libro creato con successo');
    }
}
