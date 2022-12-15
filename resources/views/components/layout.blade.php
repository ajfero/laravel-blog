<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <!-- Change the title with SLOT - Set a different title for different view -->
    <!-- if the variable is undefined we can set a default title {{ $title ?? 'default' }} -->
    {{-- <title> App - {{ $title }} </title> --}}
    <title> App - {{ $title ?? 'default' }} </title>
    <!-- Set a default meta -->
    <meta name="description" content="@yield('meta-description', 'Default meta-description')">
</head>
<body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-300 sm:items-center py-4 sm:pt-0">
            {{-- @include('partials.navigation') --}}
                <!--  
                    Suplantamos el yield por slot que nos permite acceder a la data del componente
                -->
            {{ $slot }} 
        </div>
</body>
</html>