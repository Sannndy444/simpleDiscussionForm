<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Catagories::class);
    }

    public function posts()
    {
        $this->hasMany(Posts::class);
    }
}
