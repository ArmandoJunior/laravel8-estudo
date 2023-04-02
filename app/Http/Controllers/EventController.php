<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store()
    {
        $title = 'Atribuição em massa do evento model' . rand(1, 1000);
        $event = [
            'title' => $title,
            'description' => 'Atribuição em massa descrição do evento',
            'body' => 'Atribuição em massa body do evento',
            'slug' => Str::slug($title),
            'start_event' => date('Y-m-d H:i:s'),
        ];

        return Event::query()->create($event);
    }

    public function update($event)
    {
        $title = 'Atribuição em massa do evento model atualizado' . rand(1, 1000);
        $eventData = [
            'title' => $title,
            'description' => 'Atribuição em massa descrição do evento atualizado',
            'body' => 'Atribuição em massa body do evento atualizado',
            'lug' => Str::slug($title),
//            'start_event' => date('Y-m-d H:i:s'),
        ];

        $event = Event::query()->find($event);
        $event->update($eventData);
        return $event;

    }

    public function destroy ($event)
    {
        $event = Event::query()->findOrFail($event);
        return $event->delete($event);
    }
}
