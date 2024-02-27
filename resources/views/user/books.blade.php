<x-layout>
    <h1>Ciao {{auth()->user()->name}}</h1>
    <div class="container">
        <div class="row">
            @foreach ($books as $chiave => $book )
                
            
            <x-card
            :titolo="$book['title']"
            :creato="$book['created_at']"
            :genere="$book['genre']"
            :immagine="Storage::url($book['image'])">
            

            </x-card>
            <a href="{{route('books.edit', ['book'=>$book])}}" class="btn btn-primary" >Edit</a>
            <form action="{{route('books.destroy',['book'=>$book])}}" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-danger">Delete</a>
            </form>
            @endforeach
        </div>
    </div>
</x-layout>