@extends('admin.layout.adminApp')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="px-8">
        <div class="flex flex-wrap overflow-hidden pt-2">
            <div class="w-1/3 overflow-hidden">
                <h2 class="mb-4 mt-2 text-2xl text-white font-bold">Listado de proyectos - logeado como:
                    {{ __($sessionData->rol == 1 ? 'Admin' : 'Juez') }}</h2>

            </div>
            <div class="w-1/3 overflow-hidden">
                <button onclick="makeListado()"
                    class="mx-4 px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                    Imprimir Listado</button>
            </div>
            <div class="w-1/3 overflow-hidden">
                <select type="select" required
                    class="form-control block py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="graph_select" placeholder="seleecione">
                    <option value="0">Filtrar por categoria...</option>
                    <option value="0">Ninguno</option>
                    <option value="1">Divulgación Científica</option>
                    <option value="2">Cuento Científico</option>
                    <option value="3">Cortometraje</option>
                    <option value="4">Animación</option>
                    <option value="5">Robótica</option>
                </select>
            </div>
        </div>
        @isset($sessionData)
            @if ($sessionData->rol == 1)
                <div class="my-4">
                    <div class="grid gap-4 grid-cols-2">
                        @isset($proyectosData)
                            {{-- @dd($proyectosData) --}}
                            @foreach ($proyectosData as $proyecto)
                                <div class="flex items-start rounded-xl bg-white p-4 mb-4 shadow-lg {{ $proyecto->pro_categoria }}">
                                    <div onclick="viewProject('{{ route('admin.view.project', $proyecto->pro_id) }}')"
                                        class="flex h-12 w-12 items-center justify-center hover:cursor-pointer rounded-full border border-blue-100 bg-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                    </div>

                                    <div class="ml-4 text-gray-900 capitalize">
                                        <span class="inline-block align-middle font-semibold">{{ __($proyecto->pro_nombre) }}</span>
                                        <span class="inline-block align-middle text-sm">
                                            {{ __('participante: ' . $proyecto->par1_nombre . ' ' . $proyecto->par1_apellidos . ' Telefono: ' . $proyecto->par1_telefono) }}
                                        </span>
                                        <div class="container">
                                            <a class="mt-2 text-sm inline-block {{ isset($proyecto->documento) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600' }}"
                                                href="{{ isset($proyecto->documento) ? route('admin.view.documento', $proyecto->documento) : '#' }}"
                                                target="_BLANK">{{ isset($proyecto->documento) ? 'Proyecto Cargado' : 'Proyecto No Cargado' }}</a>
                                            <a class="mt-2 text-sm inline-block {{ isset($proyecto->bitacora) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600' }}"
                                                href="{{ isset($proyecto->bitacora) ? route('admin.view.bitacora', $proyecto->bitacora) : '#' }}"
                                                target="_BLANK">{{ isset($proyecto->bitacora) ? 'Bitacora Cargada' : 'Bitacora No Cargada' }}</a>
                                            <a class="mt-2 text-sm inline-block {{ isset($proyecto->video) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600' }}"
                                                href="{{ isset($proyecto->video) ? $proyecto->video : '#' }}"
                                                target="_BLANK">{{ isset($proyecto->video) ? 'Video Cargado' : 'Video No Cargado' }}</a>
                                            <a class="mt-2 text-sm inline-block {{ isset($proyecto->recibo) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600' }}"
                                                href="{{ isset($proyecto->recibo) ? route('admin.view.recibo', $proyecto->recibo) : '#' }}"
                                                target="_BLANK">{{ isset($proyecto->recibo) ? 'Recibo Cargado' : 'Recibo No Cargado' }}</a>
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
        @endif
        @if ($sessionData->rol == 2)
            Juez
        @endif
    @endisset
</div>

<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/jqueryFuncionesDashboard.js') }}"></script>
<script>
    function viewProject(url) {
        window.open(url, '_blank');
    }

    function makeListado() {
        window.open('{{ route('admin.createPdf') }}', '_blank');
    }
</script>
@endsection
