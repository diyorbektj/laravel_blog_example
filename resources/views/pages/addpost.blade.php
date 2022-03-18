@extends('app')

@section('content')
<div class="bg-white w-full h-full p-4">
    <div>
        @if(session('status'))
        <div class="w-full h-10 bg-green-300 flex items-center my-2">
            <div class="bg-green-600 w-1 h-full mr-2"></div>
            <div>{{ session('status') }}</div></div>
        @endif
        @if(session('error'))
        <div class="w-full h-10 bg-red-300 flex items-center my-2">
            <div class="bg-red-600 w-1 h-full mr-2"></div>
            <div>{{ session('error') }}</div></div>
        @endif
        <form action="{{route('create.post')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <strong>Title:</strong>
                <div><input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="text" name="title" id=""></div>
            </div>
            <div class="py-4">
                <strong>Body:</strong>
               <div> <textarea class="border border-gray-300 rounded px-2" name="body" id="" cols="48" rows="6"></textarea></div>
            </div>
            <div class="py-2">
                <strong>Image:</strong>
                <div><input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="file" name="image" multiple></div>
            </div>
            <div class="py-2">
                <strong>Category:</strong>
               <div> <select class="border border-gray-300 rounded w-96 h-[38px] px-2" name="cat_id" id="">
                <option value="0">Выбирайте категория</option>
                @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select></div>
            </div>
            <div class="py-2">
                <strong>Title site:</strong>
                <div><input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="text" name="meta_title" id=""></div>
            </div>
            <div class="py-2">
                <strong>Meta keywords</strong>
               <div> <input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="text" name="meta_keywords" id=""></div>
            </div>
            <div class="py-2">
                <strong>Meta description</strong>
                <div><input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="text" name="meta_description" id=""></div>
            </div>
           <div class="flex justify-end"> <button class="bg-green-500 rounded text-white w-[80px] h-[38px]" type="submit">Yuborish</button></div>

        </form>
    </div>
</div>
@endsection