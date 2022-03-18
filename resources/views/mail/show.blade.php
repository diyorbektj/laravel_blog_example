@extends('app')

@section('title', $user->name)
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')

<div class="bg-white w-full h-auto">
    <!--TEPA-->
    <div style="position: sticky; top:64px; z-index: 10;">
       <a href="/users/{{$user->id}}">
        <ul class="p-2 bg-green-300 flex items-center sticky top-0">
            <li>
                <p><img class="img rounded-full" src="{{$user->avatar_path}}" alt=""></p>
            </li>
            <li class="pl-2">
                <p class="font-bold">{{$user->name}}</p>
                @if ($user->online())
                <p class="text-gray-500">online</p>
                @else
                <p class="text-gray-500">offline</p>
                @endif
            </li>

        </ul>
       </a>
    </div>
    <!--TEPA tugadi!-->

  <!--message-->
   @if (count($messages) > 0)
   <div class="p-2 imgs">
   @foreach ($messages as $item)
   @if ($item->from_id == Auth::user()->id)
   <div id="{{$item->id}}" class="mt-4 flex justify-end">
       <div class="bg-blue-300 message border border-black" style="background-color: rgb(226, 217, 217);color: rgb(43, 43, 43);">
          <p> {{$item->message}}</p>
           <div class="flex justify-end">{{$item->created_at->format('d.m.Y H:i')}}</div>
       </div>
   </div>
   @else
   <div id="{{$item->id}}" class="mt-4 flex justify-start">
    <div class="bg-green-300 message" style="color: rgb(1, 66, 7);">
       <p> {{$item->message}}</p>
        <div class="flex justify-end">{{$item->created_at->format('d.m.Y H:m')}}</div>
    </div>
</div>

   @endif
   @endforeach

   @else
   <div class="p-2 imgs">
   <div class="mt-4 flex justify-center pt-8">
    <div class="bg-gray-300 message">
        Bironta ham xabar topilmadi
    </div>
</div>
   @endif
   </div>
  <!--message tugadi-->
   <div style="margin-top: 100px;"></div>
   <div id="text" style="position: fixed;bottom:54px;">
    <form action="{{url('/mail/'.$user->id)}}" method="post">
        @csrf
        <input style="width: 950px;" class="border border-black h-12 p-2 focus" type="text" name="message" placeholder="Message.."><button style="width: 74px;position:4px;" class="bg-green-500 text-white h-12" type="submit">Yuborish</button>
    </form>
</div>
</div>

<style>
    .img{
        width: 68px;
        height: 68px;
    }
    .message{
        overflow-wrap: break-word;
        min-width: 200px;
        max-width: 600px;
        width: auto;
        height: auto;
        padding: 8px;
        border-radius: 5px;
    }
    .right{
        object-position: right;
    }
    .imgs{
        background-image: url('/images/fon.jpg');
        min-height: 500px;

    }
    .focus:focus{
        outline: none;
    }
</style>
@endsection