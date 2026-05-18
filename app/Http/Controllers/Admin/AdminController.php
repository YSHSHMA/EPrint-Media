<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Front\ContactUs;
use App\Models\Front\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $post = Post::where('status',1)->latest()->get();
        $contact = ContactUs::latest()->get();
        $visitor = Visitor::distinct()->count('ip_address');
        return view('admin.dashboard',compact('post','contact','visitor'));
    }

    // category crud
    public function category_list(){
        $categorylist = Category::all();
        return view('admin.category.list', compact('categorylist'));
    }

    public function category_store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_replace(' ','-',strtolower($request->name));
        if($category->save()){
            return redirect()->route('admin.category.list')->with('success','category added successfully');
        }
        return back()->with('error','Something went wrong');
    }

    public function category_update(Request $request){
        $category = Category::where('id',$request->id)->first();
        $category->name = $request->name;
        $category->slug = str_replace(' ','-',strtolower($request->name));
        if($category->save()){
            return redirect()->route('admin.category.list')->with('success','category updated successfully');
        }
        return back()->with('error','Something went wrong');
    }

    public function category_status(Request $request)
    {
        $categoryStatus = Category::where('id', $request->id)->update(['status' => $request->status]);
        if ($categoryStatus) {
            return response()->json(['status' => true, 'message' => 'Status changed successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Unable to get data']);
    }

    public function contact_list()
    {
        $contactList = ContactUs::latest()->get();
        return view('admin.contact.list', compact('contactList'));
    }

    public function visitor_list()
    {
        $visitorList = Visitor::latest()->get();
        return view('admin.visitor.list', compact('visitorList'));
    }

}
