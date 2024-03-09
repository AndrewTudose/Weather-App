<?php

use App\Http\Controllers\WeatherInformationController;
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


Route::get('/', function () {
    return redirect('weather');
});

Route::get('admin/weather', function () {
    return redirect('weather');
});

Route::get('weather', [WeatherInformationController::class, 'index'])->name('weather.index');







