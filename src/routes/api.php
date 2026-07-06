<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\BlueprintApiController;
use App\Http\Controllers\Api\AreaApiController;
use App\Http\Controllers\Api\MachineApiController;

Route::get('/items', [ItemApiController::class, 'index']);
Route::get('/items/{item}', [ItemApiController::class, 'show']);

Route::get('/blueprints', [BlueprintApiController::class, 'index']);

Route::get('/areas', [AreaApiController::class, 'index']);

Route::get('/machines', [MachineApiController::class, 'index']);