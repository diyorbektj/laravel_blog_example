<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class MetaTeg extends Model
{
    use HasFactory;

    protected $table = 'metategs';

    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'id', 'meta_id');
    }
}
