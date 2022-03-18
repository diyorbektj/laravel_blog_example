<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post = \App\Models\Post::class;
    protected $image = \App\Models\Image::class;
    protected $user = \App\Models\User::class;
    protected $comment = \App\Models\Comments::class;
    protected $like = \App\Models\Like::class;
    protected $metatag = \App\Models\MetaTag::class;
    protected $cat = \App\Models\Category::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderByDesc('id')->get();
        
        return view('pages.main', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = $this->cat::all();
        return view('pages.addpost',[
            'cats'=>$cats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        else{
            return redirect()->back()->with('error', 'Вы не выбрали изображение');
        }
   
       
        return back()->with('status', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $comments = $this->comment::where('post_id', $post->id)->orderByDesc('id')->get();
        $like = Like::where('post_id',$post->id)->count();
        $read = Post::find($post->id);
        $read->reads = $read->reads + 1;
        $read->save();
        return view('pages.fullpost', compact('post','read','like','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function like($id)
    {
        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans + 1;
        $user->save();
        $like = new \App\Models\Like;
        $like->post_id = $id;
        $like->user_id = Auth::id();
        $like->save();
        return redirect()->back();
    }
    public function dislike($id)
    {
        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans - 1;
        $user->save();
        $like = Like::where('post_id', $id)
        ->where('user_id', Auth::id())
        ->delete();
        return redirect()->back();
    }
    public function comment(Request $request,$id)
    {
        $comment = new \App\Models\Comments;
        $comment->post_id = $id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->text;
        $comment->save();
        return redirect()->back();
    }
    public function pcom(Request $request,$id)
    {
        $com = $this->comment::find($id);
        return view('pages.pcom',compact('com'));
    }
    public function pcomment(Request $request,$id)
    {
        $com = Comments::find($id);
        $post = Post::find($com->post_id);
        $comment = new Comments;
        $comment->post_id = $com->post_id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->text;
        $comment->pcomment_id = $com->user_id;
        $comment->save();

        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans + 10;
        $user->save();
        return redirect('/post/'.$post->slug);
    }

    public function search(Request $request)
    {
        if ($request->filled('q') and $request->type == 1) {
            $posts = Post::where('title', 'like', '%'.$request->q.'%')->get();
            return view('pages.search',compact('posts','request'));
        }
        elseif ($request->filled('q') and $request->type == 2){
            $users = User::where('name', 'like', '%'.$request->q.'%')->get();
            //$users = User::all();
            return view('pages.search',compact('users','request'));
        }
        else{
        $posts = Post::inRandomOrder()->get();
        return view('pages.search',compact('posts','request'));
    }
    }
}
