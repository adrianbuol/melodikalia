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
}
