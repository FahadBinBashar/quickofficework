<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

Route::get('/merge', [App\Http\Controllers\PDFController::class, 'showMergeForm']);
Route::post('/merge', [App\Http\Controllers\PDFController::class, 'mergePDF']);

Route::get('/split', [PDFController::class, 'showSplitForm']);
Route::post('/split', [PDFController::class, 'splitPDF']);

Route::get('/compress', [PDFController::class, 'showCompressForm']);
Route::post('/compress', [PDFController::class, 'compressPDF']);