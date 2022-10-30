<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.css') }}"></script>
</head>
<body class="antialiased bg-body text-body font-body">
<div class="">

    <section class="relative bg-black overflow-hidden">
        <nav class="relative bg-transparent border-b">
            <div class="container mx-auto px-4">
                <div class="flex justify-between">
                    <div class="pr-14 py-8 lg:border-r">
                        <a class="inline-block text-xl text-white font-medium font-heading" href="#">
                            <img class="h-8" width="auto" src="boldui-assets/logo/logo-boldui-light.svg" alt=""></a>
                    </div>
                    <div
                        class="hidden lg:block py-8 lg:absolute lg:top-1/2 lg:left-1/2 lg:transform lg:-translate-y-1/2 lg:-translate-x-1/2">
                        <ul class="flex justify-center">
                            <li class="mr-12"><a class="text-gray-100 hover:text-gray-300" href="#">Convocatoria</a>
                            </li>
                            <li class="mr-12"><a class="hover:text-gray-300 text-gray-100" href="#">Guía del
                                    participante</a></li>
                            <li class="mr-12"><a class="hover:text-gray-300 text-gray-100" href="#">Proyectos
                                    Registrados</a></li>
                            <li><a class="text-gray-100 hover:text-gray-300" href="#">Jueces</a></li>
                        </ul>
                    </div>
                    <div class="hidden lg:flex ml-auto items-center border-l">
                        <a class="inline-flex mr-8 items-center text-white hover:underline" href="#">

                        </a>
                        <a class="inline-flex items-center justify-center py-3 px-6 transform duration-200 text-white hover:underline hover:text-gray-300"
                           href="#">
                            <span class="font-heading">Iniciar Sesión</span>
                        </a>
                    </div>
                    <button class="navbar-burger lg:hidden self-center">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="6" width="24" height="2" fill="white"></rect>
                            <rect y="11" width="24" height="2" fill="white"></rect>
                            <rect y="16" width="24" height="2" fill="white"></rect>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
        <div class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-5/6 max-w-sm z-50">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav class="relative flex flex-col py-8 px-10 w-full h-full bg-black border-r overflow-y-auto"><a
                    class="inline-block text-xl text-white font-medium font-heading mb-16 md:mb-32" href="#">
                    <img class="h-8" width="auto" src="boldui-assets/logo/logo-boldui-light.svg" alt=""></a>
                <ul class="mb-32">
                    <li class="mb-10">
                        <a class="flex items-center" href="#">
                            <span class="mr-3 text-lg text-white">Convocatoria</span>
                            <svg width="16" height="9" viewbox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                                      fill="#FFEC3E"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="mb-10">
                        <a class="flex items-center" href="#">
                            <span class="mr-3 text-lg text-white">Guía del participante</span>
                            <svg width="16" height="9" viewbox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                                      fill="#FFEC3E"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="mb-10">
                        <a class="flex items-center" href="#">
                            <span class="mr-3 text-lg text-white">Proyectos Registrados</span>
                            <svg width="16" height="9" viewbox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                                      fill="#FFEC3E"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center" href="#">
                            <span class="mr-3 text-lg text-white">Jueces</span>
                            <svg width="16" height="9" viewbox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.01 3.48047H0V5.57278H12.01V8.71124L16 4.52663L12.01 0.34201V3.48047Z"
                                      fill="#FFEC3E"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
                <a class="flex mb-8 items-center justify-center py-4 px-6 rounded-full transform duration-200" href="#">
                    <span class="text-sm font-medium uppercase tracking-wider hover:underline">Iniciar Sesión</span>
                </a>


            </nav>
        </div>
    </section>

    <div class="bg-form border-2 px-4 mx-48 py-2 border-gray-800 mb-32 mt-8">
        <h2 class="text-2xl mb-2 leading-tight font-heading">Aún no ha cargado el link del video!</h2>

        <h2 class="text-2xl mb-2 leading-tight font-heading">Proyecto Cargado Correctamente</h2>
    </div>

    <form action="#" method="post" class="bg-form border-2 px-4 mx-48 py-2 border-gray-800 mb-32">
        <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <h2 class="text-2xl mb-2 font-heading">Cargar Video</h2>
            </div>
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0 text-right">
                <a class="inline-block py-4 px-6 text-sm uppercase font-heading bg-yellow-300 hover:bg-yellow-400 rounded-full transition duration-200 text-gray-900"
                   href="#">Cargar</a>
            </div>
        </div>

        <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <h2 class="text-2xl mb-2 font-heading">Ver Proyecto</h2>
            </div>
            <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                <a class="inline-block py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 text-gray-900 bg-green-400 hover:bg-green-500"
                   href="#">Ver</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>

