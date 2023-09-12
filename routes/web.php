<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Screencast\PlaylistController;
use App\Http\Controllers\Screencast\TagController;
use App\Http\Controllers\Screencast\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('permission:create playlists')->group(function () {
        Route::prefix('playlists')->group(function () {
            Route::get('table', [PlaylistController::class, 'table'])->name('playlists.table');
            Route::get('create', [PlaylistController::class, 'create'])->name('playlists.create');
            Route::post('create', [PlaylistController::class, 'store']);
            Route::get('{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
            Route::put('{playlist:slug}/edit', [PlaylistController::class, 'update']);
            Route::delete('{playlist:slug}/delete', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
        });

        Route::prefix('videos/{playlist:slug}')->group(function () {
            Route::get('/', [VideoController::class, 'table'])->name('videos.table');
            Route::get('create', [VideoController::class, 'create'])->name('videos.create');
            Route::post('create', [VideoController::class, 'store']);
            Route::get('edit/{video:unique_video_id}', [VideoController::class, 'edit'])->name('videos.edit');
            Route::put('edit/{video:unique_video_id}', [VideoController::class, 'update']);
            Route::delete('delete/{video:unique_video_id}', [VideoController::class, 'delete'])->name('videos.destroy');
        });
    });

    Route::prefix('tags')->group(function () {
        Route::middleware('permission:create tags')->group(function () {
            Route::get('table', [TagController::class, 'table'])->name('tags.table');
            Route::get('create', [TagController::class, 'create'])->name('tags.create');
            Route::post('create', [TagController::class, 'store']);
        });

        Route::middleware('permission:delete tags|edit tags')->group(function () {
            Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
            Route::put('{tag:slug}/edit', [TagController::class, 'update']);
            Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('tags.destroy');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
