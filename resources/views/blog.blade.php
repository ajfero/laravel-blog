<x-layouts.app>
    <x-slot name="title" > Blog </x-slot> 
    <h1>Blog</h1>
    <!-- Para inspeccionar los datos que vienen desde la ruta podemos usar dump -->
    <!-- @dump($posts) -->
    @foreach ( $posts as $post )
        <h3>
            <!-- ahora accedemos al array como si fuera una propiedad -->
            <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>  
        </h3>
    @endforeach
</x-layouts.app>