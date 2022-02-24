<?php

use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BannerController;
use App\Http\Controllers\Web\PessoaController;
use App\Http\Controllers\Web\VacinaController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PostCategorieController;

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
        'postcategorie' =>  PostCategorieController::class,
    ]);

    Route::get('banner/{id}/status', [BannerController::class, 'statusToggleBanner'])->name('banner.status');
});