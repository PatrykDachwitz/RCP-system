<?php
declare(strict_types=1);

use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\PresenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\DepartmentController;
use \App\Http\Controllers\Api\DayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'middleware' => [
        "auth:sanctum",
        'activeUser'
    ]
], function () {
    Route::apiResource('days', DayController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('histories', HistoryController::class);
    Route::apiResource('holidays', HolidayController::class);
    Route::apiResource('positions', PositionController::class);
    Route::apiResource('presences', PresenceController::class);
});
