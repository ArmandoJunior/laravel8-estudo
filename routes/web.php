<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventPhotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event:slug}', [HomeController::class, 'show'])->name('event.single');

Route::prefix('/enrollment')->name('enrollment.')->group(function () {
    Route::get('/start/{event:slug}', [EnrollmentController::class, 'start'])->name('start');
    Route::get('/confirm', [EnrollmentController::class, 'confirm'])->name('confirm')->middleware('auth');
    Route::get('/proccess', [EnrollmentController::class, 'proccess'])->name('proccess')->middleware('auth');
});

Route::middleware(['auth', 'verified'])->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('events', EventController::class)->except('show');
    Route::resource('events.photos', EventPhotoController::class)
        ->only('index', 'store', 'destroy');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('/email')->name('verification.')->group(function () {
    Route::get('/verify', function () {
        return view('auth.verify');
    })->middleware('auth')->name('notice');
    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/admin/events');
    })->middleware(['auth', 'signed'])->name('verify');
    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('send');
});

Auth::routes();
