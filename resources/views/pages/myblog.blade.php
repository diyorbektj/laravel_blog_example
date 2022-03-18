<div>
    @foreach ($posts as $post)
    
   <a href="/post/{{$post->slug}}">
     <div class="px-4 py-4">
       <h1 class="text-2xl text-green-500 hover:underline">{{$post->title}}</h1></a>
       <div class="flex items-center font-bold">
         <a class="flex items-center hover:text-green-500" href="/{{$post->category->slug}}">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
             <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
             <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
           </svg>
           {{$post->category->name}}</a> <p class="text-gray-300 pl-4 flex items-center">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
         </svg>
         {{$post->created_at}}</p>
         <p class="text-gray-300 pl-4 flex items-center">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
             <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
             <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
           </svg>
           {{$post->reads}}</p>
           <p class="pl-4">
            @php
            $data = \App\Models\Like::where('post_id',$post->id)->where('user_id',Auth::id())->get();
            $count = \App\Models\Like::where('post_id',$post->id)->count();
         @endphp
          @if (count($data)>0)
          <form class="flex justify-center" action="{{route('post.dislike',['id' => $post->id])}}">
            @csrf
         <button class="flex items-center text-red-500" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
          </svg>{{$count}}
      </button>
          
          @else
          <form class="flex justify-center" action="{{route('post.like',['id' => $post->id])}}">
            @csrf
         <button class="flex items-center" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>{{$count}}
      </button>
          @endif
           </p>
         </div>
         
         
      </div>
  <div class="h-px w-full bg-gray-300"></div>
   @endforeach
   </div>
  <div>