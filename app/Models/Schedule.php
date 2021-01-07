<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'day',
        'time'
    ];

    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }
}
