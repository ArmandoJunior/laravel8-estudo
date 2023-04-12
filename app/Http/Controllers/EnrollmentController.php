<?php

namespace App\Http\Controllers;

use App\Mail\UserEnrollmentMail;
use App\Models\Event;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnrollmentController extends Controller
{
    public function start(Event $event)
    {
        session()->put('enrollment', $event->id);

        return redirect()->route('enrollment.confirm');
    }

    public function confirm()
    {
        if (!session()->has('enrollment')) {
            return redirect()->route('home');
        }

        $event = Event::query()->find(session('enrollment'));

        if($event->enrollments->contains(auth()->user())) {
            MessageService::addFlash('dark', 'Você já está inscrito neste evento!');
            return redirect()->route('event.single', $event->slug);
        }

        return view('enrollment-confirm', compact('event'));
    }

    public function proccess()
    {
        if (!session()->has('enrollment')) return redirect()->route('home');
        /** @var User $user */
        $user = auth()->user();
        $event = Event::query()->find(session('enrollment'));

        $event->enrollments()->attach([
            $user->id => [
                'reference' => uniqid(),
                'status' => 'ACTIVE']
        ]);
        session()->forget('enrollment');

        Mail::to($user)
            ->send(new UserEnrollmentMail($user, $event));
        MessageService::addFlash('success', 'Parabéns, agora você está inscrito neste evento!');
        MessageService::addFlash('dark', 'Verifique as orientações sobre o evento no seu email!');

        return redirect()->route('event.single', $event->slug);
    }
}
