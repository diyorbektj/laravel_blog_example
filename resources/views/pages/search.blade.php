@extends('app')

@section('title','Search')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')
<div class="bg-green-300 w-full h-10 text-green-700 p-2 text-xl">Search</div>
<div class="bg-white w-full h-auto p-4">
<form class="flex justify-center" action="" method="get">
    <input class="border border-gray-300 h-12 p-2 rounded-l-xl" type="text" name="q" placeholder="Search..." style="width: 450px; border-radius:6px 0 0 6px;">
    <select class="border border-gray-300 h-12 w-28 pl-2" name="type">
        <option class="h-12 w-full" value="1">Post</option>
        <option class="h-12 w-full" value="2">User</option>
    </select>
    <button class="bg-green-500 text-white w-28 h-12" style="border-radius:0 6px 6px 0;" type="submit">Search</button>
</form>
</div>

<div class="bg-green-300 w-full h-10 text-green-700 p-2 text-xl">Natija</div>

<div class="bg-white w-full h-auto">
    @if ($request->type == 2)
        @include('pages.userlist')
    @else
    @include('pages.myblog')
    @endif

</div>
@endsection