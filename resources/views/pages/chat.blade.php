@extends('app')

@section('title','Chat')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')
<div class="bg-white w-full h-auto">
   
    <div class="bg-green-300 w-full h-10 p-2 text-green-900 text-xl">Xabarlar ({{count($chats)}})</div>
    <div class="py-4 px-2">
        @if (count($chats)>0)
        @foreach ($chats as $chat)
        <ul class="flex items-start" style="position: relative;">
          <li style="">
            <img class="w-20 h-20 rounded-full border-4 border-green-300" src="{{$chat->user->avatar_path}}" alt="">
           @auth
               @if ($chat->user->online())
                   <div class="border-white rounded-full online"></div>
               @else
               <div class="border-white rounded-full ofline"></div>
               @endif
           @endauth
          </li>
          <li class="pl-4">
            <ul class="bg-green-200 w-[700px] h-full p-2.5 rounded">
              <li class="font-bold pb-2">
               <div class="flex justify-between">
                <div class=""><a class="flex items-center" href="/users/{{$chat->user->id}}">
                  {{$chat->user->name}} @if ($chat->user->isAdmin())
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pl-1 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  @endif
                  @if ($chat->user->role == 2)
                  <svg xmlns="http://www.w3.org/2000/svg" style="color: rgb(14, 253, 6);" class="h-6 w-6 pl-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  @endif
                  </a></div>
                @auth
                @if ($chat->user_id != Auth::id())
                <div class="text-gray-400 hover:text-green-400 pl-2">
                  <a href="/chat/javob/{{$chat->id}}">Javob</a></div
                  >
                </div>
                @endif
                @endauth
            </li>
              <li>
              @if ($chat->to_id > 0)
              <strong>{{@$chat->juser->name}},</strong>
              @endif  
              {!!$chat->messege!!}</li>
              <li class="flex justify-end"><span class="text-gray-400 text-sm">{{$chat->created_at->format('d.m.Y H:m')}}</span> 
              @auth
              @if (Auth::user()->isAdmin())
              <p class="flex items-center">
               <a class="text-red-500" href="/chat/delete/{{$chat->id}}">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                       <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                     </svg>
               </a>
               <a class="text-blue-500" href="/chat/edit/{{$chat->id}}">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                       <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                     </svg>
               </a>
           </p>
              @endif
              @endauth
            </li>
            </ul>
          </li>
        </ul>
        <div class="h-px w-full bg-gray-300 my-3"></div>
        @endforeach 
        @else
          <div class="flex justify-center">  <h1 class="font-bold text-xl p-4">Hozircha bironta ham habar yoq!</h1></div>
        @endif
      </div>
        <div class="bg-green-300 w-full h-10 p-2 text-green-900 text-md" style="font-weight: 500;">Master Chat</div>
        <div class="p-4">
           @auth
           <form action="{{url('/chat/index')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <textarea class="border border-gray-300 rounded py-1 px-2" name="messege" id="chat" cols="40" rows="6"></textarea>
            <div class="flex justify-end">
                <button class="bg-green-500 w-32 h-10 rounded text-white" type="submit">Yuborish</button>
            </div>
        </form>
        @else
        <p class="text-center" style="font-weight: 600;">
          Bu yerda xabar qolshirish uchun <a class="text-green-500" href="{{url('/login')}}">Progilga kiring</a> yoki <a class="text-green-500" href="{{url('/register')}}">Ro'yhatan o'ting</a>
        </p>
           @endauth
        </div>
        <div class="h-px w-full bg-gray-300 my-3"></div>
</div>
<style>
  .online{
    width: 18px;
    height: 18px;
      background: rgb(15, 134, 245);
      border-width: 3px;
      position: absolute;
      top: 60px;
      right: 928px;
  }
  .ofline{
    width: 18px;
    height: 18px;
      background: rgb(155, 155, 155);
      border-width: 3px;
      position: absolute;
      top: 60px;
      right: 928px;
  }
</style>
@endsection