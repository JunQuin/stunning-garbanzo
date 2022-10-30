@extends('admin.layout.adminCssApp')

@section('content')
    {{-- @dd($project)" --}}
    @if (session('success') !== null)
        <div class="alert alert-success">

            <!-- Modal -->
            <div id="modal" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

                    <!-- Modal header -->
                    <div class="flex justify-between items-center bg-green-500 text-white text-xl rounded-t-md px-4 py-2">
                        <h3>Mensaje de confirmacion</h3>
                        <button onclick="closeModal('modal')">x</button>
                    </div>

                    <!-- Modal body -->
                    <div class="max-h-48 overflow text-black p-4">
                        <p>{{ session()->get('success') }}!</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                            onclick="closeModal('modal')">Cerrar (ESC)</button>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                window.openModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'block'
                    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                }

                window.closeModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'none'
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                    window.close();
                }

                // Close all modals when press ESC
                document.onkeydown = function(event) {
                    event = event || window.event;
                    if (event.keyCode === 27) {
                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                        window.close();
                        let modals = document.getElementsByClassName('modal');
                        Array.prototype.slice.call(modals).forEach(i => {
                            i.style.display = 'none'
                        })
                    }
                };
            </script>
    @endif

    @isset($project)
        <div class="container mx-auto px-4">
            <section class="body-font">
                <div class="container px-5 py-10 mx-auto">
                    <button
                        class="btn inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 text-black bg-red-400 hover:bg-red-500"
                        onclick="showDeleteModal(1)">Eliminar proyecto
                    </button>
                    <div id="arbol" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog"
                        aria-modal="true">
                        <!--
                                            Background backdrop, show/hide based on modal state.

                                            Entering: "ease-out duration-300"
                                            From: "opacity-0"
                                            To: "opacity-100"
                                            Leaving: "ease-in duration-200"
                                            From: "opacity-100"
                                            To: "opacity-0"
                                        -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                        <div class="fixed inset-0 z-10 overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <!--
                                                Modal panel, show/hide based on modal state.

                                                Entering: "ease-out duration-300"
                                                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                To: "opacity-100 translate-y-0 sm:scale-100"
                                                Leaving: "ease-in duration-200"
                                                From: "opacity-100 translate-y-0 sm:scale-100"
                                                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            -->
                                <div
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <!-- Heroicon name: outline/exclamation-triangle -->
                                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                                    Eliminar proyecto</h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Estás seguro que deseas eliminar el
                                                        proyecto? Toda la informacion se eliminada para siempre. Eso es
                                                        mucho
                                                        tiempo.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <form method="post" action="{{ route('proyecto.destroy', $project->pro_id) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                                        </form>
                                        <button type="button" onclick="showDeleteModal(0)"
                                            class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
                                    <h2 class="text-gray-200 title-font font-bold text-2xl"> {{ __('Participantes') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">
                                        {{ $project->par1_nombre . ' ' . $project->par1_apellidos }} Y
                                        {{ $project->par2_nombre . ' ' . $project->par2_apellidos }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                                <div class="flex-grow">
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Categoria') }}
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
                                    <h2 class="text-gray-200 title-font font-bold text-2xl">
                                        {{ __('Ha participado antes?') }}
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
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Telefono') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">{{ $project->par1_telefono }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                                <div class="flex-grow">
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Correo') }}
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
                                        {{ __('Talla de Playera') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">
                                        {{ $project->par1_playera == 0 ? 'N/A' : '' }}
                                        {{ $project->par1_playera == 1 ? 'Extra Chica' : '' }}
                                        {{ $project->par1_playera == 2 ? 'Chica' : '' }}
                                        {{ $project->par1_playera == 3 ? 'Mediana' : '' }}
                                        {{ $project->par1_playera == 4 ? 'Grande' : '' }}
                                        {{ $project->par1_playera == 5 ? 'Extra Grande' : '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                                        {{ $project->par1_niveleducativo == 3 ? 'Preparatoria' : '' }}
                                    </p>
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
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Telefono') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">{{ $project->par2_telefono }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                                <div class="flex-grow">
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Correo') }}
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
                                        {{ __('Talla de Playera') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">
                                        {{ $project->par2_playera == 0 ? 'N/A' : '' }}
                                        {{ $project->par2_playera == 1 ? 'Extra Chica' : '' }}
                                        {{ $project->par2_playera == 2 ? 'Chica' : '' }}
                                        {{ $project->par2_playera == 3 ? 'Mediana' : '' }}
                                        {{ $project->par2_playera == 4 ? 'Grande' : '' }}
                                        {{ $project->par2_playera == 5 ? 'Extra Grande' : '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
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
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Telefono') }}
                                    </h2>
                                    <p class="text-lg text-gray-100 capitalize">{{ $project->asesorCelular }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg bg-orange-950">
                                <div class="flex-grow">
                                    <h2 class="text-gray-200 title-font font-bold text-2xl capitalize">
                                        {{ __('Correo') }}
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
                    @endif

                </div>
            </section>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/projects.js') }}"></script>
    @endsection
