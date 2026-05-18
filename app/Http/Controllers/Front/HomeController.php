<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agreement;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Front\ContactUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $trendings = Post::where('is_trending',1)->where('status',1)->get();
        $featured = Post::where('is_featured',1)->where('status',1)->with('category')->latest()->take(4)->get();
        $techPosts = Post::where('category_id',2)->where('status',1)->latest()->take(4)->get();
        $financePosts = Post::where('category_id',3)->where('status',1)->latest()->take(4)->get();
        $healthPosts = Post::where('category_id',4)->where('status',1)->latest()->take(4)->get();
        $entertainmentPosts = Post::where('category_id',5)->where('status',1)->latest()->take(4)->get();
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        $randomPosts = Post::where('status',1)->with('category')->inRandomOrder()->take(5)->get();
        $latestPosts = Post::where('status',1)->with('category')->latest()->take(6)->get();
        return view('front.index', compact('trendings','featured','techPosts','financePosts','healthPosts','entertainmentPosts','popularPosts','randomPosts','latestPosts'));
    }

    public function maintenance_mode(){
        if(configData()->maintenance_mode == 1){
            return view('front.maintenance-mode');
        }
        return back();
    }

    public function contact_us(){
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        return view('front.contact-us',compact('popularPosts'));
    }

    public function contact_us_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'nullable',
            'message' => 'required',
        ]);
        
        $contactStore = new ContactUs();
        $contactStore->name = $request->name;
        $contactStore->email = $request->email;
        $contactStore->phone = $request->phone;
        $contactStore->message = $request->message;
        if ($contactStore->save()) {
            return back()->with('success', 'Message sent successfully');
        }
        return back()->with('error', 'Unable to send message');        
    }

    public function about_us(){
        $agreement = Agreement::where('name','About Us')->first();
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        return view('front.agreement', compact('agreement','popularPosts'));
    }

    public function disclaimer(){
        $agreement = Agreement::where('name','Disclaimer')->first();
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        return view('front.agreement', compact('agreement','popularPosts'));
    }

    public function privacy_policy(){
        $agreement = Agreement::where('name','Privacy Policy')->first();
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        return view('front.agreement', compact('agreement','popularPosts'));
    }

    public function terms_condition(){
        $agreement = Agreement::where('name','Terms & Conditions')->first();
        $popularPosts = Post::where('is_popular',1)->where('status',1)->latest()->take(5)->get();
        return view('front.agreement', compact('agreement','popularPosts'));
    }

    public function sitemap_xml()
    {
        $posts = Post::latest()->get();
        $categories = Category::all();
        $content = view('front.sitemap.index', compact('posts', 'categories'));
        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }

    public function rss_feed()
    {
        $posts = Post::latest()->take(50)->get();
        $content = view('front.rss.index', compact('posts'));
        return response($content, 200)
            ->header('Content-Type', 'application/rss+xml');
    }
}
