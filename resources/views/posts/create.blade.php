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
        <form action="{{ route('posts.store') }}" method="POST">
            @CSRF
            <label for="title"> Title <br>
                <!-- Como el navegador interpreta JS podemos implementar esta validación pero 
                    no es la correcta dado que se puede modificar desde la herramienta de desarrollo del navegador.
                    de igual forma funciona como otra capa de seguridad "required"-->
                <input name="title" type="text" value="{{ old('title') }}">
                <br>
                <!-- Directiva de blade error interna de laravel, nos permite acceder al error y mostrarlo a traves del mensaje-->
                @error('title')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </label> <br>
            
            <label for="body"> Body <br>
                <!-- Si llegaramos a tener un error en algunos de los cambios el formulario se resetearia y estaria vacio por lo que
                usamos la etiqueta value del campo de entrada y le asignamos si anterior valor segun el nombre del campo  -->
                <textarea name="body" id="" cols="30" rows="10" > {{ old('body') }} </textarea>
                <br>
                @error('body')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </label> <br>

            <button type="submit">Submit</button><br>
        </form>

    <a href="{{ route('posts.create') }}">Return</a>
    <br>
</x-layouts.app>