<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    /** @use HasFactory<\Database\Factories\AssesmentFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'lesson_id',
        'score',
        'evalitation',
        'date',
    ];

    public function Assesment()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }

    public function santri()
    {
        return $this->belongsTo(User::class, 'santri_id');
    }
}
