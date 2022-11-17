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
</body>
