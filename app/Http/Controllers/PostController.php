<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // controllador invocable cuando usamos el controlador para una sola accion
    public function index()
    {
        // return 'blog';
        $posts = [
            [ 'title' => 'First post' ],
            [ 'title' => 'Second post' ],
            [ 'title' => 'Third post' ],
            [ 'title' => 'Fourth post' ]
        ];

        // recibe dos parametro, la vista y el dato.
        return view ('blog', ['posts'=> $posts]);
    }
}
