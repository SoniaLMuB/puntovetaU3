<?php

use App\Http\Controllers\RecibosController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\subCategoriaController;

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
//Ruta para mandar a la vista de editar marca
Route::get('/editBranch/{id_branch}', [MarcasController::class, 'view'])->name('marcas.edit');
//Ruta para modificar la marca en la base de datos
Route::post('/updateBranch', [MarcasController::class, 'update'])->name('marcas.update');
//Ruta para eliminar la marca de la base de datos
Route::get('/deleteBranch/{id_branch}', [MarcasController::class, 'delete'])->name('marcas.delete');


//Ruta para retornar la vista de subcategorias
Route::get('/subCategory', [subCategoriaController::class, 'index'])->name('subCategoria.index');
//Ruta para retornar a la vista de añadir subcategoria
Route::get('/newSubCategory', [subCategoriaController::class, 'create'])->name('subCategorias.create');
//Ruta para crear subcategorias en la base de datos
Route::post('/newSubCategory', [subCategoriaController::class, 'store'])->name('subCategorias.create');
//Ruta para retornar a la vista de editar subcategoria
Route::get('/editSubCategory/{id_subCategory}', [subCategoriaController::class, 'view'])->name('subCategorias.edit');
//Ruta para actualizar la subcategoria
Route::post('/updateSubCategory', [subCategoriaController::class, 'update'])->name('subCategorias.update');
//Ruta para eliminar la subcategoria de la base de datos
Route::get('/deleteSubCategory/{id_subCategory}', [subCategoriaController::class, 'delete'])->name('subCategorias.delete');


//Ruta para retornar la vista de  listdo de ventas
Route::get('/ventas', [VentasController::class,'index'])->name('ventas.index');
//Ruta para retornar la vista de detalles de ventas
Route::get('/ventasDetalles',[VentasController::class,'show'])->name('ventas.show');
//Ruta para retornar la vista de devoluciones
Route::get('/ventasDevolucion',[VentasController::class,'mostrar'])->name('ventas.devoluciones');

//Ruta para retonar la vista de proveedores
Route::get('/suppliers',[SupplierController::class,'index'])->name('supplier.index');
//Ruta para retornar a la vista de añadir proveedor
Route::get('/suppliers/create',[SupplierController::class,'create'])->name('supplier.create');
//Ruta para almacenar proveedor en la base de datos
Route::post('/suppliers/create',[SupplierController::class,'store']);
//Ruta para retornar la vista de editar proveedor
Route::get('/suppliers/update/{id_proveedor}',[SupplierController::class,'edit'])->name('supplier.edit');
//Ruta para actualizar la informacion del proveedor
Route::post('/suppliers/update',[SupplierController::class,'update'])->name('supplier.update');
//Ruta para eliminar el proveedor
Route::get('/suppliers/delete/{id_proveedor}',[SupplierController::class,'delete'])->name('supplier.delete');


//Ruta para retonar la vista de clientes
Route::get('/clientes',[ClientesController::class,'index'])->name('clientes.index');
//Ruta para rtornar a la vista de añadir clientes
Route::get('/clientes/create',[ClientesController::class,'create'])->name('clientes.create');
//Ruta para retornar a la vista de añadir clientes
Route::post('/clientes/create',[ClientesController::class,'store'])->name('clientes.create');
//Ruta para retornar la vista de editar cliente
Route::get('/clientes/update/{id_cliente}',[ClientesController::class,'edit'])->name('clientes.edit');
//Ruta para actualizar la info del cliente
Route::post('/clientes/update',[ClientesController::class,'update'])->name('clientes.update');
//Ruta para eliminar el cliente
Route::get('/clientes/delete/{id_cliente}',[ClientesController::class,'delete'])->name('clientes.delete');

//Ruta para la vista de recibos
Route::get('/recibos',[RecibosController::class,'index'])->name('recibos.index');


//Ruta para procesar la imagenes en el controlador
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagen.store');



