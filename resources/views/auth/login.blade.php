@extends('layouts/app')
@section('titulo', 'Inicia sesion')

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        {{-- cuando la pantalla sea mediana, ocupe 4 partes de una division de 12 elementos --}}
        <div class="md:w-6/12  p-5">
            <img src="{{ asset("img/login.jpg") }}" alt="Login usuario" />
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            {{-- register es el name que le dimos en el archivo web.php, es buena practica colocar los name en el router --}}
            <form method="POST" action="{{ route('login') }}" >
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold" >Email</label>
                    <input
                        id="email" name="email" type="email" placeholder="Tu email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror "
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{-- laravel automaticamente, si tiene un error para este input, lo asigna a una variable con el nombre $message --}}
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold" >Password</label>
                    <input
                        id="password" name="password" type="password" placeholder="Tu password de registro"
                        class="border p-3 w-full rounded-lg  @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{-- laravel automaticamente, si tiene un error para este input, lo asigna a una variable con el nombre $message --}}
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5" >
                    <input type="checkbox" name="remember" />
                    <span class=" text-gray-500 text-sm" > Mantener mi sesion abierta</span>
                </div>

                <button
                    type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
                    Iniciar sesion
                </button>
            </form>
        </div>
    </div>
@endsection