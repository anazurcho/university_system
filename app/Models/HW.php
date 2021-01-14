<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HW extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }

}
