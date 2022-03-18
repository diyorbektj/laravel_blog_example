<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\User;
use App\Models\Comments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function test()
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
   
           ]);
        $meta = new \App\Models\MetaTeg;
        $meta->meta_title = $request->meta_title;
        $meta->meta_description = $request->meta_description;
        $meta->meta_keywords = $request->meta_keywords;
        $meta->save();

        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans + 100;
        $user->save();

        $posts = new Post;
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->reads = 0;
        $posts->time = time();
        $posts->user_id = Auth::id();
        $posts->meta_id = $meta->id;
        $posts->category_id = $request->cat_id;
        $posts->save();

        if ($request->hasfile('image')) {
           $save = new $this->image;
           $name = $request->file('image')->getClientOriginalName();
   
           $request->file('image')->store('public/images');
           $path = $request->file('image')->store('storage/images');

           $save->name = $name;
           $save->path = $path;
           $save->post_id = $posts->id;
           $save->save();
        }
    }
}
