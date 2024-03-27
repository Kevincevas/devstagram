{{-- Directiva que apunta directamente a views --}}
@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')
    
    {{-- Pasando lal variable $posts hacia el componente --}}
    <x-listar-post :posts="$posts" />


@endsection