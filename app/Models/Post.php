<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'caption',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, "likes");
    }
    public function comments()
    {
        return $this->belongsToMany(User::class, "comments");
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
