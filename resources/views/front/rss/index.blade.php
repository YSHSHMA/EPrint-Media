<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title>TrendifyBuzz</title>
        <link>{{ url('/') }}</link>
        <description>Latest news and articles from TrendifyBuzz</description>
        <language>en-us</language>

        {{-- Dynamic Blog Posts --}}
        @foreach ($posts as $post)
            <item>
                <title>
                    <![CDATA[{{ $post->title }}]]>
                </title>

                {{-- Post URL & Category --}}
                @if ($post->category_id == 2)
                    <link>{{ route('technology.post', $post->slug) }}</link>
                    <category>Technology</category>
                @elseif ($post->category_id == 3)
                    <link>{{ route('finance.post', $post->slug) }}</link>
                    <category>Finance</category>
                @elseif ($post->category_id == 4)
                    <link>{{ route('health.post', $post->slug) }}</link>
                    <category>Health</category>
                @else
                    <link>{{ route('entertainment.post', $post->slug) }}</link>
                    <category>Entertainment</category>
                @endif

                {{-- Author --}}
                <author>{{ $post->author ?? 'TrendifyBuzz' }}</author>

                {{-- Description --}}
                <description>
                    <![CDATA[{{ Str::limit(strip_tags($post->detail), 300) }}]]>
                </description>

                {{-- Publication Date --}}
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>

                {{-- GUID --}}
                <guid isPermaLink="true">
                    @if ($post->category_id == 2)
                        {{ route('technology.post', $post->slug) }}
                    @elseif ($post->category_id == 3)
                        {{ route('finance.post', $post->slug) }}
                    @elseif ($post->category_id == 4)
                        {{ route('health.post', $post->slug) }}
                    @else
                        {{ route('entertainment.post', $post->slug) }}
                    @endif
                </guid>

                {{-- Optional: Thumbnail for Google News --}}
                @if ($post->thumbnail)
                    @php
                        $ext = strtolower(pathinfo($post->thumbnail, PATHINFO_EXTENSION));
                        $mime = 'image/jpeg'; // default
                        if ($ext === 'png') {
                            $mime = 'image/png';
                        } elseif ($ext === 'webp') {
                            $mime = 'image/webp';
                        }
                    @endphp
                    <enclosure url="{{ asset($post->thumbnail) }}" type="{{ $mime }}" />
                @endif

            </item>
        @endforeach

    </channel>
</rss>
