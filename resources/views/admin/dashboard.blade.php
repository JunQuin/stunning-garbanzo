@extends('admin.layout.adminApp')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="px-8">
        <h2 class="mb-4 text-2xl text-white font-bold">Listado de proyectos - logeado como: {{ __(($sessionData->rol == 1) ? 'Admin' : Juez) }}</h2>
        @isset($sessionData)
            @if ($sessionData->rol == 1)
                <div class="my-4">
                    <div class="grid gap-4 grid-cols-2">
                        @isset($proyectosData)
                            @foreach ($proyectosData as $proyecto)
                                <div class="flex items-start rounded-xl bg-white p-4 mb-4 shadow-lg">
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>

                                    <div class="ml-4 text-gray-900 capitalize">
                                        <h2 class="inline-block align-middle font-semibold">{{ __($proyecto->pro_nombre) }}</h2>
                                        <span class="inline-block align-middle text-sm">
                                            {{ __('participante: ' . $proyecto->par1_nombre . ' ' . $proyecto->par1_apellidos . ' Telefono: ' . $proyecto->par1_telefono) }}
                                        </span>
                                        <a class="mt-2 text-sm inline-block {{ ((isset($proyecto->documento)) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600') }}" href="{{ ((isset($proyecto->documento)) ? route("admin.view.documento",$proyecto->documento) : "#") }}" target="_BLANK">{{ ((isset($proyecto->documento)) ? 'Proyecto Cargado' : 'Proyecto No Cargado') }}</a>
                                        <a class="mt-2 text-sm inline-block {{ ((isset($proyecto->bitacora)) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600') }}" href="{{ ((isset($proyecto->bitacora)) ? route('admin.view.bitacora',$proyecto->bitacora) : '#') }}" target="_BLANK">{{ ((isset($proyecto->bitacora)) ? 'Bitacora Cargada' : 'Bitacora No Cargada') }}</a>
                                        <a class="mt-2 text-sm inline-block {{ ((isset($proyecto->video)) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600') }}" href="{{ ((isset($proyecto->video)) ? $proyecto->video : '#') }}" target="_BLANK">{{ ((isset($proyecto->video)) ? 'Video Cargado' : 'Video No Cargado') }}</a>
                                        <a class="mt-2 text-sm inline-block {{ ((isset($proyecto->recibo)) ? 'hover:cursor-pointer text-green-600 border border-green-600' : 'hover:cursor-not-allowed text-red-600 border border-red-600') }}" href="{{ ((isset($proyecto->recibo)) ? route('admin.view.recibo',$proyecto->recibo) : '#') }}" target="_BLANK">{{ ((isset($proyecto->recibo)) ? 'Recibo Cargado' : 'Recibo No Cargado') }}</a>
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

@endsection
