<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    /** @use HasFactory<\Database\Factories\AssessmentFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'santri_id',
        'lesson_id',
        'score',
        'evaluation',
        'date'
    ];

    public function santri(){
        return $this->belongsTo(User::class,'santri_id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id');
    }
}
