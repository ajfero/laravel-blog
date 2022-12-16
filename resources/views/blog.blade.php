<x-layouts.app >
    <x-slot name="title" > Blog </x-slot> 
    <h1>Blog</h1>
    <!-- Para inspeccionar los datos que vienen desde la ruta podemos usar dump -->
    <!-- @dump($posts) -->
    @foreach ( $posts as $post )
        <h3>
            {{ $post['title'] }}
        </h3>
    @endforeach
</x-layouts.app>