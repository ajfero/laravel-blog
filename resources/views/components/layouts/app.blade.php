<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? 'Default meta-description' }}">
    <title> App - {{ $title ?? 'default' }} </title>
    @vite('resources/js/app.js')
</head>
<body>
    <x-layouts.navigation/>
    {{$slot}}
</body>
</html>