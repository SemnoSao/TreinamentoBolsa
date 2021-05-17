<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Models\Livro;

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

Route::get('/test', function () {
    phpinfo();
});

Route::get('/greet/{name}', function ($name) {
    return view('greeting', ['name' => $name]);
});

Route::get('/livros/cadastrar', [LivroController::class, 'create'] )->name('cadastrar.livro');
Route::post('/livros/cadastrar', [LivroController::class, 'store'] )->name('salvar.livro');
Route::get('/livro/{id}', [LivroController::class, 'show'] )->name('mostrar.livro');
Route::get('livro/{id}/editar', [LivroController::class, 'edit'])->name('editar.livro');
Route::post('livro/{id}/editar', [LivroController::class, 'update'])->name('atualizar.livro');
Route::get('livro/{id}/excluir', [LivroController::class, 'delete'])->name('excluir.livro');
Route::post('livro/{id}/excluir', [LivroController::class, 'destroy'])->name('deletar.livro');
Route::get('livros', [LivroController::class, 'index'])->name('index.livro');
