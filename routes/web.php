<?php

use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BannerController;
use App\Http\Controllers\Web\PessoaController;
use App\Http\Controllers\Web\VacinaController;
use App\Http\Controllers\Web\FabricanteController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\RegistroVacinacaoController;
use App\Http\Controllers\Web\LoteController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PostCategorieController;
use App\Http\Controllers\Web\DoencaController;

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

//Routes de auth
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Routes do sistema
Route::prefix('admin/')->name('admin.')->middleware("auth:web")->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::resources([
        'aboutus'=>  AboutUsController::class,
        'banner' =>  BannerController::class,
        'contact' =>  ContactController::class,
        'pessoa' =>  PessoaController::class,
        'vacina' =>  VacinaController::class,
        'fabricante' => FabricanteController::class,
        'doenca' => DoencaController::class,
        'postcategorie' =>  PostCategorieController::class,
    ]);

    //Routes registro vacinacao
    Route::resource('registrovacinacao', RegistroVacinacaoController::class)->except(['edit','update','destroy']);
    Route::get('/registrovacinacao/{id_Pessoa}/{id_Vacina}/{dataVacinacao}/edit', [RegistroVacinacaoController::class, 'editar'])->name('registrovacinacao.editar');
    Route::put('/registrovacinacao/{id_Pessoa}/{id_Vacina}/{dataVacinacao}', [RegistroVacinacaoController::class, 'atualizar'])->name('registrovacinacao.atualizar');
    Route::delete('/registrovacinacao/{id_Pessoa}/{id_Vacina}/{dataVacinacao}', [RegistroVacinacaoController::class, 'deletar'])->name('registrovacinacao.deletar');
    
    //Routes lotes
    
    Route::resource('lote',LoteController::class)->except(['edit','update','destroy', 'show']);
    Route::get('/lote/{idLote}/{dataRecebimento}/edit', [LoteController::class, 'editar'])->name('lote.editar');
    Route::get('/lote/{idLote}/{dataRecebimento}', [LoteController::class, 'mostrar'])->name('lote.mostrar');
    Route::put('/lote/{idLote}/{dataRecebimento}', [LoteController::class, 'atualizar'])->name('lote.atualizar');
    Route::delete('/lote/{idLote}/{dataRecebimento}', [LoteController::class, 'deletar'])->name('lote.deletar');
    Route::get('/lote/{id_Vacina}', [LoteController::class, 'listarLotes'])->name('lote.lista');


    //Routes banner
    Route::get('banner/{id}/status', [BannerController::class, 'statusToggleBanner'])->name('banner.status');
});