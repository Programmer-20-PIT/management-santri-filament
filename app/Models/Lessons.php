<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    /** @use HasFactory<\Database\Factories\LessonsFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'kelas_santri_id',
    ];

    public function kelas_santri()
    {
        return $this->belongsTo(KelasSantri::class, 'kelas_santri_id');
    }

    public function Assesment()
    {
        return $this->hasMany(Assesment::class, 'lesson_id');
    }
}
