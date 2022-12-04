<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemApiController;
use App\Http\Controllers\DivisionApiController;
use App\Http\Controllers\EmployeeApiController;
use App\Http\Controllers\InventoryApiController;
use App\Http\Controllers\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('/divisions', DivisionApiController::class);
Route::apiResource('/items', ItemApiController::class);
Route::apiResource('/employees', EmployeeApiController::class);
Route::apiResource('/inventories', InventoryApiController::class);
Route::apiResource('/users', UserApiController::class);
