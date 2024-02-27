<x-layout>
    <select name="genre" id="genre">
        @foreach ($genres as $genre)
        <option value="{{'genre'}}">{{$genre->name}}</option>
        @endforeach
    </select>
</x-layout>
