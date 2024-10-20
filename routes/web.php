<?php

use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [PageController::class, 'index']);

Route::get('/ciao', function () {
    return view('homepage');
});

// controlling if laravel has problem with db..
Route::get('/health', function () {
    return response()->json(['status' => 'healthy'], 200);
});

Route::get('/health-db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'healthy', 'database' => 'connected'], 200);
    } catch (\Exception $e) {
        return response()->json(['status' => 'unhealthy', 'error' => $e->getMessage()], 500);
    }
});
