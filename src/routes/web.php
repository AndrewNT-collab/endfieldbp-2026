<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\WebItemController;
use App\Http\Controllers\WebBlueprintController;
use App\Http\Controllers\WebAreaController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $areas = \App\Models\Area::with([
        'blueprints.resultItem',
        'blueprints.machines',
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

Route::get('/map', function () {
    return view('map');
})->name('map');

Route::get('/map/valley-iv', function () {
    return view('maps.valley-iv');
})->name('maps.valley-iv');

Route::get('/map/wuling', function () {
    return view('maps.wuling');
})->name('maps.wuling');

Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::post('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::get('/profile/edit', function () { return view('profile.edit'); })->name('profile.edit');

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});