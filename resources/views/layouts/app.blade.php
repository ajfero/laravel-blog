<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Change the title with @yield() - Set a different title for different view  -->
    <title>App - @yield('title')</title>
    <!-- Set a default meta -->
    <meta name="description" content="@yield('meta-description', 'Default meta-description')">
</head>
<body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-300 sm:items-center py-4 sm:pt-0">
            @include('partials.navigation')
                <!--  
                    Cosecha de nuestro nuestra vista para diferenciar por secciones.
                    the name content is a convention and the field section and the name must be equal.
                -->
            @yield('content')
        </div>
</body>
</html>