<x-layout>
    <x-success></x-success>
      <form action="{{route('books.update', ['book'=>$book]) }}"  method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <h1>Aggiorna il libro {{$book->title}}</h1>
          <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input name="title" type="text" class="form-control" id="title" value={{old('title',$book->title)}} >
            </div>
            @error('title')<span class="text-danger">{{ $message }}</span> @enderror
          <div class="mb-3">
            <label for="publication" class="form-label">Anno di pubblicazione</label>
            <input name="publication" type="text" class="form-control" id="publication" value={{old('publication',$book->publication)}}>
          </div>
          @error('publication')<span class="text-danger">{{ $message }}</span> @enderror
          <div class="mb-3">
            <label for="genre" class="form-label">Genere</label>
            <input name="genre" type="text" class="form-control" id="genre" value={{old('genre',$book->genre)}}>
          </div>
          @error('genre')<span class="text-danger">{{ $message }}</span> @enderror
          <div class="mb-3">
          
          <input name="image" type="file" class="form-control" id="image" value={{old('genre_id')}}>
          </div>
          <button name="submit" class="btn btn-primary">Invia</button>
        </form>
  </x-layout>
