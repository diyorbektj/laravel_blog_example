<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\Image;
use App\Models\MetaTeg;
use App\Models\Comments;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 
        'body',
        'slug',
        'status',
        'reads',
        'time',
        'user_id',
        'category_id',
        'meta_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function meta()
    {
        return $this->belongsTo(MetaTeg::class,'meta_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class,'post_id', 'id');
    }
    public function image()
    {
        return $this->belongsTo(Image::class,'id', 'post_id');
    }
}
