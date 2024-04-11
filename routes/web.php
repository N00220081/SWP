<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Member
Route::resource('/member', MemberController::class)->middleware(['auth']);
Route::get('/member/{member}', [MemberController::class, 'show'])->name('members.show');
Route::post('/member', [MemberController::class, 'store'])->name('members.store');
Route::get('/member/create', [MemberController::class, 'create'])->name('members.create');
Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/member/{member}', [MemberController::class, 'update'])->name('members.update');

// Usage
Route::resource('/usage', UsageController::class)->middleware(['auth']);







require __DIR__.'/auth.php';