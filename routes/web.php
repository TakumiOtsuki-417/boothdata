<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;

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


Route::get('/', [PostsController::class, 'index']);
Route::get('/dashboard', [PostsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostsController::class, ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::post('/posts_floor', [PostsController::class, 'floor'])->name('posts.floor');
});

Route::middleware(['auth', 'admin'])->group(function() {
   Route::resource('users', UsersController::class, ['only' => ['index', 'edit', 'update', 'destroy']]); 
});

require __DIR__.'/auth.php';
