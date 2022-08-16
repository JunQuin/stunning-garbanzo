@extends('layout.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="relative pt-14 pb-20 md:pb-32">
            <div
                class="absolute top-0 left-1/2 mt-20 transform -translate-x-1/2 -ml-20 rounded-full h-20 md:h-128 w-80 md:w-128">
                <img class="object-contain transform scale-200" src="boldui-assets/elements/shadow-blue-full.svg"
                     alt=""></div>
            <div class="absolute top-0 left-1/2 mt-40 lg:mt-20 rounded-full h-20 md:h-128 w-80 md:w-128">
                <img class="object-contain transform scale-200" src="boldui-assets/elements/shadow-light-7.svg"
                     alt=""></div>
            <div
                class="absolute top-0 right-1/2 mt-20 sm:mt-0 w-full max-w-3xl transform translate-x-1/2 rotate-45 clip-path">
            </div>
            <div class="relative max-w-6xl mx-auto lg:mt-20">

                <h2 class="mb-6 md:mb-0 text-2xl sm:text-5xl md:text-6xl text-white uppercase font-heading">
                    <span>FOJEM 2022</span>
                    <span class="block">Foro Jovenes</span>
                    <span class="block">Emprendedores</span>
                </h2>
                <a class="inline-flex items-center mt-4 py-4 px-6 rounded-full bg-yellow-300 hover:bg-yellow-400 transform duration-200 text-gray-900"
                   href="{{ route('proyecto.create') }}">
                    <svg class="mr-3" width="16" height="9" viewbox="0 0 16 9" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.01 3.16553H0V5.24886H12.01V8.37386L16 4.20719L12.01 0.0405273V3.16553Z"
                              fill="black"></path>
                    </svg>
                    <span class="text-sm uppercase font-heading">Registrar Proyecto</span>
                </a>
            </div>
        </div>
    </div>
@endsection
