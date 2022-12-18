<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| variables
|--------------------------------------------------------------------------
|
*/



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// http://laravel9.test/public/
// Route::get('/', function () {
//     return view('welcome');
// });

// http://laravel9.test/main
Route::get('/main', function () {
    return view('main');
})->name('main');

// return a view
Route::view('/', 'welcome')->name('welcome');          // http://laravel9.test/

// para los metodos solo se aceptan dos parametros. Puede ser un invocable.
// Como convencion par mostrar listados es imporatnte que el method se llame index.
Route::get('/blog', [PostController::class, 'index'])->name('blog');         // http://laravel9.test/blog


Route::view('/contact', 'contact')->name('contact') ;  // http://laravel9.test/contact
Route::view('/about', 'about')->name('about');       // http://laravel9.test/about
Route::view('/security', 'security')->name('security');       // http://laravel9.test/about

// return a function
Route::match(['put' , 'patch' ], '/selectMethods' , function () {
    //
});

Route::any( '/allMethods' , function () {
    //
});