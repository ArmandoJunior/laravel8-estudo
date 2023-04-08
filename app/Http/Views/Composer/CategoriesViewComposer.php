<?php

namespace App\Http\Views\Composer;

use App\Models\Category;

class CategoriesViewComposer
{
    public function composer($view)
    {
        return $view->with('categories', Category::query()->orderBy('name')->get(['id', 'name']));
    }
}
