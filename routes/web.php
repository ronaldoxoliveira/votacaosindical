<?php

use App\Http\Controllers\Front\CheckeleitorController;
use App\Http\Controllers\Front\VotaeleicaoController;
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

Route::get('/fronts/', [CheckeleitorController::class,'index'])->name('passo1');
Route::match(['get','post'],'/fronts/validacpf', [CheckeleitorController::class,'validacpf'])->name('passo2');
Route::match(['get','post'],'/fronts/validadatanasc', [CheckeleitorController::class,'validadatanasc'])->name('passo3');

Route::get('/fronts/votaeleicao', [VotaeleicaoController::class,'index'])->name('eleicao1');
Route::match(['get','post'],'/fronts/votachapa', [VotaeleicaoController::class,'showchapas'])->name('eleicao2');
Route::match(['get','post'],'/fronts/registravoto', [VotaeleicaoController::class,'storevoto'])->name('eleicao3');


