<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    public function post_add(){
        $categories = Category::where('status',1)->get();
        return view('admin.post.add',compact('categories'));
    }

    public function post_store(Request $request){
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|max:4096',
            'category_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'detail' => 'required',
        ]);

        $postStore = new Post;
        $postStore->title = $request->title;
        $postStore->slug = preg_replace('/[^a-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $postStore->category_id = $request->category_id;
        $postStore->meta_title = $request->meta_title;
        $postStore->meta_description = $request->meta_description;
        $postStore->meta_keywords = $request->meta_keywords;
        $postStore->detail = $request->detail;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $originalName = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $thumbnail->getClientOriginalExtension();
            $cleanName = Str::slug($originalName) . '.' . $extension;
            $thumbnailPath = 'admin-assets/dynamic/post/thumbnail/' . time() . '_' . $cleanName;
            $image = Image::read($thumbnail);
            $image->scale(752, 540);
            $image->save(public_path($thumbnailPath), 70);
            $postStore->thumbnail = $thumbnailPath;
        }
        if($postStore->save()){
            return redirect()->route('admin.post.list')->with('success','post added successfully');
        }
        return back()->with('error','Something went wrong');
    }

    public function post_list(Request $request){
        $postList = Post::orderBy('created_at','desc')->with('category')->get();
        return view('admin.post.list', compact('postList'));
    }

    public function post_edit(Request $request){
        $categories = Category::where('status',1)->get();
        $post = Post::where('id',$request->id)->with('category')->first();
        return view('admin.post.edit',compact('post','categories'));
    }

    public function post_update(Request $request){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'detail' => 'required',
        ]);

        $postUpdate = Post::where('id',$request->id)->first();
        $postUpdate->title = $request->title;
        $postUpdate->slug = preg_replace('/[^a-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $postUpdate->category_id = $request->category_id;
        $postUpdate->meta_title = $request->meta_title;
        $postUpdate->meta_description = $request->meta_description;
        $postUpdate->meta_keywords = $request->meta_keywords;
        $postUpdate->detail = $request->detail;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $originalName = pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $thumbnail->getClientOriginalExtension();
            $cleanName = Str::slug($originalName) . '.' . $extension;
            $thumbnailPath = 'admin-assets/dynamic/post/thumbnail/' . time() . '_' . $cleanName;
            $image = Image::read($thumbnail);
            $image->scale(752, 540);
            $image->save(public_path($thumbnailPath), 70);
            $postUpdate->thumbnail = $thumbnailPath;
        }
        if($postUpdate->save()){
            return redirect()->route('admin.post.list')->with('success','post added successfully');
        }
        return back()->with('error','Something went wrong');
    }

    public function post_delete(Request $request)
    {
        $postDelete = Post::where('id', $request->id)->delete();
        if ($postDelete) {
            return back()->with('success','post deleted successfully');
        }
        return back()->with('error','Something went wrong');
    }

    public function check_limit(Request $request)
    {
        $postCount = Post::where($request->type, 1)->count();
        if ($postCount >= 0) {
            if($request->type == 'is_trending'){
                if($postCount < 5){
                    return response()->json(['status' => true]);                    
                }
            } elseif($request->type == 'is_featured'){
                if($postCount < 4){
                    return response()->json(['status' => true]);                    
                }
            } elseif($request->type == 'is_popular'){
                if($postCount < 5){
                    return response()->json(['status' => true]);                    
                }
            }
            return response()->json(['status' => false, 'message' => 'Limit reached']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to get data']);
    }

    public function post_status(Request $request)
    {
        $postStatus = Post::where('id', $request->id)->update([$request->type => $request->is_checked]);
        if ($postStatus) {
            return response()->json(['status' => true, 'message' => 'Status changed successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to get data']);
    }
}
