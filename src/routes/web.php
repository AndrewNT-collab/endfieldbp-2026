<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\WebItemController;
use App\Http\Controllers\WebBlueprintController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/items', [WebItemController::class, 'index'])->name('items.index');
Route::get('/items/{item}', [WebItemController::class, 'show'])->name('items.show');
Route::get('/blueprints', [WebBlueprintController::class, 'index'])->name('blueprints.index');
Route::get('/blueprints/{blueprint}', [WebBlueprintController::class, 'show'])
    ->name('blueprints.show');
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});