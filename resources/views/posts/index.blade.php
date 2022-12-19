<x-layouts.app>
    <x-slot name="title" > Blog </x-slot> 
    <h1>Blog</h1>
    <!-- Para inspeccionar los datos que vienen desde la ruta podemos usar dump -->
    <!-- @dump($posts) -->
    @foreach ( $posts as $post )
        <h3>
            <!-- ahora declaramos  la nueva ruta y le pasamos el objeto para que tenga toda la lista de objetos y sus atributos -->
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>  
        </h3>
    @endforeach
</x-layouts.app>