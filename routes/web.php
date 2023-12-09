<?php

use App\Http\Controllers\Admin\{
    DompdfController,
    ExcelController,
    HomeController
};

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
    return view('welcome');
});

Auth::routes();


Route::prefix('admin')->group(function () {
    //Home
    Route::get('home',          [HomeController::class, 'index'])->name('home');

    //PDF
    Route::get('dompdf',        [DompdfController::class, 'index']);
    Route::get('dompdf/{id}',   [DompdfController::class, 'show']);

    //Excel
    Route::get('excel',         [ExcelController::class, 'index']);
    Route::get('excel/{id}',    [ExcelController::class, 'show']);
});
