@extends('app')

@section('title',$post->meta->meta_title)
@section('metadesc',$post->meta->meta_description)
@section('metakey',$post->meta->meta_keywords)
@section('content')
<div class="bg-white w-full h-full p-2 rounded-b">
    <div>
        <div class="px-2 py-1">
            <h1 class="text-4xl text-green-500">{{$post->title}}</h1>
              <div class="px-12 my-8 flex justify-center">
                <img style="width: 700px; height: 400px;" class="" src="/{{$post->image->path}}" alt="">
              </div>
              <div class="w-full">
                <div class="text">
                  {!! $post->body !!}
                </div>
          </div>
          <div class="flex items-center font-bold pt-2">
           <a class="flex items-center hover:text-green-500" href="/{{$post->category->slug}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
              <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
            </svg>
            {{$post->category->name}}   
          </a> <p class="text-gray-300 pl-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            {{$post->created_at}}</p>
          <p class="text-gray-300 pl-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 pr-0.5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
          </svg>Ko'rdi: {{$post->reads}}</p>
          @php
          $data = \App\Models\Like::where('post_id',$post->id)->where('user_id',Auth::id())->get();
       @endphp
         @if (count($data)>0)
         <form action="{{url('/dislike',$post->id)}}" method="get">
          @csrf
         <button type="submit">
          <p class="text-red-500 pl-4 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
          </svg>{{$like}}</p>
         </button>
         </form>
         @else
         <form action="{{url('/like',$post->id)}}" method="get">
          @csrf
         <button class="text-red-300 pl-4 flex items-center" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg> {{$like}}    
        </button> 
        </form>   
         @endif
          </div>
           </div>
    </div>
</div>
<div class="bg-white w-full h-full p-2 my-2 rounded">
    <ul class="flex items-center">
        <li><img class="w-32 h-32 rounded-full shadow-md border-4 border-green-300" src="{{$post->user->avatar_path}}" alt=""></li>
        <li class="pl-4 text-xl">Muallif Haqida
          <div class="flex items-center">  <p class="font-bold">{{$post->user->name}}</p><p class="pl-2">{{$post->user->status}}</p></div>
        </li>
    </ul>
</div>
<div id="{{$post->id}}" class="bg-white w-full h-full px-3 py-4 my-2 rounded">
  <h1 class="font-bold text-2xl py-2">Добавить комментарий</h1>
  <ul class="">
  <form action="{{route('post.comment',['id' => $post->id])}}" method="post">
    @csrf
     <!-- <li><img class="w-16 h-16 rounded-full shadow-lg border-3 border-gray-300" src="/images/man.jpg" alt=""></li>-->
     <li class=""><textarea class="border border-gray-300 rounded px-2" name="text" id="" cols="60" rows="5"></textarea></li>
     <li class="ml-4 flex justify-end"><button class="bg-green-500 rounded w-28 h-12 text-white" type="submit">Yuborish</button></li>
  </form>
  </ul>
</div>

<!--Comment-->
<div class="bg-white w-full h-full p-3 my-2 rounded">
  @if (count($comments)>0)
  <h1 class="text-xl font-bold pt-2 pb-4">Последний комментарий ({{count($comments)}})</h1>
  @foreach ($comments as $comment)
  <ul class="flex items-start">
    <li><img class="w-20 h-20 rounded-full border-4 border-green-300" src="{{$comment->user->avatar_path}}" alt=""></li>
    <li class="pl-4">
      <ul class="bg-green-200 w-[700px] h-full p-2.5 rounded">
        <li class="font-bold pb-2">
         <div class="flex justify-between">
          <div class=""><a class="flex items-center" href="/users/{{$comment->user->id}}">
            {{$comment->user->name}} @if ($comment->user->role > 5)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pl-1 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            @endif
            </a></div>
          @if ($comment->user_id != Auth::id())
          <div class="text-gray-400 hover:text-green-400 pl-2">
            <a href="/pcomment/{{$comment->id}}">Javob</a></div
            ></div>
          @endif</li>
        <li>
          @if ($comment->pcomment_id > 0)
          <strong>{{$comment->puser->name}},</strong>
        @endif
        {!!$comment->comment!!}</li>
        <li class="flex justify-end"><span class="text-gray-400 text-sm">{{$comment->created_at->format('d M Y')}}</span></li>
      </ul>
    </li>
  </ul>
  <div class="h-px w-full bg-gray-300 my-3"></div>
  @endforeach 
  @else
    <div class="flex justify-center">  <h1 class="font-bold text-xl p-4">Hozircha comment yoq!</h1></div>
  @endif
</div>

<style>
 .text  p{
    padding-bottom: 20px;
    display: flex;
    justify-content: center;
    font-size: 18px;
    font-weight: 500;
  }
  img{
    margin-top: 20px;
    margin-bottom: 20px;
    width: 600px;
    height: 400px;
  }
</style>

@endsection