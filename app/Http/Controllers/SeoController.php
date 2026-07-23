<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class SeoController
{
    public function sitemap(): Response
    {
        return response()
            ->view('seo.sitemap', [
                'posts' => Post::query()
                    ->published()
                    ->orderByDesc('updated_at')
                    ->get(['id', 'slug', 'updated_at']),
            ])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        return response(implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin/',
            '',
            'Sitemap: '.route('sitemap'),
            '',
        ]))->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
