<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    // controllador invocable cuando usamos el controlador para una sola accion
    public function index() {
        // Import of facade woth method of table get a specific table
        // This method is powerfull becouse it allows white SQL pure with method raw.
        // $posts = DB::raw('posts')->get();
        $posts = Post::get();
        // dado que el Modelo se llama Post -> Eloquent asume que la tabla se llama Post. 

        // recibe dos parametro, la vista y el dato.
        return view ('posts.index', ['posts'=> $posts]);
    }

    // podemos recibir el id como parametro de la ruta. 
    // de esta manera podriamos acceder al registro segun su id
    public function show(Post $post) {
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

    public function create(Post $post) {
            return view('posts.create', ['post' => $post]);
    }

    public function store(Request $request) {
        // Hasta este momento el formulario fue procesado.
        // return 'Processed Form';

        // para acceder a los datos del formulario, laravel lo convierte directamente en json.
        // return request();
        
        // tambien podemos recibir los datos como parametro de la funcion
        // return $request;

        // para acceder a un campo especifico del formulario
        // return $request->input('title');

        // Validations validate([])
        // Se puede validar con el Objeto recibido request->validations
        // el methodo validate recibe un array 
        $request->validate([
            'title'=>['required','min:4'],
            'body'=>['required'],
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Los mensajes de session son mensajes que tienen vida util flash por consulta y tienen una sola vida.
        // Por lo que dirigir un mensaje modificara el html.
        session()->flash('status', 'Post Created');

        // return redirect()->route('posts.index');
        // usamos el helper de laravel funciona igual que el anterior.
        return to_route('posts.index');
    }
    
    // recibimos el post que deceamos editar enviado desde la vista blog.
    public function edit(Post $post) {
        // return the post of view blog and database
        // return $post;
        return view('posts.edit', ['post' => $post]);
    }

    // recibimos el post que deceamos editar enviado desde la vista blog.
    public function update(Request $request, Post $post) {
        // return if edit post it's ok
        // return 'Edited Post';

        // update post
        $request->validate([
            'title'=>['required','min:4'],
            'body'=>['required'],
        ]);
        
        // dado que agregamos el tipo de variables Laravel buscara automaticamente por nosotros en la base de datos y no necesitamos buscar el registro 
        // $post = Post::find($post)

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        session()->flash('status', 'Post Update');

        return view('posts.show', ['post' => $post]);
    }
}