<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\ChatMessages;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function test()
    {
        return $this->belongsTo(Other::class,'id', 'user_id');
    }
    public function post()
    {
        return $this->hasMany(Post::class,'post_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(\App\Models\Comments::class,'user_id', 'id');
    }
    public function pcomment()
    {
        return $this->hasMany(\App\Models\Comments::class,'pcomment_id', 'id');
    }
    public function isAdmin()
    {
        if ($this->role > 5) {
            return true;
        }
        else{
            return false;
        }
    }
    public function chat()
    {
        return $this->hasMany(Chat::class,'user_id', 'id');
    }
    public function follow()
    {
        return $this->hasMany(\App\Models\ChatFollowers::class,'user_id', 'id');
    }
    public function chatmessage()
    {
        return $this->hasMany(ChatMessages::class,'user_id', 'id');
    }

    public function online()
    {
        if ($this->last_activity >= time() - 600)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function contact()
    {
        return $this->hasMany(\App\Models\Contact::class,'from_id', 'id');
    }
    public function mail()
    {
        return $this->hasMany(\App\Models\Contact::class,'to_id', 'id');
    }

}
