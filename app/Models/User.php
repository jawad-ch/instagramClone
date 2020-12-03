<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id', 'id');
    }
    public function post()
    {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
    public function followes()
    {
        return $this->hasMany('App\Models\User');
    }
    
    // users that are followed by this user
    function following() {
        return $this->belongsToMany(User::class, 'followes', 'follower_id', 'following_id');
    }

    // users that follow this user
    public function followers() {
        return $this->belongsToMany(User::class, 'followes', 'following_id', 'follower_id');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, "likes");
    }
    public function comments()
    {
        return $this->belongsToMany(Post::class, "comments");
    }

    public function isFollowing(User $user)
    {
        return (bool) Followes::where('following_id', $user->id)->count();
    }
}
