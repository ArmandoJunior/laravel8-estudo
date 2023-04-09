<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Event $event)
    {
        $search = request()->query('search');
        $categoryId = request()->query('category') | request()->query('categoryId');
        $category = $categoryId ? Category::query()->where('id', $categoryId)->first():false;
        $events = $category?$category->events():Event::query();
        $events = $events->when($search, function ($qBuilder) use($search) {
                return $qBuilder->where('title', 'LIKE', "%{$search}%");
            })
            ->whereDate('start_event', '>=', now())
            ->orderBy('start_event', 'desc')
            ->paginate(15);

        return view('home', compact('events', 'search', 'categoryId'));
    }

    public function show(Event $event)
    {
        return view('event', compact('event'));
    }
}
