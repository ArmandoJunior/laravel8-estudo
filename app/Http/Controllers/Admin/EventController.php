<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('user.can.edit.event')->only('edit', 'update');
    }

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
        $event = $request->validated();
//        $event['banner'] = ($request->file('banner')??null)?->store('banner', 'public');
        $event = (auth()->user()->events()->create($event));
        if($banner = $request->file('banner')) {
            $event['banner'] = $this->upload($banner, "events/{$event->id}/banner/");
            $event->update();
        }

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
        $eventData = $request->all();
        if($banner = $request->file('banner')) {
            Storage::disk('public')->delete($event->banner);
            $eventData['banner'] = $this->upload($banner, "events/{$event->id}/banner/");
        }
        $event->update($eventData);

        return redirect()->back();
    }

    public function destroy ($event)
    {
        $event = Auth()->user()->events()->findOrFail($event);
        $event->delete();

        return redirect()->to(route('admin.events.index'));
    }
}
