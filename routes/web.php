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
Route::view('/', 'welcome')->name('home');          // http://laravel9.test/

// para los metodos solo se aceptan dos parametros. Puede ser un invocable.
// Como convencion par mostrar listados es imporatnte que el method se llame index.

// index -> listados de recursos
// show -> detalle de un recurso
// Route::get('/blog', [PostController::class, 'index'])->name('posts.index');         // http://laravel9.test/blog
// // Route::get('/blog/1', [PostController::class, 'show']);         // http://laravel9.test/blog
// // Parametros de ruta
// Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
// Route::POST('/blog', [PostController::class, 'store'])->name('posts.store');
// // las ruta que esperan parametros deberan estar de ultima 
// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/blog/{post}', [PostController::class, 'delete'])->name('posts.destroy');

/* Laravel puede generar las rutas por nosotros mismos como estandar.
    Es por eso que usamos el method resource.
    1er parameter= nombre de la URL
    2do parameter = nombre del controlador
    3er parameter = Array de especificaciones de parametros
*/
Route::resource('blog', PostController::class, [
    'names' => 'posts',                     // 3er parameter = nombre del router
    'parameters' => ['blog' => 'post']     // 4to parameter = cambiar nombre de un parameter por otro.
]);

Route::view('/contact', 'contact')->name('contact');         // http://laravel9.test/contact
Route::view('/about', 'about')->name('about');               // http://laravel9.test/about
Route::view('/security', 'security')->name('security');

// return a function
Route::match(['put', 'patch'], '/selectMethods', function () {
    //
});

Route::any('/allMethods', function () {
    //
});

// show how function the middleware auth
// Route::view('/about', 'about')->name('about')->middleware('auth');               // http://laravel9.test/about with authentication

Route::get('/login', function () {
    return 'Login Page';
})->name('login');
