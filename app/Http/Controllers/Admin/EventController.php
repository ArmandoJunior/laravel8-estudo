<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // Recuperar uma instancia do Request
        $request = request();

        // Recuperar o conteúdo total do form enviado como aray associativo
        $allFormContent = $request->all();

        // Recuperar uma chave especifica do envio do form
        $formTitle = request('title') || request()->get('title');

        // Recuperar uma chave especifica do envio como propriedade...
        $formTitleFromProp = request()->title;

        $allFormContent['slug'] = Str::slug($allFormContent['title']);
        Event::query()->create($allFormContent);

        return redirect()->to('/admin/events/index');
    }

    public function edit($event)
    {
        $event = Event::query()->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, \Illuminate\Http\Request $request)
    {
        $event = Event::query()->findOrFail($event);
        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy ($event)
    {
        $event = Event::query()->findOrFail($event);
        $event->delete();

        return redirect()->to('/admin/events/index');
    }
}
