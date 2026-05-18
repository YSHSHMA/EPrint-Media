@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
@php echo '<?xml-stylesheet type="text/xsl" href="'.url('sitemap.xsl').'"?>' @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Categories --}}
    @foreach ($categories as $category)
        @if ($category->id != 1)
            <url>
                <loc>{{ route($category->slug . '.index') }}</loc>
                <lastmod>{{ optional($category->updated_at)->toDateString() ?? now()->toDateString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.85</priority>
            </url>
        @endif
    @endforeach

    {{-- Dynamic Blog Posts --}}
    @foreach ($posts as $post)
        <url>
            @if ($post->category_id == 2)
                <loc>{{ route('technology.post', $post->slug) }}</loc>
            @elseif ($post->category_id == 3)
                <loc>{{ route('finance.post', $post->slug) }}</loc>
            @elseif ($post->category_id == 4)
                <loc>{{ route('health.post', $post->slug) }}</loc>
            @else
                <loc>{{ route('entertainment.post', $post->slug) }}</loc>
            @endif
            <lastmod>{{ optional($post->updated_at)->toDateString() ?? now()->toDateString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
