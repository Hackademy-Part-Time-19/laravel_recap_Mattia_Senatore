<x-layout>
    <div class="container">
        <div class="row">
            @foreach ($books as $chiave => $book )
                
            
            <x-cards
            :titolo="$book['title']"
            :creato="$book['created_at']"
            :genere="$book['genre']"
            :immagine="Storage::url($book['image'])">
            

            </x-cards>
            
            @endforeach
        </div>
    </div>
</x-layout>