<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
public function index(){
    // $posts = Post::all();
    $posts = Post::paginate(1);
    return view('post.index', compact('posts'));
    //? Para enviar datos del controlador a las vistas con el método compact
}

public function create(){
    return view('post.create');
}

public function store(StorePost $request){
    // * Validacion del formulario, que los datos no queden vacios

    // // $post = new Post();

    // // $post->title = $request->title;
    // // $post->category = $request->category;
    // // $post -> content = $request ->content;

    // // $post -> save();
    $post = Post::create($request->all());
    return redirect()
            -> route('post.show', $post);
}

public function show($id){
    try {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}
public function edit(Post $post){
    return view('post.edit', compact('post'));
}

public function update(UpdatePost $request, Post $post){
    // // $post->title = $request->title;
    // // $post->category = $request->category;
    // // $post->content = $request->content;
    // // $post->save();
    $post->update($request->all());
    return redirect() -> route('post.show', $post);
}

public function destroy(Post $post){
    $post->delete();
    return redirect() -> route('post.index');
}
}
