<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body" 
>

    <h1> Create New Post <h1>
            <!-- cuando ocurre un error del lado del servidor podemos mostrar esta variable. 
            Esto nos mostrara la bolsa de errores de los formularios porque pueden ser varios form 
            Este nos agrupa todos los errores que deseemos y poder filtrarlos, pero no es escalable
            -->
            <!-- @dump($errors) -->
            
            <!-- Recorremos todos los errores y los presentamos individualmente en pantalla. -->
            <!-- @foreach( $errors->all() as $error )
                <p>
                    {{$error}}
                </p>
            @endforeach
            -->
    {{-- @dump($post)  --}}
    <form action="{{ route('posts.store', $post) }}" method="POST">
        @CSRF

        @include('posts.form')

        <button type="submit">Submit</button><br>
    </form>

    <a href="{{ route('posts.index') }}">Return</a>
    <br>
</x-layouts.app>