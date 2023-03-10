<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    // create a controller for 
    public function __construct()
    {
        // apply Only to this methods
        // $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

        // apply Except to this methods
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // controllador invocable cuando usamos el controlador para una sola accion
    public function index()
    {
        // Import of facade woth method of table get a specific table
        // This method is powerfull becouse it allows white SQL pure with method raw.
        // $posts = DB::raw('posts')->get();
        $posts = Post::get();
        // dado que el Modelo se llama Post -> Eloquent asume que la tabla se llama Post. 

        // recibe dos parametro, la vista y el dato.
        return view('posts.index', ['posts' => $posts]);
    }

    // podemos recibir el id como parametro de la ruta. 
    // de esta manera podriamos acceder al registro segun su id
    public function show(Post $post)
    {
        // return "detalle del post";
        // laravel cuando return un objeto los convierte en json
        // return Post::find($posts);
        // return Post::findOrFail($posts);

        // usamos Type hint -> como un tipado que te permite verificar si el registro existe 
        // Verifica segun el modelo dentro de la base de datos si existe un registro.
        // return $post;

        // segun convecion para mostrar un registro usamos una vista especifica.
        // y debemos crear un nuevo directorio para no confundirlos.
        // examples:
        // user/show.blade.php
        // post/show.blade.php
        return view('posts.show', ['post' => $post]);
        // tambien le pasamos como parametro a la vista la variable que necesitamos acceder.
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request)
    {
        // Hasta este momento el formulario fue procesado.
        // return 'Processed Form';

        // para acceder a los datos del formulario, laravel lo convierte directamente en json.
        // return request();

        // tambien podemos recibir los datos como parametro de la funcion
        // return $request;

        // para acceder a un campo especifico del formulario
        // return $request->input('title');

        // Create post - refactor
        Post::create($request->validated());
        // session()->flash('status', 'Post Created');

        // return redirect()->route('posts.index');
        // usamos el helper de laravel funciona igual que el anterior.
        return to_route('posts.index')->with('status', 'Post Created');
    }

    // recibimos el post que deceamos editar enviado desde la vista blog.
    public function edit(Post $post)
    {
        // return the post of view blog and database
        // return $post;
        return view('posts.edit', ['post' => $post]);
    }

    // recibimos el post que deceamos editar enviado desde la vista blog.
    public function update(SavePostRequest $request, Post $post)
    {
        // return if edit post it's ok
        // return 'Edited Post';

        // dado que agregamos el tipo de variables Laravel buscara automaticamente por nosotros en la base de datos y no necesitamos buscar el registro 
        // $post = Post::find($post);

        // refactor with facade of model a Post with method create.
        $post->update($request->validated());
        // session()->flash('status', 'Post Update');

        return to_route('posts.show', ['post' => $post])->with('status', 'Post Update');
    }

    // recibimos el post que deceamos eliminar enviado desde la vista blog.
    public function destroy(Post $post)
    {
        // return if Deleted post it's ok
        // return $post;

        $post->delete();
        return to_route('posts.index')->with('status', 'Post Deleted');
    }
}
