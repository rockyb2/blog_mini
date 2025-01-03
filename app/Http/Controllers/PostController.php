<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
{
    $posts = Posts::orderBy('created_at','desc')->get(); // Récupère tous les articles
    return view('posts.index', compact('posts'));
}
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath ?? null,
            'user_id' => Auth::id(), // Assurez-vous que l'utilisateur est authentifié
        ]);

        return redirect()->route('posts.index')->with('success', 'Article créé avec succès.');

    }
    public function edit($id)
{
    $post = Posts::findOrFail($id);
    return view('posts.edit', compact('post'));
}


public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Posts::findOrFail($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }
            // Télécharger la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Article mis à jour avec succès.');
    }


public function show($id)
{
    $post = Posts::findOrFail($id);
    return view('posts.show', compact('post'));
}
public function destroy($id)
{
    $post = Posts::findOrFail($id);
    if ($post->image) {
        Storage::delete('public/' . $post->image);
    }
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès.');
}

}
