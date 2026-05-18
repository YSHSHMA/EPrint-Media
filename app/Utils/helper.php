<?php

use App\Models\Admin\Config;
use App\Models\Admin\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

if (!function_exists('configData')) {
    function configData()
    {
        return Config::first();
    }
}

if (!function_exists('getIpData')) {
    function getIpData($ip)
    {
        $response = Http::get("http://ip-api.com/json/{$ip}?fields=status,country,regionName,city");

        if ($response->successful() && $response->json('status') === 'success') {
            $country = $response->json('country');
            $state   = $response->json('regionName');
            $city    = $response->json('city');
        } else {
            $country = null;
            $state   = null;
            $city    = null;
        }

        return [
            'ip'      => $ip,
            'country' => $country,
            'state'   => $state,
            'city'    => $city,
        ];
    }
}


// schema markup
if (! function_exists('seo_post_url')) {
    function seo_post_url(Post $post): string {
        if($post->category_id == 2){
            $url = '/technology/post/';
        } elseif($post->category_id == 3){
            $url = '/finance/post/';
        } elseif($post->category_id == 4){
            $url = '/health/post/';
        } else {
            $url = '/entertainment/post/';
        }
        return url($url . $post->slug);
    }
}

if (! function_exists('seo_fallback_description')) {
    function seo_fallback_description($html, $limit = 160): string {
        return Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags((string)$html))), $limit, '');
    }
}

if (! function_exists('schema_blog_post')) {
    function schema_blog_post(Post $post): array {
        return [
            "@context" => "https://schema.org",
            "@type" => "NewsArticle",
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => seo_post_url($post)
            ],
            "headline" => $post->title,
            "description" => $post->meta_description ?: seo_fallback_description($post->detail),
            "image" => $post->thumbnail ? url($post->thumbnail) : url(configData()->header_logo),
            "author" => [
                "@type" => "Organization",
                "name" => 'TrendifyBuzz',
                "url" => "https://trendifybuzz.com"
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => 'TrendifyBuzz',
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => url(configData()->header_logo)
                ]
            ],
            "datePublished" => optional($post->published_at)->toIso8601String(),
            "dateModified" => optional($post->updated_at)->toIso8601String(),
            "url" => seo_post_url($post),
            "keywords" => $post->meta_keywords ? array_map('trim', explode(',', $post->meta_keywords)) : [],
            "articleSection" => $post->category_id==2?'Technology':($post->category_id==3?'Finance':($post->category_id==4?'Health':'Entertainment')),
            "articleBody" => strip_tags($post->detail),
            "inLanguage" => "en"
        ];
    }
}

if (! function_exists('schema_breadcrumbs_for_post')) {
    function schema_breadcrumbs_for_post(Post $post): array {
        return [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => url('/')
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "name" => $post->category_id==2?'Technology':($post->category_id==3?'Finance':($post->category_id==4?'Health':'Entertainment')),
                    "item" => url($post->category_id==2?'/technology':($post->category_id==3?'/finance':($post->category_id==4?'/health':'/entertainment')))
                ],
                [
                    "@type" => "ListItem",
                    "position" => 3,
                    "name" => $post->title,
                    "item" => seo_post_url($post)
                ],
            ]
        ];
    }
}

if (! function_exists('sitemap_posts')) {
    function sitemap_posts() {
        return Post::query()
            ->latest('updated_at')
            ->get(['slug', 'category_id', 'updated_at']);
    }
}

