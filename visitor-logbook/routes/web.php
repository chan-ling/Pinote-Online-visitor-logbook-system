<?php

use App\Http\Controllers\VisitorController;

Route::get('/', [VisitorController::class, 'index'])->name('visitors.index');
Route::get('/create', [VisitorController::class, 'create'])->name('visitors.create');
Route::post('/store', [VisitorController::class, 'store'])->name('visitors.store');
Route::post('/exit/{id}', [VisitorController::class, 'markExit'])->name('visitors.exit');

Route::post('/visitors/{id}/exit', [VisitorController::class, 'markExit'])->name('visitors.markExit');


Route::get('/daily-report', [VisitorController::class, 'dailyReport'])->name('visitors.daily');

