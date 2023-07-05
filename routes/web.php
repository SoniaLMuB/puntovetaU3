<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;

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


//Ruta para el login
Route::get('/', [LoginController::class, 'index'])->name('login');
//Ruta para iniciar sesión en el sistema
Route::post('/', [LoginController::class, 'store']);
//Ruta para el register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
//Ruta para el registro de usuarios
Route::post('/register', [RegisterController::class, 'store']);
//Funcion para redireccionar al dashboard
Route::get('/dashboard', [PostController::class, 'index'])->name('post.index');

//Ruta para cerrar sesión
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');


//Ruta para la vista de productos
Route::get('/products', [ProductosController::class, 'index'])->name('productos.index');
//Ruta para la vista de crear productos
Route::get('/newProducts',[ProductosController::class,'create'])->name('productos.create');
//Ruta para registrar productos en la tabla
Route::post('/newProducts',[ProductosController::class,'store']);
//Ruta para ver producto
Route::get('/viewProduct/{id_product}',[ProductosController::class,'view'])->name('producto.view');
//Ruta para ir a la vista de actualizar producto
Route::get('/editProduct/{id_product}',[ProductosController::class,'edit'])->name('producto.edit');
//Ruta para actualizar el producto
Route::post('/actualizarProducto', [ProductosController::class, 'update'])->name('producto.update');
//Ruta para eliminar productos
Route::get('/deleteProductos/{id_productos}', [ProductosController::class, 'delete'])->name('producto.delete');

//Ruta para la vista de categorias
Route::get('/categories', [CategoriasController::class, 'index'])->name('categorias.index');
//Ruta para la vista de registrar categorias
Route::get('/newCategories', [CategoriasController::class, 'create'])->name('categorias.create');
//Ruta para registrar categorias
Route::post('/newCategories', [CategoriasController::class, 'store']);
//Ruta para editar categoria
Route::get('/editCategories/{id_categoria}', [CategoriasController::class, 'edit'])->name('categorias.edit');
//Ruta para actualizar la categoria
Route::post('/editCategories', [CategoriasController::class, 'update'])->name('category.update');
//Ruta para eliminar la categoria
Route::get('/deleteCategories/{id_categoria}', [CategoriasController::class, 'delete'])->name('categorias.delete');

//Ruta para retornar la vista de marcas
Route::get('/branch', [MarcasController::class, 'index'])->name('marcas.index');
//Ruta para retornar la vista de registro de marcas
Route::get('/newBranch', [MarcasController::class, 'create'])->name('marcas.create');
//Ruta para registrar la marca en la tabla
Route::post('/newBranch', [MarcasController::class, 'store']);



//Ruta para procesar la imagenes en el controlador
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagen.store');



