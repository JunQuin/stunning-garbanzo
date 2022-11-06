<!doctype html>
<html lang="en">

<head>
    <!-- Head Contents -->

    @stack('scripts')

    <title>ADMIN FOJEM 2022</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.css') }}"></script>
</head>

<body class="antialiased bg-body text-body font-body">
    <div class="flex flex-col h-screen">
        <div class="bg-red-900">
            <nav class="relative bg-transparent border-b">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between">
                        <div class="py-4 pr-4 lg:border-r justify-center">
                            <a class="inline-block text-xl text-white font-medium font-heading" href="#">
                                {{-- <img class="h-8" width="auto" src="https://foro.inei.edu.mx/img/logoineiblanco.png" --}}
                                {{-- alt="Logo INEI"> --}}
                            </a>
                        </div>
                        <div
                            class="lg:block py-8 lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-y-1/2 lg:-translate-x-1/2">
                            <ul class="flex justify-center">
                                <li class="mx-6"><a class="hover:text-gray-300 text-gray-100" target="_BLANK"
                                        href="images/bannerfojem.jpg">Convocatoria</a></li>
                                <li class="mx-6"><a class="text-gray-100 hover:text-gray-300" target="_BLANK"
                                        href="documents/fojemguiaparticipante.pdf">Guía del
                                        participante</a>
                                </li>
                                <li class="mx-6"><a class="text-gray-100 hover:text-gray-300">Proyectos
                                        Registrados</a></li>
                            </ul>
                        </div>
                        <div class="lg:flex ml-auto items-center border-l">

                            <div class="ml-4 collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    @guest('admin_users')
                                        {{-- <a class="inline-flex items-center justify-center py-3 px-6 transform duration-200 text-gray-600 hover:underline hover:text-gray-600"> --}}
                                        <a class="inline-flex items-center justify-center py-3 px-6 transform duration-200 text-white hover:underline hover:text-gray-300"
                                            href="{{ route('admin.login.show') }}">
                                            <span class="font-heading">Iniciar Sesión</span>
                                        </a>
                                    @endguest
                                    @auth('admin_users')
                                        <li class="">
                                            <span id="" style="text-transform: uppercase;">
                                                {{ __(session('userName')) }}
                                            </span>

                                            <div class="m-1 text-center" aria-labelledby="navbarDropdown">
                                                <a class="text-white" href="{{ route('logout') }}"
                                                    onclick="preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Cerrar Sesión') }}
                                                </a>
                                                <form id="logout-form" action="{{ '/admin-logout' }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div>
            @auth('admin_users')
                <nav class="bg-red-900 border-gray-200 px-2 sm:px-4 py-2.5">
                    <div class="container flex flex-col justify-between items-center mx-auto antialiased text-body">
                        <div class="w-full md:block md:w-auto" id="mobile-menu">
                            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                <li>
                                    <a href="{{ route('admin.dashboard.index', ['id' => session('userId')]) }}"
                                        class="{{ request()->is('admin-dashboard/' . session('userId')) ? 'bg-orange-900 text-blue-50 border' : 'text-gray-100 hover:text-gray-300 ' }} mx-auto block py-2 pr-4 pl-3 rounded">Listado
                                        Proyectos</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('proyecto.edit') }}"
                                        class="{{ request()->is('editar-proyecto') ? 'bg-orange-900 text-blue-50 border' : 'text-gray-100 hover:text-gray-300 ' }} block py-2 pr-4 pl-3 rounded">Editar
                                        información del registro</a>
                                </li> --}}
                                <li>
                                    <a href="{{ route('admin-jueces.index') }}"
                                        class="{{ request()->is('admin-jueces') ? 'bg-orange-900 text-blue-50 border' : 'text-gray-100 hover:text-gray-300 ' }} block py-2 pr-4 pl-3 rounded">
                                        Jueces</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-proyecto-juez.index') }}"
                                        class="{{ request()->is('admin-proyecto-juez') ? 'bg-orange-900 text-blue-50 border' : 'text-gray-100 hover:text-gray-300 ' }} block py-2 pr-4 pl-3 rounded">
                                        Asignación de Jueces</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endauth
        </div>

        <main class=" flex-grow">
            @yield('content')
        </main>

        <footer class="bg-black">
            <div class="pt-4 pb-4 border-b">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="w-full md:w-auto mb-8 md:mb-0">
                            <div class="flex flex-wrap">
                            </div>
                        </div>
                        <p class="text-gray-500">Todos los derechos reservados © INEI 2022</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
