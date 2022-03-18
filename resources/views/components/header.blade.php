@php
  $cats = \App\Models\Category::all();
  $mail = \App\Models\Mail::where('to_id',Auth::id())->where('is_read',0)->get();
@endphp
<header class="bg-green-500 w-full h-16 pad">
    <ul class="flex justify-between max-w-screen-xl mx-auto pt-3 text-white">
        <li class="text-xl font-bold flex items-center"><a class="hover:text-gray-200" href="/">Sports</a></li>
        <li>
            <ul class="flex items-center testcha">
            @foreach ($cats as $cat)
            <li class="pr-4"><a class="hover:text-green-300" href="/cat/{{$cat->slug}}">{{$cat->name}}</a></li>
            @endforeach
        </ul>
    </li>
        <li>
            <ul class="flex items-center ">
                <li>
                   <a href="/mail/index" class="flex items-center hover:text-green-300" style="position: relative;">
                    <p><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                      </svg></p>
                     @if (count($mail) > 0)
                     <span class="span1">{{count($mail)}}</span>
                     @endif
                   </a>
                </li>
                        <li class="ml-2 pas" x-data="{ open: false }">
                            <button @click="open = ! open"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                            </button>
                            <ul class="js bg-green-700 w-full h-auto p-4" x-show="open">
                                @foreach ($cats as $item)
                                    <li class="py-2">{{$item->name}}</li>
                                @endforeach
                            </ul>
            </li>
            </ul>
        </li>
</ul>
</header>
<style>
    .span1{
        background: rgb(255, 0, 0);
        min-width: 15px;
        width: auto;
        height: auto;
        padding: 1px;
        border-radius: 9999px;
        font-size: 12px;
        display: flex;
        justify-content: center;
        position: absolute; 
        top:0;
        right:-4px;
    }
</style>