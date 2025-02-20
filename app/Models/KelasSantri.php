<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    protected $fillable = [
        'major',
        'mentor_id',
    ];


    public function list_santri(){
      return  $this->hasMany(User::class,'kelas_id');
    }

    public function mentor(){
        return $this->belongsTo(User::class,'mentor_id');
    }

    public function list_lesson(){
        return $this->hasMany(Lesson::class,'kelas_id');
    }

}
