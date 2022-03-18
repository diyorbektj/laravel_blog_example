<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\ChatFollowers as Follow;
use App\Models\ChatMessages as Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = DB::table('chats')
            ->leftJoin('chat_followers', 'chats.id', '=', 'chat_followers.chat_id')->
            where('chat_followers.uid', Auth::id())->orderByDesc('chats.updated_at')
            ->get();

        return view('chat.main', compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createchat()
    {
        return view('chat.create');
    }

    public function create(Request $request)
    {
        $chat = new Chat;
        $chat->name = $request->name;
        $chat->desc = $request->desc;
        $chat->message = 'Chat yaratildi!';
        $chat->user_id = Auth::id();
        if ($request->filled('bot')) {
            $chat->bot = $request->bot;
        }
        $chat->last_post = Auth::user()->name;
        $chat->post_id = 1;
        $chat->save();
        $follow = new Follow;
        $follow->chat_id = $chat->id;
        $follow->uid = Auth::id();
        $follow->save();
        $message = new Message;
        $message->chat_id = $chat->id;
        $message->user_id = Auth::id();
        $message->message = 'Chat yaratildi!';
        $message->save();

        return redirect('/chat/index/'.$chat->id.'#1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $chat = new Message;
        $chat->chat_id = $id;
        $chat->user_id = Auth::id();
        $chat->message = $request->message;
        $chat->save();
        $follow = Follow::where('chat_id',$id)->increment('count');
        $chats = Chat::find($id);
        $chats->message = $request->message;
        $chats->last_post = Auth::user()->name;
        $chats->post_id = $chat->id;
        $chats->save();


        return redirect('/chat/index/'.$id.'#'.$chat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Follow::where('chat_id',$id)->where('uid',Auth::id())->update(['count' => 0]);
        $chat = Chat::findOrFail($id);
        $follow = Follow::where('chat_id',$id)->get();
        $following = Follow::where('chat_id',$id)->where('uid',Auth::id())->get();
        $messages = Message::where('chat_id',$id)->get();
        $followers = DB::table('chat_followers')
            ->leftJoin('users', 'chat_followers.uid', '=', 'users.id')->where('users.last_activity','>',time() - 600)->
            where('chat_followers.chat_id', $id)->orderByDesc('chat_followers.updated_at')
            ->get();
            return view('chat.chat',[
                'chat' => $chat,
                'follow' => $follow,
                'messages' => $messages,
                'following' => $following,
                'followers' => $followers
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chat = Chat::find($id);
        return view ('pages.chatedit', compact('chat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chat = Chat::find($id);
        $chat->messege = $request->messege;
        $chat->save();
        return redirect('/chat/index#chat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::find($id);
        $chat->delete();
        return redirect('/chat/index');
    }
    public function truncate()
    {
        Chat::truncate();
        return redirect('/chat/index');
    }
    public function javob($id)
    {
        $chat = Chat::find($id);
        return view('pages.chatjavob', compact('chat'));
    }
    public function javobxabar(Request $request,$id)
    {
        $user = User::find(auth()->user()->id);
        $user->balans = $user->balans + 5;
        $user->save();
        $chats = Chat::find($id);
        $chat = new Chat;
        $chat->user_id = auth()->user()->id;
        $chat->to_id = $chats->user_id;
        $chat->messege = $request->messege;
        $chat->save();
        return redirect('/chat/index#chat');
    }
    public function following($id)
    {
        $follow = new Follow;
        $follow->chat_id = $id;
        $follow->uid =Auth::id();
        $follow->save();
        $chat = Chat::find($id);
        $chat->message = 'Join the group';
        $chat->save();
        $message = new Message;
        $message->chat_id = $id;
        $message->user_id = Auth::id();
        $message->message = 'Join The Group!';
        $message->save();
        return redirect('/chat/index/'.$id.'#'.$message->id);
    }
}
