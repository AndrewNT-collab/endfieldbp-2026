<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\WebItemController;
use App\Http\Controllers\WebBlueprintController;
use App\Http\Controllers\WebAreaController;

Route::get('/', function () {
    $areas = \App\Models\Area::with([
        'blueprints.resultItem',
        'blueprints.machine',
    ])->withCount('blueprints')->get();
    return view('dashboard', compact('areas'));
})->name('dashboard');

Route::get('/items', [WebItemController::class, 'index'])->name('items.index');

Route::get('/items/{item}', [WebItemController::class, 'show'])->name('items.show');

Route::get('/blueprints', [WebBlueprintController::class, 'index'])->name('blueprints.index');

Route::get('/blueprints/{blueprint}', [WebBlueprintController::class, 'show'])
    ->name('blueprints.show');

Route::get('/areas/{area:slug}', [WebAreaController::class, 'show'])
    ->name('areas.show');

Route::get('/areas/{area:slug}/blueprints/create', [WebBlueprintController::class, 'create'])
    ->name('blueprints.create');

Route::post('/areas/{area:slug}/blueprints', [WebBlueprintController::class, 'store'])
    ->name('blueprints.store');

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});