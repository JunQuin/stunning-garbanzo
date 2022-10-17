@extends('layout.app')

@section('content')
    <div class="container  mx-auto px-4">
        <div class="relative pt-14 pb-20 md:pb-32">
            <div class="grid grid-cols-2">

                <div class="mt-20 grid grid-rows-2">
                    <div class="mx-12">
                        <h2 class="mb-6 md:mb-0 text-2xl sm:text-5xl md:text-6xl text-justify text-white uppercase font-heading">
                            <span>FOJEM 2022</span>
                            <span class="block">Foro Jovenes</span>
                            <span class="block">Emprendedores</span>
                        </h2>
                        <a class="inline-flex items-center mt-4 py-4 px-6 rounded-full bg-orange-800 hover:bg-orange-900 transform duration-200 text-gray-100"
                            href="{{ route('proyecto.create') }}">
                            <svg class="mr-3" width="16" height="9" viewbox="0 0 16 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.16553H0V5.24886H12.01V8.37386L16 4.20719L12.01 0.0405273V3.16553Z"
                                    fill="white">
                                </path>
                            </svg>
                            <span class="text-sm uppercase font-heading">Registrar Proyecto</span>
                        </a>
                    </div>

                    <div class="mx-12 mt-4 text-lg">
                        <span class="text-gray-100">
                            Espacio para compartir experiencias que permitan fomentar y fortalecer la capacidad emprendedora, y de la innovación de los jóvenes, así como, promover e incrementar su creatividad.
                        </span>
                    </div>
                </div>

                <div class="mx-auto my-auto">
                    <div class="rounded-2xl bg-white">
                        <img class="" src="./images/fojemlogo.png" alt="LOGO">
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
