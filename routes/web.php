<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduledClassController;

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
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Route::get('/{role}/dashboard', [DashboardController::class, 'show'])
    //     ->where('role', 'member|instructor|admin')
    //     ->name('dashboard.role');
    Route::get('/member/dashboard', [DashboardController::class, 'member'])->middleware('role:member')->name('member.dashboard');
    Route::get('/instructor/dashboard', [DashboardController::class, 'instructor'])->middleware('role:instructor')->name('instructor.dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->middleware('role:admin')->name('admin.dashboard');
});

Route::resource('/instructor/schedule', ScheduledClassController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware('role:instructor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
