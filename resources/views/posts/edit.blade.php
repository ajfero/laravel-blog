<x-layouts.app
    :title="$post->title"
    :meta-description="$post->body" 
>
    <h1> Edit Form of Post <h1>
        <!-- creamos una nueva ruta de actualizacion llamada Update -->
        <form action="{{ route('posts.update', $post) }}" method="POST">
            <!-- El cliente/navegador no es capaz de interpretar el html con el metodo patch
                Es por esto que tenemos la directiva "method" capaz de recibir y emular el methodo deseado desde la plantilla. 
            -->
            @CSRF @method('PATCH')
            <label for="title"> Title <br>
                {{-- By second params we cand set a default value --}}
                {{-- <input name="title" type="text" value="{{ old('title, 'default') }}"> --}}
                <input name="title" type="text" value="{{ old('title', $post->title) }}">
                <br>
                @error('title')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </label> <br>
            
            <label for="body"> Body <br>
                <textarea name="body" id="" cols="30" rows="10" > {{ old('body', $post->body) }} </textarea>
                <br>
                @error('body')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </label> <br>

            <button type="submit">Submit</button><br>
        </form>

    <a href="{{ route('posts.index') }}">Return</a>
    <br>

</x-layouts.app>