@foreach ($users as $user)
<a href="/users/{{$user->id}}">
    <div>
        <div class="p-3 flex items-center">
            <div>
                <img class="w-20 h-20 rounded-full border-4 border-green-300" src="{{$user->avatar_path}}" alt="">
            </div>
            <div class="pl-4" style="align-items: none;">
                <strong class="flex items-stretch" style="font-size: 15px;">
                   <p> {{$user->name}}</p>
                   <p>
                   @auth
                       @if ($user->isAdmin())
                       <p><svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg></p>
                   </p>
                       @endif
                   @endauth
                </strong>
                <p class="text-gray-400 flex items-center">{{$user->status}}</p>
            </div>
        </div>
        <div class="h-px w-full bg-gray-300"></div>
    </div>
</a>
@endforeach