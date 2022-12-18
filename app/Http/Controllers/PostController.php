<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // controllador invocable cuando usamos el controlador para una sola accion
    public function index()
    {
        // Import of facade woth method of table get a specific table
        // This method is powerfull becouse it allows white SQL pure with method raw.
        // $posts = DB::raw('posts')->get();
        $posts = DB::table('posts')->get();

        // recibe dos parametro, la vista y el dato.
        return view ('blog', ['posts'=> $posts]);
    }
}
