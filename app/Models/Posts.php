<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'thread_id',
        'user_id',
        'content'
    ];

    public function threads()
    {
        $this->belongTo(Threads::class);
    }

    public function user()
    {
        $this->hasMany(User::class);
    }
}
