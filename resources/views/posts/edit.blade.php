<x-layouts.app :title="$post->title" :meta-description="$post->body">
    <h1> Edit Form of Post <h1>
            <!-- creamos una nueva ruta de actualizacion llamada Update -->
            {{-- @dump($post)  --}}
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @CSRF @method('PATCH')
                @include('posts.form')

                <button type="submit">Submit</button><br>
            </form>

            <a href="{{ route('posts.index') }}">Return</a>
            <br>
</x-layouts.app>