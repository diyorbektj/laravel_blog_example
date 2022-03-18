@extends('app')

@section('title','Chat')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')



<div class="bg-green-300 w-full h-12 p-2 font-bold text-md" style="color: rgb(2, 155, 2);">Samimiy chat <button style="float: right;" class="bg-white border border-black p-1 rounded w-auto h-auto"><a href="/chat/create">Xona yarataish</a></button></div>
<div class="bg-white w-full h-auto">
   @if (count($chats) > 0)
   @foreach ($chats as $item)
   <a href="/chat/index/{{$item->chat_id}}#{{$item->post_id}}">
   
    <div class="flex justify-between">
     <div>
         <div class="p-2 flex items-center" style="position: relative;">
             <div>
                 <img class="w-20 h-20 rounded-full border-4 border-green-300" src="" alt="">
             </div>
             <div class="pl-4" style="align-items: none;">
                 <strong class="flex items-stretch" style="font-size: 15px;">
                   <p> {{$item->name}}</p>
                 </strong>
                 <div class="text-gray-400 flex items-center">
                  <p class="font-bold pr-2">{{$item->last_post}}:</p>
                    <p>{{Str::limit($item->message, 90);}}</p>
                 </div>
             </div>
         </div>
     </div>
     <div class="p-3">
        @if ($item->count >0)
        <button class=" bg-green-500 w-auto h-auto rounded-full text-white" style="min-width: 25px;padding:2px;">
          {{$item->count}}
      </button>
        @endif
     </div>
    </div>
     <div class="h-px w-full bg-gray-300"></div>
 
</a>
@endforeach
   @else
       <h1 class="flex justify-center font-bold text-2xl" style="min-height: 600px;padding-top:200px;">Bu yer bom bo'sh!!!😁😁😁😁</h1>
   @endif
</div>




<style>
    .online{
        background: rgb(15, 134, 245);
        border-width: 3px;
        position: absolute;
        top: 72px;
        right: 925px;
    }
    .count{
        background: rgb(0, 248, 21);
        width: auto;
        height: 30px;
        padding: 2px;
    }
</style>

@endsection