<?php

use App\Livewire\Crud;
use App\Livewire\CrudDialog;
use App\Livewire\Home;
use App\Livewire\UploadFile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Move here, Check : app/Providers/RouteServiceProvider.php
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::prefix('basic')->group(function () {
//     Route::get('crud', Crud::class);
// });

Route::get('home', Home::class);
Route::get('crud', Crud::class);
Route::get('crud-dialog', CrudDialog::class);
Route::get('upload-file', UploadFile::class);
