<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
//        'course_tags'
    ];

    public function lectures(){
        return $this->hasMany(Lecture::class);
    }
    public function course_tags() {
        return $this->belongsToMany(CourseTag::class);
    }
}
