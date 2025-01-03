@extends('layout')

@section('title', 'Modifier l\'Article')

@section('content')
    <div class="w-screen bg-[#EEF0F6]">
        <h2 class="text-3xl font-bold uppercase text-center pt-2">Modifier l'Article</h2>
        <div class="flex justify-center items-center py-4">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Titre:</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image:</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Contenu:</label>
                    <textarea name="content" id="content" class="w-full p-2 border border-gray-300 rounded">{{ $post->content }}</textarea>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
                    <a href="{{ route('posts.show', $post->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/866e475cwfrqyccns2j3t1vfkdhf7loc2i9iimrkg9tm1vlh/tinymce/7/tinymce.min.js referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endsection
