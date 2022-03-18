<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'post_id',
    ];

    public function post()
    {
        return $this->hasMany(Post::class,'post_id', 'id');
    }
}
