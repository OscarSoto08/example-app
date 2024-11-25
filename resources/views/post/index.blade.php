@extends('layouts.app')

@section('title', 'Todos los post')

@section('content')
<h1>Bienvenido a la página de inicio</h1>
<a href="{{ route('post.create')}}">Crear post</a>
@foreach ($posts as $post)
<li><a href="{{route('post.show', $post -> id)}}">{{$post -> title}}</a></li>
@endforeach

{{$posts -> links()}} {{--? Botones de paginación --}}
@endsection
