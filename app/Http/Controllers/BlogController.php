<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

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
            'sections' => LandingSection::query()->active()->ordered()->get(),
            'seo' => $this->seoData($post),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function seoData(Post $post): array
    {
        $canonical = route('blog.show', $post);
        $description = Str::of($post->excerpt ?: strip_tags($post->content))
            ->squish()
            ->limit(160)
            ->toString();
        $image = $post->featured_image
            ? asset('storage/'.$post->featured_image)
            : asset(config('seo.default_image'));
        $publishedTime = $post->published_at?->toIso8601String();
        $modifiedTime = $post->updated_at->toIso8601String();

        return [
            'title' => $post->title.' | ProSigmaka Insights',
            'description' => $description,
            'canonical' => $canonical,
            'image' => $image,
            'type' => 'article',
            'publishedTime' => $publishedTime,
            'modifiedTime' => $modifiedTime,
            'structuredData' => [
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $post->title,
                'description' => $description,
                'image' => [$image],
                'datePublished' => $publishedTime,
                'dateModified' => $modifiedTime,
                'mainEntityOfPage' => $canonical,
                'author' => [
                    '@type' => 'Organization',
                    'name' => config('seo.site_name'),
                    'url' => route('landing'),
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => config('seo.site_name'),
                    'url' => route('landing'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset(config('seo.logo')),
                    ],
                ],
            ],
        ];
    }
}
