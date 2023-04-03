<?php

use App\Http\Controllers\EventController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/eventos/{slug}', [HomeController::class, 'show']);

Route::get('view-test', fn() => view('test.index'));

Route::get('/event/index', [EventController::class, 'index']);
Route::get('/event/store', [EventController::class, 'store']);
Route::get('/event/update/{event}', [EventController::class, 'update']);
Route::get('/event/destroy/{event}', [EventController::class, 'destroy']);

Route::get('/queries/{id?}', function ($id = null) {
    if (is_null($id)) {
        $event = new Event();
        $event->title = 'Evento via Eloquente e Active Record';
        $event->description = 'DEscrição do evento...';
        $event->body = 'Conteúdo do evento...';
        $event->start_event = date('Y-m-d H:i:s');
        $event->slug = Str::slug($event->title);
        $event->save();

        return $event->id;
    }
    return Event::query()->find($id);
});

Route::get('/teste', [HelloWorldController::class, 'teste']);

Route::get('/parametros/{name?}', [HelloWorldController::class, 'parametros']);
