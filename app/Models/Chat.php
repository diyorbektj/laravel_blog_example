<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'to_id',
        'read',
        'message',
        'file',
        'created_at',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id', 'id');
    }
    public function juser()
    {
        return $this->belongsTo(\App\Models\User::class,'to_id', 'id');
    }
}
