@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('layout')

@section('title', 'Liste des Articles')

@section('content')
    <div class="flex h-screen w-full justify-center items-center bg-cover bg-center bg-stone-100" >
        <div>
            <h1 class="text-4xl font-bold">Bienvenue sur Tech_Africa</h1>
        <p class="text-2xl ">Toutes les nouveauté , innovations technologiques d'un continent en constante évolution</p>
        </div>

    </div>

    <h2 class="m-2 text-3xl font-bold"> Articles à la une</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach($posts as $post)
            <div class="bg-white p-4 shadow rounded">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-[300px]">
                <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
                <p>{{ $post->created_at->format('d/m/Y') }}</p>
            </div>
        @endforeach
    </div>
@endsection
