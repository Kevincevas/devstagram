@extends('layouts.app')

@section('titulo')
    Inicia Sesión en  DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-6/12 p-5">
            {{-- asset apunta directamente a la carpeta public --}}
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Login de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif
                
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

                {{-- mantener sesión abierta en cookies mediante remember --}}
                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label for="" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" type="submit" name="" id="" value="Iniciar Sesión">
            </form>
        </div>
    </div>
@endsection