<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\API\PharmacieController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Manager\MangerController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->middleware(['AccessAuth:admin'])->name('admin.')->group(function () {
        Route::resource('/', AdminController::class);
    });

    Route::prefix('user')->middleware(['AccessAuth:user'])->name('user.')->group(function () {
        Route::resource('/', UserController::class);

    });

    Route::prefix('manager')->middleware(['AccessAuth:manager'])->name('manager.')->group(function () {
        Route::resource('/', MangerController::class);

    });

});

require __DIR__.'/auth.php';
