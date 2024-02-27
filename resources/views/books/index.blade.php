<x-layout>
    <div class="container">
        <div class="row">
            @foreach ($books as $chiave => $book )
                
            
            <x-card
            :titolo="$book['title']"
            :creato="$book['created_at']"
            :genere="$book['genre']"
            :immagine="Storage::url($book['image'])">
            

            </x-card>
            
            @endforeach
        </div>
    </div>
</x-layout>