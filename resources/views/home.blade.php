@extends('layouts.app')

{{-- Titulo de la pagina --}}
@section('title', 'Laravel')

@section('content')
{{-- * El nombre de la section debe ser el mismo que el de yield en el layout layouts.app --}}
<x:alert2 type="success" class="p-3">
    <x:slot name="title">
        El contenido de la alerta es:
    </x:slot>
    Aprendiendo a usar laravel jsjsj
</x:alert2>
@endsection
