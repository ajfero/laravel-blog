<x-layouts.app
    title="Blog"
    meta-description="blog meta-description" 
>

    <x-slot name="title" > Blog </x-slot> 
    
    <h1>Blog</h1>

    <a href="{{ route('posts.create') }}">Create Post</a>

    <!-- Para inspeccionar los datos que vienen desde la ruta podemos usar dump -->
    <!-- @dump($posts) -->
    @foreach ( $posts as $post )
        <div style="display: flex; align-items: baseline">
            <h2>
                <!-- ahora declaramos  la nueva ruta y le pasamos el objeto para que tenga toda la lista de objetos y sus atributos -->
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>  
            </h2> &nbsp;
            <a href="{{ route('posts.edit', $post) }}">Edit</a> <br>
        </div> 
    @endforeach

</x-layouts.app>