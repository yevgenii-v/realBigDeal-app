<?php

use App\Http\Controllers\Control\ImpersonateController;
use App\Http\Controllers\Control\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Market\CategoryController;
use App\Http\Controllers\Market\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Market
Route::group(['prefix' => 'market', 'middleware' => 'auth', 'as' => 'market.'], function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

//Control Panel
Route::group(['prefix' => 'control', 'middleware' => 'auth', 'as' => 'control.'], function () {
    Route::post('/users/destroyAll', [UserController::class, 'destroyAll'])->name('users.destroyAll');
    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('/impersonate/user/{id}', [ImpersonateController::class, 'index'])->name('impersonate');
});

//Ticket
Route::group(['middleware' => 'auth'], function () {
    Route::post('/tickets/destroyAll', [TicketController::class, 'destroyAll'])->name('tickets.destroyAll');
    Route::patch('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::get('/tickets/{ticket}/read/', [TicketController::class, 'read'])->name('tickets.read');
    Route::post('/tickets/postReply', [TicketController::class, 'postReply'])->name('tickets.postReply');
    Route::resource('tickets', TicketController::class)->only(['index', 'create', 'store', 'update']);
});

Route::get('/control/impersonate/destroy', [ImpersonateController::class, 'destroy'])
    ->name('control.impersonate.destroy');

require __DIR__.'/auth.php';
