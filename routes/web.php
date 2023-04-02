<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $events = \App\Models\Event::all();

    return view('welcome', compact('events'));
});

Route::get('view-test', fn() => view('test.index'));

Route::get('/event/index', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('/event/store', [\App\Http\Controllers\EventController::class, 'store']);
Route::get('/event/update/{event}', [\App\Http\Controllers\EventController::class, 'update']);
Route::get('/event/destroy/{event}', [\App\Http\Controllers\EventController::class, 'destroy']);

Route::get('/queries/{id?}', function ($id = null) {
    if (is_null($id)) {
        $event = new \App\Models\Event();
        $event->title = 'Evento via Eloquente e Active Record';
        $event->description = 'DEscrição do evento...';
        $event->body = 'Conteúdo do evento...';
        $event->start_event = date('Y-m-d H:i:s');
        $event->slug = \Illuminate\Support\Str::slug($event->title);
        $event->save();

        return $event->id;
    }
    return \App\Models\Event::query()->find($id);
});

Route::get('/teste', [\App\Http\Controllers\HelloWorldController::class, 'teste']);

Route::get('/parametros/{name?}', [\App\Http\Controllers\HelloWorldController::class, 'parametros']);
