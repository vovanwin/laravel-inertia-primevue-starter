<?php

declare(strict_types=1);

use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function (): void {
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/role', RoleController::class);
    Route::apiResource('/permissions', PermissionController::class);
});
