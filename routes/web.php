<?php

use App\Http\Controllers\AnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/', [ AnalysisController::class, 'analyze' ])->name('analyze');

Route::get('/upload', function () {
    return view('upload');
})->name('upload');