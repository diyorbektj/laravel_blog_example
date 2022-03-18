<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';

    protected $fillable = [
        'chat_id',
        'user_id',
        'to_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
