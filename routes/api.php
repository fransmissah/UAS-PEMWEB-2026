<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;

/*
|--------------------------------------------------------------------------
| Public API (tanpa API key)
|--------------------------------------------------------------------------
*/
Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'API hidup',
    ]);
});

/*
|--------------------------------------------------------------------------
| Protected API (WAJIB API KEY)
|--------------------------------------------------------------------------
*/
Route::middleware('auth.api')->group(function () {

    // test auth
    Route::get('/user', function () {
        return response()->json([
            'status' => 'ok',
            'message' => 'Authorized',
        ]);
    });

    // booking
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings', [BookingController::class, 'index']);
});