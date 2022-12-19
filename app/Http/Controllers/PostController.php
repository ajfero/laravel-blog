<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    // controllador invocable cuando usamos el controlador para una sola accion
    public function index()
    {
        // Import of facade woth method of table get a specific table
        // This method is powerfull becouse it allows white SQL pure with method raw.
        // $posts = DB::raw('posts')->get();
        $posts = Post::get();
        // dado que el Modelo se llama Post -> Eloquent asume que la tabla se llama Post. 


        // recibe dos parametro, la vista y el dato.
        return view ('blog', ['posts'=> $posts]);
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
}
