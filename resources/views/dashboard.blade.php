@extends('layout.app')

@section('content')
    <div class="container mx-auto px-4">
        <section class="body-font">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-col text-center w-full mb-10">
                    <h1 class="font-bold text-3xl title-font mb-4 text-white">
                        {{ $project->pro_nombre }}
                    </h1>
                    <p class="lg:w-2/3 text-2xl mx-auto leading-relaxed text-white">
                        {{ $project->pro_descripcion }}
                    </p>
                </div>
                <div class="flex flex-col text-center w-full mb-4">
                    <h1 class="font-bold text-3xl title-font mb-4 text-gray-100">
                        Datos del Proyecto
                    </h1>
                </div>
                <div class="flex flex-wrap -m-2">
                    {{-- <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Tipo') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->pro_tipo }}</p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Participantes') }}</h2>
                                <p class="text-lg text-gray-100 capitalize"> {{ $project->par1_nombre . ' ' . $project->par1_apellidos }} Y {{ $project->par2_nombre . ' ' . $project->par2_apellidos }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Categoria') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->pro_categoria }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                    {{ __('Sub-Categoria') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->pro_subcategoria }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-2 -m-2">
                    <div class="p-2 lg:w-1/4">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Asesor') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->asesorNombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/4">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Ha participado antes?') }}
                                </h2>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio h-5 w-5 text-green-600"
                                        {{ $project->pro_participado == 1 ? 'checked' : 'no disabled' }}><span
                                        class="ml-2 text-gray-200">SI</span>
                                </label>
                                <label class="inline-flex items-center ml-2">
                                    <input type="radio" class="form-radio h-5 w-5 text-green-600"
                                        {{ $project->pro_participado == 0 ? 'checked' : 'no disabled' }}><span
                                        class="ml-2 text-gray-200">No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-center w-full mt-6 my-4">
                    <h1 class="font-bold text-2xl title-font mb-4 text-gray-100">
                        Datos del Participante 1
                    </h1>
                </div>

                <div class="flex flex-wrap -m-2">
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Nombre') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">
                                    {{ $project->par1_nombre . ' ' . $project->par1_apellidos }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Telefono') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->par1_telefono }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Correo') }}
                                </h2>
                                <p class="text-lg text-gray-100">{{ $project->par1_correo }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-2 -m-2">
                    <div class="p-2 lg:w-1/3">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                    {{ __('Escuela de procedencia') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->par1_procedencia }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                    {{ __('Nivel Educativo') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">
                                    {{ $project->par1_niveleducativo == 1 ? 'Primaria' : '' }}
                                    {{ $project->par1_niveleducativo == 2 ? 'Secundaria' : '' }}
                                    {{ $project->par1_niveleducativo == 3 ? 'Preparatoria' : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-center w-full mt-6 my-4">
                    <h1 class="font-bold text-2xl title-font mb-4 text-gray-100">
                        Datos del Participante 2
                    </h1>
                </div>
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Nombre') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">
                                    {{ $project->par2_nombre . ' ' . $project->par2_apellidos }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Telefono') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->par2_telefono }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Correo') }}
                                </h2>
                                <p class="text-lg text-gray-100">{{ $project->par2_correo }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-2 -m-2">
                    <div class="p-2 lg:w-1/3">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                    {{ __('Escuela de procedencia') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->par2_procedencia }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                    {{ __('Nivel Educativo') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">
                                    {{ $project->par2_niveleducativo == 1 ? 'Primaria' : '' }}
                                    {{ $project->par2_niveleducativo == 2 ? 'Secundaria' : '' }}
                                    {{ $project->par2_niveleducativo == 3 ? 'Preparatoria' : '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col text-center w-full mt-6 my-4">
                    <h1 class="font-bold text-2xl title-font mb-4 text-gray-100">
                        Datos del Asesor
                    </h1>
                </div>
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Nombre') }}</h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->asesorNombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Telefono') }}
                                </h2>
                                <p class="text-lg text-gray-100 capitalize">{{ $project->asesorCelular }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                            <div class="flex-grow">
                                <h2 class="text-gray-200 title-font font-bold text-2xl capitalize"> {{ __('Correo') }}
                                </h2>
                                <p class="text-lg text-gray-100">{{ $project->asesorEmail }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- TODO esta es la plantilla del rectangulo que muestro --}}

                {{-- <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                        <img loading="lazy" alt="team"
                             class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                             src="https://dummyimage.com/80x80" style=" ">
                        <div class="flex-grow">
                            <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Asesor') }}</h2>
                            <p class="text-gray-100">{{ $asesor->nombre . ' ' . $asesor->apellidos }}</p>
                        </div>
                    </div>
                </div> --}}

            </div>
        </section>
    </div>
@endsection
