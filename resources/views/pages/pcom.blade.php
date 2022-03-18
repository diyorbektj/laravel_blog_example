@extends('app')

@section('content')
<div class="bg-white w-full h-full px-2 py-2">
    <ul class="flex items-center">
      <li><img class="w-24 h-24 rounded-full border-4 border-green-300" src="{{$com->user->avatar_path}}" alt=""></li>
      <li class="pl-4">
        <ul class="bg-green-200 w-[700px] h-full p-2 rounded">
          <li class="font-bold flex items-center pb-2">{{$com->user->name}} <span class="text-gray-400 pl-2">({{$com->created_at->format('d M Y')}})</span></li>
          <li>{{$com->comment}}</li>
        </ul>
      </li>
    </ul>
</div>

<div class="bg-white w-full h-full px-3 py-4 my-2">
    <h1 class="font-bold text-2xl py-2">Javob Berish</h1>
    <ul class="">
    <form action="{{route('post.pcomment',['id' => $com->id])}}" method="post">
      @csrf
       <!-- <li><img class="w-16 h-16 rounded-full shadow-lg border-3 border-gray-300" src="/images/man.jpg" alt=""></li>-->
       <li class=""><textarea class="border border-gray-300 rounded px-2" name="text" id="" cols="60" rows="5"></textarea></li>
       <li class="ml-4 flex justify-end"><button class="bg-green-500 rounded w-28 h-12 text-white" type="submit">Yuborish</button></li>
    </form>
    </ul>
  </div>
  
@endsection