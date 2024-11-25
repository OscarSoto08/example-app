@extends('layouts.app')

@section('title', 'Editar')
@section('content')
<h2>Editacion del post {{$post -> title}}</h2>

<div class="container p-5 mt-5">
    <h2 class='text-center'>Aquí se mostrarán el formulario para crear un post</h2>
    <a href="{{route('post.index')}}" class="btn btn-primary">Volver</a>
  <form action="{{route('post.update', $post)}}" method="post" style="max-width: 500px; margin: auto;" class="mt-5">
    @csrf {{--* Para enviar el token del formulario--}}
    @method('put')
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post -> title)}}">
          {{--? El metodo old('name') trata de recuperar lo que habia anteriormente, recupera la info, el segundo parametro es por si la validacion no falla --}}
        </div>
        @error('title')
          <x:alert2 type="danger" class="mt-2">
            <x:slot name="title">
                Error:
            </x:slot>
            {{$message}}
          </x:alert2>
        @enderror
      </div>

      <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $post -> category)}}">
        </div>
        @error('category')
          <x:alert2 type="danger" class="mt-2">
            <x:slot name="title">
                Error:
            </x:slot>
            {{$message}}
          </x:alert2>
        @enderror
      </div>
      <div class="mb-3 row">
        <label for="content" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="content" name="content" rows="3">{{old('content', $post -> content)}}</textarea>
        </div>
        @error('content')
          <x:alert2 type="danger" class="mt-2">
            <x:slot name="title">
                Error:
            </x:slot>
            {{$message}}
          </x:alert2>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
@endsection
