<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'activity_id',
        'status',
        'date',
    ];

    public function santri()
    {
        return $this->belongsTo(User::class, 'santri_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activities::class, 'activity_id');
    }
}
