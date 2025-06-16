<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

Route::get('/merge', [PDFController::class, 'showMergeForm']);
Route::post('/merge', [PDFController::class, 'mergePDF']);
Route::get('/split', [PDFController::class, 'showSplitForm']);
Route::post('/split', [PDFController::class, 'splitPDF']);
Route::get('/compress', [PDFController::class, 'showCompressForm']);
Route::post('/compress', [PDFController::class, 'compressPDF']);
Route::get('/pdf-to-image', [PDFController::class, 'showPdfToImageForm']);
Route::post('/pdf-to-image', [PDFController::class, 'convertPdfToImage']);
Route::get('/image-to-pdf', [PDFController::class, 'showImageToPdfForm']);
Route::post('/image-to-pdf', [PDFController::class, 'convertImageToPdf']);
