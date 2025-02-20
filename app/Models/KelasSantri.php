<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSantri extends Model
{
    /** @use HasFactory<\Database\Factories\KelasSantriFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'mentor_id',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'kelas_santri_id');
    }

}
