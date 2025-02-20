<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    /** @use HasFactory<\Database\Factories\AttendenceFactory> */
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'activity_id',
        'activity_date',
        'status',
    ];


    public function activity(){
        return $this->belongsTo(Activity::class,'activity_id');
    }

    public function santri(){
        return $this->belongsTo(User::class,'santri_id') ;
    }
}
