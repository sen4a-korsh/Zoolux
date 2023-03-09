<?php

use App\Http\Controllers\CheckController;
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

Route::get('/', [CheckController::class, 'index'])->name('check.index');;
Route::post('/', [CheckController::class, 'store'])->name('check.store');;
