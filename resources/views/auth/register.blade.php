@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12 p-5">
            {{-- asset apunta directamente a la carpeta public --}}
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen Registro de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">Nombre</label>
                    <input class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Tu nombre">

                    @error('name')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Username</label>
                    <input class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}" type="text" name="username" id="username" placeholder="Tu Username">

                    @error('username')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">Email</label>
                    <input class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" type="email" name="email" id="email" placeholder="Tu Email">

                    @error('email')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">Password</label>
                    <input class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" type="password" name="password" id="password" placeholder="Tu Password">

                    @error('password')
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">Repetir Password</label>
                    <input class="border p-3 w-full rounded-lg" type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu Password">
                </div>

                <input class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="submit" name="" id="" value="Crear Cuenta">
            </form>
        </div>
    </div>
@endsection