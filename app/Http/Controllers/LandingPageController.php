<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class LandingPageController
{
    public function __invoke(): View
    {
        return view('landing.index', [
            'sections' => LandingSection::query()->active()->ordered()->get(),
            'posts' => Post::query()->latestPublished()->limit(6)->get(),
        ]);
    }
}
