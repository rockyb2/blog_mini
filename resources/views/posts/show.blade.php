@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="w-screen bg-[#EEF0F6]">
        <h2 class="text-3xl font-bold uppercase text-center pt-2">{{ $post->title }}</h2>
        <div class="flex justify-center items-center py-4">
            <div class="w-[400px] h-[400px]">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-center rounded-lg shadow-xl">
            </div>
        </div>
        </div>
        <p class="text-center">Publié par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y') }}</p>
        <div class="px-28">
            <p>{!! $post->content !!}</p>
        </div>
        @auth
            @if(Auth::id()===$post->user_id)
            <div class="flex justify-center mt-4">
                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
@endsection
