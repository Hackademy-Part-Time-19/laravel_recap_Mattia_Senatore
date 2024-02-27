<x-layout>
    <x-success></x-success>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" type="text" class="form-control" id="title" value={{ old('title') }}>
        </div>
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="publication" class="form-label">Anno di pubblicazione</label>
            <input name="publication" type="text" class="form-control" id="publication"
                value={{ old('publication') }}>
        </div>
        @error('publication')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="genre" class="form-label">Genere</label>
            <input name="genre" type="text" class="form-control" id="genre" value={{ old('genre') }}>
        </div>
        @error('genre')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="mb-3">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
              @foreach ($genres as $genre)
                    <input name="genres[]" type="checkbox" class="btn-check" id="btncheck1{{$genre->id}}" autocomplete="off" value="genre_id">
                <label class="btn btn-outline-primary" for="btncheck1{{$genre->id}}">{{$genre->name}}</label>
              @endforeach
              

            </div>


            <input name="image" type="file" class="form-control" id="image" value={{ old('genre_id') }}>
        </div>
        <button name="submit" class="btn btn-primary">Invia</button>
    </form>
</x-layout>
