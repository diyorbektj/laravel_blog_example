@extends('app')

@section('title',$user->name)
@section('metakey','blog,blog tj,test,birinchi proekt')
@section('metadesc','Blog Powered By Diyorbek')
@section('content')
<div class="bg-white w-full h-full">
    <div class="">
        <img class="w-full h-full" src="{{$user->photo_path}}" alt="">
        <div class="">
            <div class="bg-white w-full h-full profile_rasm">
                <div class="p-4">
                    <div class="avatar">
                        <img class="w-32 h-32 rounded-full border-4 border-test" src="{{$user->avatar_path}}" alt="">
                       @if ($user->online())
                       <div class="h-6 w-6 rounded-full border-white online"></div> 
                       @else
                       <div class="h-6 w-6 rounded-full border-white ofline"></div>
                       @endif
                    </div>
                   <div class="username">
                    @if ($user->role > 5)
                        <p class="font-bold text-xl">{{$user->name}}</p>
                              <p class="text-gray-400">@Diyorbek_Tj</p>
                              <p class="role">Sayt Yaratuvchisi</p>
                    @else
                    <p class="font-bold text-xl">{{$user->name}}</p>
                    <p class="text-gray-400">@Diyorbek_Tj</p>
                    @endif
                   </div>
                </div>
               @auth

                   @if ($user->id != Auth::id())
                   <div class="flex justify-between btns">
                    <div>
                      @if (count($follower)>0)

                      <button class="border border-black w-auto h-auto p-2 rounded" style="max-width: 180px;">Подписку</button>
                      @else
                      <form action="{{url('/users/follow/'.$user->id)}}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 w-auto h-auto p-2 rounded text-white">Подписатьсия</button>
                       </form> 
                      @endif
                    </div>
                   <div>
                    <button class="border border-black w-auto h-auto p-2 rounded"><a href="/mail/{{$user->id}}">Написать</a></button>
                </div>
            </div>
                   @endif
               @endauth
                    <div style="padding-top: 10px;"></div>
                    <div class="flex justify-between mt">
                        <div class="border-width border-right"><p class="text-center">{{count($follow)}}</p>
                            <p>Followers</p>
                        </div>
                        <div class="border-width-2 border-x"><p class="text-center">{{count($list)}}</p>
                            <p>Posts</p>
                        </div>
                        <div class="border-width border-left"><p class="text-center">{{count($following)}}</p>
                            <p>Following</p>
                        </div>
                    </div>
                    @auth
                       @if ($user->id == auth()->user()->id)
                       <div class="flex justify-center my-4 mx-4">
                        <form class="" action="{{url('/users/status/'.$user->id)}}" method="post">
                            @csrf
                            <input class="border border-gray-300 h-12 p-2" placeholder="Statusni kiriting" type="text" style="width: 500px;" name="status" id="">
                            <button class="bg-green-500 w-16 h-12 text-2xl text-white" type="submit">
                             +
                            </button>
                           
                        </form>
                     </div>
                       @endif 
                    @endauth
                    <div class="bg-green-300 h-auto m-4 p-3 rounded" style="width: 970px;">
                        {{$user->status}}
                    </div>
                   @auth
                       @if ($user->id == auth()->user()->id || auth()->user()->isAdmin())
                       <div class="flex justify-between py-2" style="max-width: 400px; margin:auto;">
                        <div>
                            <button class="bg-green-500 h-auto w-auto p-2 text-white rounded">Balans: {{$user->balans}}</button>
                        </div>
                        <div>
                            <button class="bg-green-500 h-auto w-auto p-2 text-white rounded">O'zgartirish</button>
                        </div>
                        <div>
                            <button class="bg-green-500 h-auto w-auto p-2 text-white rounded">Profilni O'chirish</button>
                        </div>
                        @if (auth()->user()->isAdmin() and $user->id != auth()->user()->id)
                        <div>
                            <button style="background: rgb(255, 0, 0);" class="h-auto w-auto p-2 text-white rounded">BAN</button>
                        </div>
                        @endif
                    </div>
                       @endif
                   @endauth
                <!--test--->
               <!---
                 <div class="bg-green-500 w-full h-10 p-2 text-white">Statistika</div>
                <div class="text-gray-500">
                  <div class="h-auto w-full bg-white p-3">
                      <ul>
                          <li>Balans:</li>
                          <li>Obunachilar:</li>
                          <li>Layklar:</li>
                          <li>TEST</li>
                      </ul>
                  </div>
                
                </div>
                --->
            
                <!---test-->
                <div class="bg-green-500 w-full h-10 p-2 text-white">Mening bloglarim</div>
                <div class="bg-white w-full h-auto "">@include('./pages/myblog')</div>
                <div style="width: 100%; height:60px;"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .btns{
        padding-bottom: 15px;
        max-width: 200px;
        margin: auto;
    }
    .online{
        background: rgb(15, 134, 245);
        position: absolute; 
        top:100px; 
        right:8px; 
        border-width:3px;
    }
    .ofline{
        background: rgb(155, 155, 155);
        position: absolute; 
        top:103px; 
        right:8px; 
        border-width:3px;
    }
    .username{
        margin-top: 70px;
        text-align: center;
    }
    .marigin-left{
        margin-left: 430px;
    }
   .role{
    color: rgb(255, 0, 0);
    font-size:26px;
    font-weight: 600;
   }
    .border-x{
        border-left: 1px solid rgb(204, 204, 204);
        border-right: 1px solid rgb(204, 204, 204);
    }
    .border-width{
        padding-left: 20px;
        padding-right: 20px;
    }
    .border-width-2{
        padding-left: 60px;
        padding-right: 60px;
    }
    .mt{
        font-size: 18px;
        font-weight: 700;
        margin: auto;
        max-width: 450px;
    }
    .border-test{
    --tw-border-opacity: 1;
    border-color: rgb(34 197 94 / var(--tw-border-opacity));
    }
    .avatar{
        position: absolute;
        top:-50px;
        left: 445px;
    }
    .profile_rasm{
        margin-bottom: 100px;
        border-radius: 30px 30px 0px 0px;
        max-width: 1024px;
        margin-right: auto;
        margin-left: auto;
        position: absolute;
        top:250px;
    }
</style>
@endsection