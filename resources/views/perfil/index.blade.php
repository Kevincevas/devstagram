@extends('layouts.app')


@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf

                @if (session('mensaje'))
                <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">Nombre</label>
                    <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ auth()->user()->name }}" type="text" name="name" id="name" placeholder="Tu nombre">

                    @error('name')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Username</label>
                    <input class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}" type="text" name="username" id="username" placeholder="Tu Username">

                    @error('username')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">Email</label>
                    <input class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ auth()->user()->email }}" type="email" name="email" id="email" placeholder="Tu Email">

                    @error('email')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">Password <span class="text-gray-400 lowercase text-sm">(Para guardar los cambios es necesario ingresar su contraseña actual)</span></label>
                    <input class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" type="password" name="password" id="password" placeholder="Tu Password">

                    @error('password')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">Imagen Perfil</label>
                    <input class="border p-3 w-full rounded-lg" value="" type="file" accept=".jpg, .jpeg, .png" name="imagen" id="imagen">
                </div>

                <input class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="submit" name="" id="" value="Guardar Cambios">

            </form>
        </div>
    </div>
@endsection