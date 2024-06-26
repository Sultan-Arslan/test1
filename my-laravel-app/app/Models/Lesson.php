<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'date', 'specialist_id', 'capacity',
    ];

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'lesson_users');
    }
}
