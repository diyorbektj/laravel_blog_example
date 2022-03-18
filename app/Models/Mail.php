<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'to_id', 'from_id', 'message', 'is_read', 'is_deleted', 'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'to_id','id');
    }
}
