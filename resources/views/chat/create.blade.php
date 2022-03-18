@extends('app')
@section('title','Chat')
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')

<div class="bg-white w-full h-auto">
    <div class="bg-green-300 w-full h-auto p-2 font-bold">Xona Yaratish</div>
   <div class="p-4">
    <form action="{{route('create.chat')}}" method="post">
        @csrf
       <div>
        <strong style="font-size: 20px;">Name:</strong>
        <div><input class="border border-black input rounded" type="text" name="name"></div>
        
       </div>
       <div class="mt-4">
        <strong style="font-size: 20px;">Image:</strong>
        <div><input class="border border-black input rounded" type="file" name="image"></div>
        
       </div>
       <div class="mt-4">
        <strong style="font-size: 20px;">Description:</strong>
        <div><input class="border border-black input rounded" type="text" name="desc"></div>
       </div>
       <div class="mt-4">
        <div><input style="width: 20px;height:20px;" type="checkbox" name="bot" value="1"><label style="font-size: 20px;" class="pl-2">Botni qo'shish</label></div>
        
       </div>
       <div class="flex justify-end"><button class="bg-green-500 w-auto h-auto p-2 text-white font-bold rounded" type="submit">Yaratish</button></div>

    </form>
   </div>
</div>
<style>
    .input{
        width: 300px;
        height: 40px;
    }
</style>
@endsection