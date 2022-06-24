<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\loginController;

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
    return view('pages.login');
});

Route::resources([
    'login' => loginController::class,
    'brief' => BriefController::class,
]);


// Route::get('/logout',[loginController::class,'create'])->name('logout');