<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Default meta-description' }}">
    <title> App - {{ $title ?? 'default' }} </title>
    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>

<body class="antialiased bg-slate-100 dark:bg-slate-900">
    <!-- <h1 class="text-3xl text-blue-500 font-bold underline">
            Hello world!
        </h1> -->

    <x-layouts.navigation />

    <!-- Estos mensajes modificaran vuestro html y podra romper la maqueta.
        por lo que se presentaran solo cuando esten disponibles con esta condicional -->
    @if (session('status'))
    <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700"> {{ session('status') }} </div>
    @endif

    {{$slot}}
</body>

</html>