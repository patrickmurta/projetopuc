<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

########################
###### SOCIALITE ########
########################
// Make Login
//Route::get('login/{provider}', ['App\Http\Controllers\SocialController', 'redirect']);
// Make redirection
//Route::get('login/{provider}/callback',['App\Http\Controllers\SocialController', 'Callback']);
########################
###### /SOCIALITE ########
########################
Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::get('login/{provider}', 'App\Http\Controllers\LoginController@redirectToProvider');
Route::get('{provider}/callback', 'App\Http\Controllers\LoginController@handleProviderCallback');
Route::get('/home', function () {
    return 'User is logged in';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('usuarios')->group(function(){
    // Index grid usuários
    Route::get('/', ['App\Http\Controllers\UsersGrid', 'index'])->name('list_users');
    Route::get('/destroy', ['App\Http\Controllers\UsersGrid', 'destroy']);
});

// Relatorio
Route::get('/relatorio', ['App\Http\Controllers\PedidosController', 'genGrafico']);

//Route::get('relatorio/json', ['App\Charts\ProdutosMaisVendidos', 'dataResponse']);

// Rota para fornecedores
Route::prefix('fornecedores')->group(function (){
    // index CURD = Create, Update, Read, Destroy
    Route::get('/', ['App\Http\Controllers\FornecedoresController', 'index'])->name('fornecedores');
    // create show the form
    Route::get('/create', ['App\Http\Controllers\FornecedoresController', 'create'])->name('create');
    // add
    Route::post('/store', ['App\Http\Controllers\FornecedoresController', 'store']);
    // edit form
    Route::get('/edit/{id}', ['App\Http\Controllers\FornecedoresController', 'edit'])->name('edit');
    // update form
    Route::post('/update', ['App\Http\Controllers\FornecedoresController', 'update'])->name('update');
    // destroy
    Route::get('/destroy/{id}', ['App\Http\Controllers\FornecedoresController', 'destroy']);
});

// Rota para unidades
Route::prefix('unidades')->group(function (){
    // index CURD = Create, Update, Read, Destroy
    Route::get('/', ['App\Http\Controllers\UnidadesController', 'index'])->name('unidade');
    // create show the form
    Route::get('/create', ['App\Http\Controllers\UnidadesController', 'create'])->name('unidade_create');
    // add
    Route::post('/store', ['App\Http\Controllers\UnidadesController', 'store']);
    // edit form
    Route::get('/edit/{id}', ['App\Http\Controllers\UnidadesController', 'edit'])->name('unidade_edit');
    // update form
    Route::post('/update', ['App\Http\Controllers\UnidadesController', 'update'])->name('unidade_update');
    // destroy
    Route::get('/destroy/{id}', ['App\Http\Controllers\UnidadesController', 'destroy']);
});

// Rota para Produtos
Route::prefix('produtos')->group(function (){
    // index CURD = Create, Update, Read, Destroy
    Route::get('/', ['App\Http\Controllers\ProdutosController', 'index'])->name('produtos');
    // create show the form
    Route::get('/create', ['App\Http\Controllers\ProdutosController', 'create'])->name('produtos_create');
    // add
    Route::post('/store', ['App\Http\Controllers\ProdutosController', 'store']);
    // edit form
    Route::get('/edit/{id}', ['App\Http\Controllers\ProdutosController', 'edit'])->name('produtos_edit');
    // update form
    Route::post('/update', ['App\Http\Controllers\ProdutosController', 'update'])->name('produtos_update');
    // destroy
    Route::get('/destroy/{id}', ['App\Http\Controllers\ProdutosController', 'destroy']);
});

// Rota para pedidos
Route::prefix('pedidos')->group(function (){
    // index CURD = Create, Update, Read, Destroy
    Route::get('/', ['App\Http\Controllers\PedidosController', 'index'])->name('pedidos');
    // create show the form
    Route::get('/create', ['App\Http\Controllers\PedidosController', 'create'])->name('pedidos_create');
    // add
    Route::post('/store', ['App\Http\Controllers\PedidosController', 'store']);
    // edit form
    Route::get('/edit/{id}', ['App\Http\Controllers\PedidosController', 'edit'])->name('pedidos_edit');
    // update form
    Route::post('/update', ['App\Http\Controllers\PedidosController', 'update'])->name('pedidos_update');
    // destroy
    Route::get('/destroy/{id}', ['App\Http\Controllers\PedidosController', 'destroy']);
    // gen the PDF of pedidos
    Route::get('pdf', ['App\Http\Controllers\PedidosController', 'genPdf'])->name('pdf');
});
