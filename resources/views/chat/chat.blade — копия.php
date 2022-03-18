@extends('app')

@section('title', $chat->name)
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')

<div class="bg-white w-full h-auto">
    <!--TEPA-->
    <div style="position: sticky; top:64px; z-index: 10;">
       <a href="/chat/{{$chat->id}}">
        <ul class="p-2 bg-green-300 flex items-center sticky top-0">
            <li>
                <p><img class="img rounded-full" src="{{$chat->image}}" alt=""></p>
            </li>
            <li class="pl-2">
                <p class="font-bold">{{$chat->name}}</p>
               <p class="text-gray-500">{{count($follow)}} members {{count($followers)}} online</p>
            </li>

        </ul>
       </a>
    </div>
    <!--TEPA tugadi!-->

  <!--message-->
   @if (count($messages) > 0)
   <div class="p-2 imgs">
   @foreach ($messages as $item)
   @if ($item->user_id == Auth::user()->id)
   <div id="{{$item->id}}" class="mt-4 flex justify-end">
       <div class="bg-blue-300 message border border-black" style="background-color: rgb(226, 217, 217);color: rgb(43, 43, 43);">
        <strong class="flex items-center">
            {{$item->user->name}}
            @if ($item->user->isAdmin())
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pl-1 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            @endif
        </strong>
          <p> {{$item->message}}</p>
           <div class="flex justify-end">{{$item->created_at->format('d.m.Y H:i')}}</div>
       </div>
       <div class="flex" style="align-items: flex-end;padding-left:6px;">
        <a href="/users/{{$item->user->id}}"><img style="width: 40px;height:40px;" class="rounded-full" src="{{$item->user->avatar_path}}" alt=""></a>
    </div>
   </div>
   @else
   <div id="{{$item->id}}" class="mt-4 flex justify-start">
    <div class="flex" style="align-items: flex-end;padding-right:6px;"><a href="/users/{{$item->user->id}}">
        <img style="width: 40px;height:40px;" class="rounded-full border border-green-500" src="{{$item->user->avatar_path}}" alt="">
        </a></div>
    <div class="bg-green-300 message" style="color: rgb(1, 66, 7);">
        <strong class="flex items-center">
            {{$item->user->name}}
            @if ($item->user->isAdmin())
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pl-1 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            @endif
        </strong>
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
    @if (count($following) > 0)
    <form action="{{url('/chat/index/'.$chat->id)}}" method="post">
        @csrf
        <input style="width: 950px;" class="border border-black h-12 p-2 focus" type="text" name="message" placeholder="Message.."><button style="width: 74px;position:4px;" class="bg-green-500 text-white h-12" type="submit">Yuborish</button>
    </form>
    @else
        <form action="{{url('/chat/follow/'.$chat->id)}}" method="post">
            @csrf
            <div class="following"><button 
                style="
                    font-weight: 600;
                    font-size: 18px;
                    color: rgb(18, 212, 18);" type="submit">Follow</button></div>
        </form>
    @endif
</div>
</div>

<style>
    .following{
        background: #fff;
    width: 1024px;
    height: 50px;
    display: flex;
    justify-content: center;
}
    .img{
        width: 68px;
        height: 68px;
    }
    .message{
        overflow-wrap: break-word;
        min-width: 300px;
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