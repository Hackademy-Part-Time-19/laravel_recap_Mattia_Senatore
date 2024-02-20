<x-layout>
    <div class="container">
        <div class="row">
            
                
            
            <x-cards
            :titolo="$book['title']"
            :creato="$book['created_at']"
            :genere="$book['genre']"
            :immagine="Storage::url($articolo['image'])">
            

            </x-cards>
            
         
        </div>
    </div>
</x-layout>
