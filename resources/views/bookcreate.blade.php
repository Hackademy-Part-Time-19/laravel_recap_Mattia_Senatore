<x-layout>
    <form action="{{route('books.store') }}"  method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" type="text" class="form-control" id="title" value={{old('title')}} >
          </div>
          @error('title')<span class="text-danger">{{ $message }}</span> @enderror
        <div class="mb-3">
          <label for="publication" class="form-label">Anno di pubblicazione</label>
          <input name="publication" type="text" class="form-control" id="publication" value={{old('publication')}}>
        </div>
        @error('publication')<span class="text-danger">{{ $message }}</span> @enderror
        <div class="mb-3">
          <label for="genre" class="form-label">Genere</label>
          <input name="genre" type="text" class="form-control" id="genre" value={{old('genre')}}>
        </div>
        @error('genre')<span class="text-danger">{{ $message }}</span> @enderror
        <div class="mb-3">
        
        <input name="image" type="file" class="form-control" id="image" value={{old('genre')}}>
        </div>
        <button name="submit" class="btn btn-primary">Invia</button>
      </form>
</x-layout>