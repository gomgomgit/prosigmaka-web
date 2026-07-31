<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class BlogController
{
    public function show(Post $post): View
    {
        abort_unless(
            $post->status === Post::STATUS_PUBLISHED
                && (blank($post->published_at) || $post->published_at->lte(now())),
            404,
        );

        return view('blog.show', [
            'post' => $post,
        ]);
    }
}
