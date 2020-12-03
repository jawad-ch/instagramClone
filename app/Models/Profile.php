<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'bio',
        'profileImg',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function profileImage()
    {
        $imagePath = ($this->profileImg) ? '/storage/'. $this->profileImg : 'images/noImage.png';

        return $imagePath;
    }
}
