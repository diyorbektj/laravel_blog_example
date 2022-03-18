@extends('app')

@section('content')
<div class="bg-white w-full h-full p-4">
    <div>
        @if(session('status'))
        <div class="w-full h-10 bg-green-300 flex items-center">
            <div class="bg-green-600 w-1 h-full mr-2"></div>
            <div>{{ session('status') }}</div></div>
        @endif
       
       <div class="w-full flex justify-center">
        <h1 class="text-2xl font-bold">Добавить Категория</h1>
    </div>
        <form action="{{route('create.cat')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <strong>Title:</strong>
                <div><input class="border border-gray-300 rounded w-96 h-[38px] px-2" type="text" name="title" id=""></div>
            </div>

           <div class="flex justify-end"> <button class="bg-green-500 rounded text-white w-[80px] h-[38px]" type="submit">Добавить</button></div>

        </form>
    </div>
</div>
@endsection