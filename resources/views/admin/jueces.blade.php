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
            {{-- <div class="alert alert-success">
              {{ session('status') }}
          </div> --}}
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

    {{-- Codigo jalando --}}

    <div class="flex my-4 justify-center">
        <div class="block rounded-lg shadow-lg bg-gray-900 w-10/12 text-center">
            <div class="py-3 px-6 border-b border-gray-100 text-gray-200">
                <div class="grid grid-cols-2 gap-4">
                    <span class="px-4 flex items-center place-content-center">
                        Listado de Jueces
                    </span>
                    <div class="grid justify-items-end">
                        <!-- Button trigger modal -->
                        <button type="button"
                            class="px-3 flex py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-toggle="modal" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                            data-mdb-ripple-radius="50" data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-file-earmark-plus mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z">
                                </path>
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z">
                                </path>
                            </svg>
                            Agregar Juez
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                @if (!$listadoJueces)
                    <h5 class="text-gray-300 text-xl font-medium mb-2">Agrega Jueces!!!</h5>
                @else
                    <div class="grid gap-4 grid-cols-2">
                        @foreach ($listadoJueces as $juez)
                            <div class="flex items-start rounded-xl bg-white p-4 mb-4 shadow-lg">
                                <div
                                    class="flex h-10 w-10 items-center justify-center hover:cursor-pointer rounded-full border border-blue-100 bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                        class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path
                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                    </svg>
                                </div>

                                <div class="mx-1 text-gray-900 capitalize w-full grid gap-4 grid-cols-2">
                                    <div>
                                        <span class="align-middle grid text-md">
                                            {{ __($juez->nombre . ' ' . $juez->apellido) }}
                                        </span>
                                    </div>
                                    <div class="align-middle grid justify-items-end">
                                        <button type="button" onclick="showEliminarJuez(1,{{ $juez->id }})"
                                            data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                                            data-mdb-ripple-radius="50"
                                            class="px-6 pt-2.5 pb-2 bg-red-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out flex align-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                            <span class="mx-1">Eliminar</span>
                                        </button>
                                    </div>
                                    <span class="align-middle grid text-sm">
                                        {{ __('Celular: ' . $juez->celular) }}
                                    </span>
                                    <span class="align-middle grid text-sm">
                                        {{ __('Correo: ' . $juez->email) }}
                                    </span>
                                </div>
                            </div>
                            <div id="arbol-{{ $juez->id }}" class="absolute z-0 hidden" aria-labelledby="deleteModal"
                                role="dialog" aria-modal="true">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                    <div class="fixed inset-0 z-10 overflow-y-auto">
                                        <div
                                            class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                            <div
                                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div
                                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <!-- Heroicon name: outline/exclamation-triangle -->
                                                            <svg class="h-6 w-6 text-red-600"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg font-medium leading-6 text-gray-900"
                                                                id="deleteModal">
                                                                Eliminar Juez</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">Estás seguro que deseas
                                                                    eliminar el
                                                                    juez? Toda la informacion se eliminada para siempre. Eso
                                                                    es
                                                                    mucho
                                                                    tiempo.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                    <form method="POST" id="{{ $juez->id }}"
                                                        name="{{ $juez->id }}"
                                                        action="{{ route('admin-jueces.destroy', $juez->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-mdb-ripple="true"
                                                            data-mdb-ripple-unbound="true" data-mdb-ripple-radius="50"
                                                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirmar</button>
                                                        <a onclick="showEliminarJuez(0,{{ $juez->id }})"
                                                            data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                                                            data-mdb-ripple-radius="50"
                                                            class="inline-flex cursor-pointer w-full justify-center rounded-md border border-transparent bg-yellow-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="py-3 px-6 border-t border-gray-300 text-gray-100">
                Fin de la lista
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Registro de juez
                    </h5>
                    <button type="button" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                        data-mdb-ripple-radius="50"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="flex items-center place-content-center modal-body relative p-4">
                    <div class="block p-6 rounded-lg shadow-lg bg-white w-9/12">
                        <form id="brocoli" role="form" method="POST" action="{{ route('admin-jueces.store') }}"
                            accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-6">
                                <input type="text" required
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="nombre" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group mb-6">
                                <input type="text" required
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="apellido" name="apellido" placeholder="Apellido">
                            </div>
                            <div class="form-group mb-6">
                                <input type="email" required
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group mb-6">
                                <input type="tel" required pattern="[0-9]{10}"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="celular" name="celular" placeholder="Numero de Celular">
                            </div>
                            {{-- <div class="form-group mb-6">
                              <input type="tel" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                  class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                  id="celular" name="celular" placeholder="Numero de Celular">
                          </div>  --}}
                            <button type="submit" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                                data-mdb-ripple-radius="50"
                                class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Registrar</button>
                        </form>
                    </div>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button" data-mdb-ripple="true" data-mdb-ripple-unbound="true"
                        data-mdb-ripple-radius="50"
                        class="px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-dismiss="modal" onclick="limpiarInputs()">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
