@extends('layout.app')

@section('content')
    <div class="flex  justify-center mx-auto items-center">
        <form action="{{ route('login') }}" method="post"
              class="border-2 px-4 py-2 border-gray-700 bg-form">
            @csrf
            <img src="images/LOGO-INEI-BLANCO-MEDIUM.png" alt="" class="mb-8">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div
                        class="px-4 mx-4 p-4 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <div>
                            <span class="font-medium">{{ $error }}!</span>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="flex flex-wrap -mx-4 mb-4" style="align-items: center;">
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <h3 class="uppercase leading-tight font-heading text-lg">Correo Electronico</h3>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <div class="text-center">
                        <input
                            class="w-full py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-gray-500"
                            type="text" name="email" placeholder="correo@mail.com">
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0" style="align-items: center;">
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0 items-center">
                    <h3 class="uppercase leading-tight font-heading text-lg">Contraseña</h3>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <div class="text-center">
                        <input
                            class="w-full py-4 px-6 bg-black rounded-full border text-white outline-none placeholder-gray-500"
                            type="password" name="password" placeholder="contraseña"></div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button
                    class="inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 bg-green-400 text-green-900 hover:bg-green-600"
                    type="submit">Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
@endsection
