<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followes extends Model
{
    use HasFactory;
    protected $fillable = [
        'follower_id',
        'following_id',
    ];
}
