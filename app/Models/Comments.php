<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'pcomment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function puser()
    {
        return $this->belongsTo(User::class,'pcomment_id', 'id');
    }
}
