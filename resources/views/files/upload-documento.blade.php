@extends('layout.app')

@section('content')
    <div class="container mx-auto px-4">
        <section class="body-font">
            <div class="container px-5 py-10 mx-auto">
                @if(!isset($file->document))
                    <div class=" flex text-center w-full mb-4">
                        <h1 class="w-1/5 mx-auto text-2xl font-medium title-font mb-4 bg-white text-red-500 rounded-lg animate-bounce">
                            Proyecto no cargado
                        </h1>
                    </div>
                @else
                    <div class="flex flex-col text-center w-full mb-4">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">
                            Proyecto Cargado
                        </h1>
                        <div class="flex items-center justify-center">
                            <div class="b relative mx-auto h-16 w-64 flex justify-center items-center">
                                <a target="_blank" href="{{ route('documento.show',$file->document) }}"
                                   class="i h-16 w-64 bg-purple-600 rounded-xl shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out text-center text-white font-semibold flex sm:inline-flex justify-center items-center px-5 py-2">Click
                                    para ver!</a>
                                <span
                                    class="absolute flex h-6 w-6 top-0 right-0 transform translate-x-2.5 -translate-y-2.5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                                <span class="absolute inline-flex rounded-full h-6 w-6 bg-purple-500"></span> </span>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
            <div class="flex flex-col text-center w-full mb-4">
                <h1
                    class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">
                    Carga de Proyecto
                </h1>
            </div>
            <div class="flex flex-col text-center w-full mb-4">
                @if (session()->has('formFile'))
                    <div class="m-2 alert alert-success" role="alert">
                        {{ session('formFile') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header mb-2">
                        Favor de cargar su proyecto en formato PDF
                    </div>
                    <div class="card-body">
                        <form class="container rounded" role="form" method="POST"
                              action="{{ route('documento.store') }}" accept-charset="UTF-8"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="flex justify-center">
                                    <div class="mb-3 w-96">
                                        <input
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            type="file" name="formFile" id="formFile" accept="application/pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md">
                                    <button type="submit"
                                            class="btn inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 text-green-900 bg-green-400 hover:bg-green-500"
                                            id="submit">Subir
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
