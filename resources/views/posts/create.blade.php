@extends('layout')

@section('title', 'Créer un Nouvel Article')

@section('content')
<div class="p-4">
    <h2 class="text-center text-3xl text-slate-700">Créer un Nouvel Article</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Titre:</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded">
        </div>
         <!-- Image -->
         <div>
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required>
            @error('image')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700">Contenu:</label>
            <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Publier</button>
    </form>
</div>


    <script src="https://cdn.tiny.cloud/1/866e475cwfrqyccns2j3t1vfkdhf7loc2i9iimrkg9tm1vlh/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endsection
