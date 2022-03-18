<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comments;
use App\Models\Post;
use App\Models\Follower;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        return response()->json($user->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $follow = Follower::where('to_id',$id)->get();
        $following = Follower::where('user_id',$id)->get();
        $follower = Follower::where('to_id',$id)->where('user_id',auth()->user()->id)->get();
        $posts = Post::where('user_id', $id)->orderByDesc('id')->get();
        $user = User::where('id', $id)->firstOrFail();;
        $comment = Comments::where('user_id',$id)->get();
        $list = Post::where('user_id',$id)->get();
        //dd($user);
        return view('users.profile',[
            'user' => $user,
            'comment' => $comment,
            'list' => $list,
            'posts' => $posts,
            'follow' => $follow,
            'follower' =>$follower,
            'following' => $following
        ]);
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
    public function status(Request $request,$id)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();
        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans + 5;
        $user->save();

        return redirect('/users/'.$id);
    }
    public function onlinelist()
    {
        $users = User::where('last_activity','>=', time() - 600)->orderByDesc('last_activity')->get();
        return view('users.online', compact('users'));
    }

    public function follow(Request $request,$id)
    {
        $follow = new Follower;
        $follow->user_id = auth()->user()->id;
        $follow->to_id = $id;
        $follow->save();

        return redirect()->back();
    }
}
