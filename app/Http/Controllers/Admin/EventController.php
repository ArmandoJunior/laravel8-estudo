<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = auth()->user()->events()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
    {
        $allFormContent = $request->validated();
        $allFormContent['slug'] = Str::slug($allFormContent['title']);
        auth()->user()->events()->create($allFormContent);

        return redirect()->to(route('admin.events.index'));
    }

    public function edit($event)
    {
        $event = Auth()->user()->events()->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request)
    {
        $event = Auth()->user()->events()->findOrFail($event);
        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy ($event)
    {
        $event = Auth()->user()->events()->findOrFail($event);
        $event->delete();

        return redirect()->to(route('admin.events.index'));
    }
}
