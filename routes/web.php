<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/',[ProjectController::class, 'index']) ;
Route::get('/projects',[ProjectController::class, 'index'])->name('projects') ;
Route::post('create',[ProjectController::class, 'store'])->name('create');


