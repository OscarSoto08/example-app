@extends('layouts.app')

@section('title', $post -> title)

@section('content')
<a href="{{route('post.index')}}">Volver</a>
{{-- <h1>Aquí se mostrará el post: <?= $post ?></h1> --}}
<h1>Aquí se mostrará el post: {{$post -> title}}</h1>
{{-- <h1>Aquí se mostrará el post: <?php echo $post ?></h1> --}}
<p><strong>Contenido: </strong>{{$post -> content}}</p>
<p><strong>Categoria: </strong>{{$post -> category}}</p>
<div class="form-group">
    <a class="btn btn-warning mb-3" href="{{route('post.edit', $post)}}">Editar post</a>
<form action="{{route('post.destroy', $post)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Borrar</button>
</form>
</div>
@endsection
