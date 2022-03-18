<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Other extends Model
{
    use HasFactory;

    protected $table = 'others';

    
    protected $fillable = [
        'photo_path',
        'avatar_path',
        'status',
        'user_id'
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

}
