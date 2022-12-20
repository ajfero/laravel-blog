<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body" 
>

    <h1> Create New Post <h1>
            <!-- cuando ocurre un error del lado del servidor podemos mostrar esta variable. 
            Esto nos mostrara la bolsa de errores de los formularios porque pueden ser vaarios form 
            -->
            @dump($errors)
            <!-- Este nos agrupa todos los errores que deseemos y poder filtrarlos, pero no es escalable -->
    <form action="{{ route('posts.store') }}" method="POST">
        @CSRF
        <label for="Title"> Title <br>
            <!-- Como el navegador interpreta JS podemos implementar esta validacion pero 
                no es la correcta dado que se puede modificar desde la herramienta de desarrollo del navegador.
                de igual forma funciona como otra capa de seguridad "required"-->
            <input name="title" type="text">

        </label> <br>

        <label for="Body"> Body <br>
            <textarea name="body" id="" cols="30" rows="10">
            </textarea>
        </label><br>

        <button type="submit">Submit</button><br>
    </form>

    <a href="{{ route('posts.create') }}">Return</a>
    <br>
</x-layouts.app>