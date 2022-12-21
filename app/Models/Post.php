<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // change de name of Model for the name of the table
    // protected $table = 'articules';

    // add  to fillable property to allow mass assignment
    // asignacion masiva.
    protected $fillable = ['title','body'];

}
