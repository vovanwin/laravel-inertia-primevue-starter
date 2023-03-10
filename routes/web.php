<?php

declare(strict_types=1);

use App\Http\Controllers\ViewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => redirect()->route('dashboard'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (): void {
    Route::get('/users', [ViewController::class, 'users'])->name('users');
    Route::get('/roles', [ViewController::class, 'roles'])->name('roles');
    Route::get('/permissions', [ViewController::class, 'permissions'])->name('permissions');
});
