<?php

use App\Models\Division;
use App\Models\Inventory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardItemController;
use App\Http\Controllers\DashboardDivisionController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardInventoryController;

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
    return view('index', [
        'divisions' => Division::all(),
    ]);
});




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/items', DashboardItemController::class);
Route::resource('/divisions', DashboardDivisionController::class);
Route::resource('/employees', DashboardEmployeeController::class);
Route::resource('/inventories', DashboardInventoryController::class);
