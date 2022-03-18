@extends('app')

@section('title','Shahsiy xabarlar')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')


<div class="bg-green-300 w-full h-auto p-2 font-bold" style="color: rgb(2, 155, 2);">Shahsiy xabarlar</div>
<div class="bg-white w-full h-auto">
   @if (count($contacts) > 0)
   @foreach ($contacts as $item)
   @php
       $mails = \App\Models\Mail::where('from_id',$item->from_id)->where('to_id',Auth::id())->where('is_read',0)->get();
   @endphp
   <a href="/mail/{{$item->from_id}}#{{$item->post_id}}">
   
      <div class="flex justify-between">
       <div>
           <div class="p-2 flex items-center" style="position: relative;">
               <div>
                   <img class="w-20 h-20 rounded-full border-4 border-green-300" src="{{$item->avatar_path}}" alt="">
               </div>
               <div class="pl-4" style="align-items: none;">
                   <strong class="flex items-stretch" style="font-size: 15px;">
                     <p> {{$item->name}}</p>
                      <p>
                      @auth
                          @if ($item->from_id == Auth::user()->id)
                              <span class="text-green-500">(Siz)</span>
                              @endif
                              @if($item->role >5)
                          <p><svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                         </svg></p>
                      </p>
                          @endif
                      @endauth
                   </strong>
                   <div class="text-gray-400 flex items-center">
                    @if (count($mails))
                    <p class="text-green-500 font-bold pr-2">New:</p>
                @endif 
                      <p>{{Str::limit($item->message, 100);}}</p>
                   </div>
               </div>
           </div>
       </div>
       <div class="p-3">
          @if (count($mails) > 0)
          <button class=" bg-green-500 w-auto h-auto rounded-full text-white" style="min-width: 25px;padding:2px;">
            {{count($mails)}}
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