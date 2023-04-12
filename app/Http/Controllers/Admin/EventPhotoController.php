<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventPhotoRequest;
use App\Models\Event;
use App\Services\MessageService;
use App\Traits\UploadTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EventPhotoController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return Response|string
     */
    public function index($eventId)
    {
        /** @var Event $event */
        $event = Auth()->user()->events()->findOrFail($eventId);

        return view('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventPhotoRequest $request
     * @param $eventId
     * @return RedirectResponse
     */
    public function store(EventPhotoRequest $request, $eventId)
    {
        /** @var Event $event */
        $event = Auth()->user()->events()->findOrFail($eventId);
        $photos = $request->validated()['photos'];
        $folder = "events/{$eventId}/photos";
        $uploadedPhotos = $this->multipleUploads($photos, $folder, 'photo');

//        foreach ($request->validated()['photos'] as $item) {
//            $uploadedPhotos[] = ['photo' => $item->store("events/{$eventId}/photos", 'public')];
//        }

        $event->photos()->createMany($uploadedPhotos);

        MessageService::addFlash('success', 'Foto(s) adicionada(s) com sucesso!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $eventId
     * @param $photo
     * @return Application|Factory|View
     */
    public function destroy($eventId, $photo)
    {
        /** @var Event $event */
        $event = Auth()->user()->events()->findOrFail($eventId);

        $photo = $event->photos()->findOrFail($photo);
        Storage::disk('public')->delete($photo->photo);
        $photo->delete();

        MessageService::addFlash('success', 'Foto removida com sucesso!');
        return view('admin.events.photos', compact('event'));
    }
}
