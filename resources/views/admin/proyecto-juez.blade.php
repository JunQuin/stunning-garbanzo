@extends('admin.layout.adminApp')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.css') }}"></script>
    <script src="./js/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/jqueryFunciones.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="px-8">
        @if (session('status'))
            <div class="flex flex-col justify-center mt-1">
                <div class="bg-green-500 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3"
                    id="toast" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                    <div
                        class="bg-green-500 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-green-400 rounded-t-lg">
                        <p class="font-bold text-white flex items-center">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>
                            Atención!!!
                        </p>
                        <div class="flex items-center">
                            <div id="timer">
                                <span id="time" class="text-white opacity-90 text-xs">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-green-500 rounded-b-lg break-words text-white">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="flex flex-col justify-center mt-1">
                <div class="bg-red-500 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3"
                    id="toast" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                    <div
                        class="bg-red-500 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-400 rounded-t-lg">
                        <p class="font-bold text-white flex items-center">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle"
                                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                </path>
                            </svg>
                            Atención!!!
                        </p>
                        <div class="flex items-center">
                            <div id="timer">
                                <span id="time" class="text-white opacity-90 text-xs">4</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-red-500 rounded-b-lg break-words text-white">
                        {{ session('error') }}
                    </div>
                </div>
                {{-- <div class="alert alert-success">
              {{ session('status') }}
          </div> --}}
            </div>
        @endif

        <div class="flex my-4 justify-center">
            <div class="block rounded-lg shadow-lg bg-gray-900 w-fit text-center">
                <div class="py-3 px-6 border-b border-gray-100 text-gray-200">
                    <div class="grid">
                        <span class="px-4 text-xl flex items-center place-content-center">
                            Asignacion de jueces a proyectos
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">


                            @isset($proyectosData)
                                @foreach ($proyectosData as $proyecto)
                                    <div class="flex items-start rounded-xl bg-white p-4 mb-4 shadow-lg">
                                        <div onclick="viewProject('{{ route('admin.view.project', $proyecto->pro_id) }}')"
                                            class="flex h-12 w-12 items-center justify-center hover:cursor-pointer rounded-full border border-blue-100 bg-blue-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </div>

                                        <div class="ml-4 text-gray-900 capitalize">
                                            <span
                                                class="inline-block align-middle font-semibold">{{ __($proyecto->pro_nombre) }}</span>
                                            <span class="inline-block align-middle text-sm">
                                                {{ __('Participante: ' . $proyecto->par1_nombre . ' ' . $proyecto->par1_apellidos . ' Telefono: ' . $proyecto->par1_telefono . ' Categoria:' . $proyecto->pro_categoria) }}
                                            </span>
                                            <div class="container inline-flex">
                                                <!-- Button trigger modal -->
                                                <button type="button"
                                                    class="mx-2 px-3 flex py-2.5 {{ isset($juezAsign[$proyecto->pro_id][0]) ? 'bg-yellow-600' : 'bg-green-600' }} text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    data-bs-toggle="modal" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                                                    data-mdb-ripple-radius="50"
                                                    data-bs-target="#staticBackdrop1-{{ $proyecto->pro_id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-plus mr-2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                        </path>
                                                        <path
                                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                        </path>
                                                    </svg>
                                                    Agregar Juez 1
                                                </button>
                                                <!-- Button trigger modal -->
                                                <button type="button"
                                                    class="mx-2 px-3 flex py-2.5 {{ isset($juezAsign[$proyecto->pro_id][1]) ? 'bg-yellow-600' : 'bg-green-600' }} text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    data-bs-toggle="modal" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                                                    data-mdb-ripple-radius="50"
                                                    data-bs-target="#staticBackdrop2-{{ $proyecto->pro_id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-plus mr-2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                        </path>
                                                        <path
                                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                        </path>
                                                    </svg>
                                                    Agregar Juez 2
                                                </button>
                                                <!-- Button trigger modal -->
                                                <button type="button"
                                                    class="mx-2 px-3 flex py-2.5 {{ isset($juezAsign[$proyecto->pro_id][2]) ? 'bg-yellow-600' : 'bg-green-600' }} text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    data-bs-toggle="modal" data-mdb-ripple="true"
                                                    data-mdb-ripple-unbound="true" data-mdb-ripple-radius="50"
                                                    data-bs-target="#staticBackdrop3-{{ $proyecto->pro_id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-file-earmark-plus mr-2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                        </path>
                                                        <path
                                                            d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                        </path>
                                                    </svg>
                                                    Agregar Juez 3
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                        id="staticBackdrop1-{{ $proyecto->pro_id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                            <div
                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                <form id="brocoli-1-{{ $proyecto->pro_id }}" role="form" method="POST"
                                                    action="{{ route('admin-proyecto-juez.store', $proyecto->pro_id) }}"
                                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    <div
                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                            id="exampleModalLabel">
                                                            Registro de juez 1
                                                        </h5>
                                                        @isset($juezAsign[$proyecto->pro_id][0])
                                                            <span class="text-base font-medium leading-normal text-gray-800">
                                                                Asignado -
                                                                {{ $juezAsign[$proyecto->pro_id][0]->nombre . $juezAsign[$proyecto->pro_id][0]->apellido }}
                                                            </span>
                                                        @endisset
                                                    </div>
                                                    <div
                                                        class="flex items-center place-content-center modal-body relative p-4">
                                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-9/12">
                                                            <input type="hidden" name="proyecto"
                                                                value="{{ $proyecto->pro_id }}">
                                                            <input type="hidden" name="posicion"
                                                                value="{{ 1 }}">

                                                            <div class="form-group">
                                                                <select type="select" required
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="juez1" name="juez1" placeholder="seleecione">
                                                                    @isset($juezAsign[$proyecto->pro_id][0])
                                                                        <option value="">
                                                                            Asignado -
                                                                            {{ $juezAsign[$proyecto->pro_id][0]->nombre . $juezAsign[$proyecto->pro_id][0]->apellido }}
                                                                        </option>
                                                                    @endisset
                                                                    @empty($juezAsign[$proyecto->pro_id][0])
                                                                        <option value="">Seleccione...</option>
                                                                    @endempty
                                                                    @foreach ($jueces as $juez)
                                                                        <option value="{{ $juez->id }}">
                                                                            {{ $juez->nombre . ' ' . $juez->apellido }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                        <button type="submit"
                                                            class="mx-2 px-3 flex py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-file-earmark-plus mr-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                                </path>
                                                                <path
                                                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                                </path>
                                                            </svg>
                                                            Guardar
                                                        </button>
                                                        <button type="button" data-mdb-ripple="true"
                                                            data-mdb-ripple-unbound="true" data-mdb-ripple-radius="50"
                                                            class="px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                        id="staticBackdrop2-{{ $proyecto->pro_id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                            <div
                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                <form id="brocoli-2-{{ $proyecto->pro_id }}" role="form" method="POST"
                                                    action="{{ route('admin-proyecto-juez.store', $proyecto->pro_id) }}"
                                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    <div
                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                            id="exampleModalLabel">
                                                            Registro de juez 2
                                                        </h5>
                                                        @isset($juezAsign[$proyecto->pro_id][1])
                                                            <span class="text-base font-medium leading-normal text-gray-800">
                                                                Asignado -
                                                                {{ $juezAsign[$proyecto->pro_id][1]->nombre . $juezAsign[$proyecto->pro_id][1]->apellido }}
                                                            </span>
                                                        @endisset
                                                    </div>
                                                    <div
                                                        class="flex items-center place-content-center modal-body relative p-4">
                                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-9/12">
                                                            <input type="hidden" name="proyecto"
                                                                value="{{ $proyecto->pro_id }}">
                                                            <input type="hidden" name="posicion"
                                                                value="{{ 2 }}">

                                                            <div class="form-group">
                                                                <select type="select" required
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="juez2" name="juez2" placeholder="seleecione">
                                                                    @isset($juezAsign[$proyecto->pro_id][1])
                                                                        <option value="">
                                                                            Asignado -
                                                                            {{ $juezAsign[$proyecto->pro_id][1]->nombre . $juezAsign[$proyecto->pro_id][1]->apellido }}
                                                                        </option>
                                                                    @endisset
                                                                    @empty($juezAsign[$proyecto->pro_id][1])
                                                                        <option value="">Seleccione...</option>
                                                                    @endempty
                                                                    @foreach ($jueces as $juez)
                                                                        <option value="{{ $juez->id }}">
                                                                            {{ $juez->nombre . ' ' . $juez->apellido }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                        <button type="submit"
                                                            class="mx-2 px-3 flex py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-file-earmark-plus mr-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                                </path>
                                                                <path
                                                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                                </path>
                                                            </svg>
                                                            Guardar
                                                        </button>
                                                        <button type="button" data-mdb-ripple="true"
                                                            data-mdb-ripple-unbound="true" data-mdb-ripple-radius="50"
                                                            class="px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                            data-bs-dismiss="modal" onclick="">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                        id="staticBackdrop3-{{ $proyecto->pro_id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                            <div
                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                <form id="brocoli-3-{{ $proyecto->pro_id }}" role="form" method="POST"
                                                    action="{{ route('admin-proyecto-juez.store', $proyecto->pro_id) }}"
                                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    <div
                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                            id="exampleModalLabel">
                                                            Registro de juez 3
                                                        </h5>
                                                        @isset($juezAsign[$proyecto->pro_id][2])
                                                            <span class="text-base font-medium leading-normal text-gray-800">
                                                                Asignado -
                                                                {{ $juezAsign[$proyecto->pro_id][2]->nombre . $juezAsign[$proyecto->pro_id][2]->apellido }}
                                                            </span>
                                                        @endisset
                                                    </div>
                                                    <div
                                                        class="flex items-center place-content-center modal-body relative p-4">
                                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-9/12">
                                                            <input type="hidden" name="proyecto"
                                                                value="{{ $proyecto->pro_id }}">
                                                            <input type="hidden" name="posicion"
                                                                value="{{ 3 }}">
                                                            <div class="form-group">
                                                                <select type="select" required
                                                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                                    id="juez3" name="juez3" placeholder="seleecione">
                                                                    @isset($juezAsign[$proyecto->pro_id][2])
                                                                        <option value="">
                                                                            Asignado -
                                                                            {{ $juezAsign[$proyecto->pro_id][2]->nombre . $juezAsign[$proyecto->pro_id][2]->apellido }}
                                                                        </option>
                                                                    @endisset
                                                                    @empty($juezAsign[$proyecto->pro_id][2])
                                                                        <option value="">Seleccione...</option>
                                                                    @endempty
                                                                    @foreach ($jueces as $juez)
                                                                        <option value="{{ $juez->id }}">
                                                                            {{ $juez->nombre . ' ' . $juez->apellido }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                        <button type="submit"
                                                            class="mx-2 px-3 flex py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-file-earmark-plus mr-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                                                </path>
                                                                <path
                                                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                                                </path>
                                                            </svg>
                                                            Guardar
                                                        </button>
                                                        <button type="button" data-mdb-ripple="true"
                                                            data-mdb-ripple-unbound="true" data-mdb-ripple-radius="50"
                                                            class="px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                            data-bs-dismiss="modal" onclick="">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                            @empty($proyectosData)
                                <h2 class="mb-4 text-2xl text-white font-bold">Vacio</h2>
                            @endempty


                        </div>
                    </div>
                    <div class="py-3 px-6 border-t border-gray-300 text-gray-100">
                        Fin de la lista
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/funciones.js') }}"></script>
@endsection
