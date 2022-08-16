<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro Exitoso</title>
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

    <div class="flex h-screen justify-center items-center">
        <div class="text-center">
            <h2 class="text-2xl mb-2 uppercase leading-tight font-heading">Registro exitoso!</h2>

            <h1 class="tmb-2 uppercase leading-tight font-heading mt-8 mx-32 text-stroke text-3xl animate-bounce">
                IMPORTANTE LEER!</h1>

            <h2 class="text-2xl mb-2 leading-tight font-heading text-green-500">Su correo de ingreso
                es (Usuario): {{ __($mail) }}</h2>

            <h2 class="text-2xl mb-2 leading-tight font-heading text-blue-500">Su contraseña es: {{ __($pass) }}</h2>

            <h3 class="mb-2 uppercase leading-tight font-heading mt-8 mx-32 text-red-400 text-2xl">recuerde sus
                datos de inicio sesión</h3>

            <div class="my-4">
                <a
                    href="{{ route('proyecto.dashboard') }}"
                    class="inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 bg-green-400 shadow-lg shadow-green-500/50 hover:bg-green-500">Continuar
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
