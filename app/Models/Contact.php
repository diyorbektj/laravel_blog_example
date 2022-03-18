<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'from_id','message','count', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'from_id','id');
    }
    public function ot()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }
}
