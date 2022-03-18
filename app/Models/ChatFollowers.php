<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChatFollowers extends Model
{
    use HasFactory;

    protected $table = 'chat_followers';

    protected $fillable = [
        'chat_id',
        'user_id',
        'count',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
