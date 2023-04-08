<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventPhotoController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HomeController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{slug}', [HomeController::class, 'show'])->name('event.single');

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
//    Route::prefix('/events')->name('events.')->group(function () {
//        Route::get('/', [EventController::class, 'index'])->name('index');
//        Route::get('/create', [EventController::class, 'create'])->name('create');
//        Route::post('/store', [EventController::class, 'store'])->name('store');
//        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
//        Route::post('/update/{event}', [EventController::class, 'update'])->name('update');
//        Route::get('/destroy/{event}', [EventController::class, 'destroy'])->name('destroy');
//    });
    Route::resource('events', EventController::class)->except('show');
    Route::resource('events.photos', EventPhotoController::class)->only('index', 'show');
});

//Route::get('/queries/{id?}', function ($id = null) {
//    if (is_null($id)) {
//        $event = new Event();
//        $event->title = 'Evento via Eloquente e Active Record';
//        $event->description = 'DEscrição do evento...';
//        $event->body = 'Conteúdo do evento...';
//        $event->start_event = date('Y-m-d H:i:s');
//        $event->slug = Str::slug($event->title);
//        $event->save();
//
//        return $event->id;
//    }
//    return Event::query()->find($id);
//});
//Route::get('/teste', [HelloWorldController::class, 'teste']);
//Route::get('/parametros/{name?}', [HelloWorldController::class, 'parametros']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('view-test', fn() => view('test.index'));


