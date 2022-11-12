<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->belongsToMany(Song::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function followers()
    {
        return $this->belongsToMany('User', 'user_user', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany('User', 'user_user', 'follower_id', 'followed_id');
    }
}
