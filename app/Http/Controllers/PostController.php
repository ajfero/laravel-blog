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
}
