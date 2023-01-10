<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // change de name of Model for the name of the table
    // protected $table = 'articules';

    // add  to fillable property to allow massice assignment
    // asignacion masiva. Si le pasamos todos los datos podemos hacer la assignacion masiva. 
    // protected $fillable = ['title','body'];

    // podemos definir lo opuesto de los campos que no podemos ingresar a la base de datos.
    // Si lo dejamos sin alguno estamos informando que podemos dejar pasar a la DB todos los campos del form.
    protected $guarded = [];
    // este nos dejara pasar todo el form con toda la data incluyendo el token CSRF. Esto es un problema de seguridad grave.
    // con lo que podemos evitar enviarlo es evitar usando el methodo all() dentro del controlador correspondiente.
    // teniendo en cuenta que las validaciones ocurren en el request.

    /* tambien podemos deshabilitar la asignacion masiva en el
        AppSertviceProvider.php
            use Illuminate\Database\Eloquent\Model;

            public function boot()
            {
                Model::unguard();
            }
    */
}
