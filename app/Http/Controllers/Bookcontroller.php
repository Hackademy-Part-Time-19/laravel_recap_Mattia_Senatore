<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        public function homepage(){
            return view('welcome');
        }
    
       
    
        public function index(){
            
    
            $books=Book::all();
            return view('books.index',compact('books'));
        }
    
        public function show(){
            //$books=Book::find($id);
            //return view('bookid', ['books' => $books]);
        }
    
        public function byGenre($genre){
            $booksByGenres = Book::where('genre_id', $genre)->get();
    
            return view('ByGenre', ['books'=>$booksByGenres]);
        }
    
        public function create(){
            
            $genres=Genre::all();
            return view('books.create', compact('genres'));
        }
        
        
        public function store(BookRequest $request){
            
            $validated = $request->validated();
            
            $book = Book::create(['user_id'=>auth()->user()->id,'title'=>$validated['title'],'genre'=>$validated['genre'],'publication'=>$validated['publication']]);
            
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate();
        $book->update(['title'=>$validated['title'],'genre'=>$validated['genre'],'publication'=>$validated['publication']]);

        return redirect()->back()->with(['success','Aggiornato libro con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }

    public function userBooks(User $user){
        
        $books = auth()->user()->books;
        return view('user.books',compact('books'));

    }
}
