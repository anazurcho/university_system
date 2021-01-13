<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'likes',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post_tags() {
        return $this->belongsToMany(PostTag::class);
    }
}
