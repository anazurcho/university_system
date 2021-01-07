<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentShell extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lecture_id',
        'total_score'
    ];

    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
