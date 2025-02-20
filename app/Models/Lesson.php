<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'kelas_id',
        'description',
    ];


    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function list_assesment(){
        return $this->hasMany(Assessment::class,'lesson_id');
    }




}
