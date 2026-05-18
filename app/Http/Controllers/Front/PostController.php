<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // technology
    public function technology_index()
    {
        $posts = Post::where('category_id', 2)->where('status', 1)->latest()->take(8)->get();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.list', compact('posts', 'popularPosts', 'randomPosts'));
    }

    public function technology_load_more(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 10;
        $posts = Post::where('category_id', 2)->where('status', 1)->latest()->skip($offset)->take($limit)->get();
        $html = view('front.partial.post-cards', compact('posts'))->render();

        return response()->json([
            'html' => $html,
            'count' => $posts->count()
        ]);
    }

    public function technology_post($slug){
        $detail = Post::where('slug', $slug)->where('status', 1)->first();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.detail', compact('detail', 'popularPosts', 'randomPosts'));
    }

    // finance
    public function finance_index()
    {
        $posts = Post::where('category_id', 3)->where('status', 1)->latest()->take(8)->get();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.list', compact('posts', 'popularPosts', 'randomPosts'));
    }

    public function finance_load_more(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 10;
        $posts = Post::where('category_id', 3)->where('status', 1)->latest()->skip($offset)->take($limit)->get();
        $html = view('front.partial.post-cards', compact('posts'))->render();

        return response()->json([
            'html' => $html,
            'count' => $posts->count()
        ]);
    }

    public function finance_post($slug){
        $detail = Post::where('slug', $slug)->where('status', 1)->first();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.detail', compact('detail', 'popularPosts', 'randomPosts'));
    }

    // health
    public function health_index()
    {
        $posts = Post::where('category_id', 4)->where('status', 1)->latest()->take(8)->get();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.list', compact('posts', 'popularPosts', 'randomPosts'));
    }

    public function health_load_more(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 10;
        $posts = Post::where('category_id', 4)->where('status', 1)->latest()->skip($offset)->take($limit)->get();
        $html = view('front.partial.post-cards', compact('posts'))->render();

        return response()->json([
            'html' => $html,
            'count' => $posts->count()
        ]);
    }

    public function health_post($slug){
        $detail = Post::where('slug', $slug)->where('status', 1)->first();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.detail', compact('detail', 'popularPosts', 'randomPosts'));
    }

    // entertainment
    public function entertainment_index()
    {
        $posts = Post::where('category_id', 5)->where('status', 1)->latest()->take(8)->get();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.list', compact('posts', 'popularPosts', 'randomPosts'));
    }

    public function entertainment_load_more(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 10;
        $posts = Post::where('category_id', 5)->where('status', 1)->latest()->skip($offset)->take($limit)->get();
        $html = view('front.partial.post-cards', compact('posts'))->render();

        return response()->json([
            'html' => $html,
            'count' => $posts->count()
        ]);
    }

    public function entertainment_post($slug){
        $detail = Post::where('slug', $slug)->where('status', 1)->first();
        $popularPosts = Post::where('is_popular', 1)->where('status', 1)->latest()->take(5)->get();
        $randomPosts = Post::where('status', 1)->with('category')->inRandomOrder()->take(5)->get();
        return view('front.post.detail', compact('detail', 'popularPosts', 'randomPosts'));
    }

    // search
    public function search(Request $request)
    {
        $query = $request->get('query');
        $results = Post::where('title', 'like', "%{$query}%")->where('status', 1)->limit(10)->get(['title', 'slug', 'category_id']);
        if ($results) {
            return response()->json(['status' => true, 'results' => $results]);
        }
        return response()->json(['status' => false, 'message' => 'unable to get data']);
    }
}
