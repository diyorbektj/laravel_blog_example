@extends('app')

@section('title','Chat')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')
<div class="bg-white w-full h-auto">
    <div class="bg-white w-full h-full px-2 py-4">
        <ul class="flex items-center">
          <li><img class="w-24 h-24 border-4 border-green-300 rounded-full" src="{{$chat->user->avatar_path}}" alt=""></li>
          <li class="pl-4">
            <ul class="bg-green-200 w-[700px] h-full p-2 rounded">
              <li class="font-bold flex items-center pb-2">{{$chat->user->name}} <span class="text-gray-400 pl-2">({{$chat->created_at->format('d M Y')}})</span></li>
              <li>{{$chat->messege}}</li>
            </ul>
          </li>
        </ul>
    </div>
    <div class="bg-green-300 w-full h-10 p-2 text-green-900 text-md" style="font-weight: 500;">Xabarani o'zgartirish</div>
    <div class="p-4">
        <form action="{{url('chat/edit/'.$chat->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf
            <textarea value='{{$chat->messege}}' class="border border-gray-300 rounded py-1 px-2" name="messege" id="" cols="40" rows="6">{{$chat->messege}}</textarea>
            <div class="flex justify-end">
                <button class="bg-green-500 w-32 h-10 rounded text-white" type="submit">Yuborish</button>
            </div>
        </form>
    </div>
</div>
@endsection