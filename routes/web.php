<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// Arahkan root ke FEANE
Route::get('/', function () {
    return redirect('/feane');
});

// Serve FEANE (static)
Route::get('/feane/{path?}', function ($path = null) {
    $file = public_path('feane/' . ($path ?: 'index.html'));

    if (!file_exists($file)) {
        abort(404);
    }

    return response()->file($file);
})->where('path', '.*');