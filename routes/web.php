<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('index');

//Registrar usuario
Route::get('/registrar', [RegisterController::class, 'index'])->name('register');
Route::post('/registrar', [RegisterController::class, 'store']);

//Iniciar sesión
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Cerrar sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Editar perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');

Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//Actualizar Password
Route::get('/update-password', [PasswordUpdateController::class, 'index'])->name('password.index');

Route::post('/update-password', [PasswordUpdateController::class, 'store'])->name('password.store');

//Mostrar perfil de cada usuario
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');

//Muestra el formulario para subir publicaciones
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

//Guarda las publicaciones en la base de datos
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//Mostrar las publicaciones individualmente
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Crear los comentarios
Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

//Eliminar publicación
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

//Guardar los likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');

//Eliminar los likes
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

//Guarda las imagenes en la base de datos
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Seguidores
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');

Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');