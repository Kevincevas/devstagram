@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="titulo">Título</label>
                    <input class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}" type="text" name="titulo" id="titulo" placeholder="Título de la publicación">

                    @error('titulo')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="descripcion">Descripción</label>
                    <textarea class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror" name="descripcion" id="descripcion" placeholder="Descripción de la publicación">{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{ old('imagen') }}"
                    >
                    @error('imagen')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>


                <input class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="submit" name="" id="" value="Publicar">
            </form>
        </div>
    </div>
@endsection