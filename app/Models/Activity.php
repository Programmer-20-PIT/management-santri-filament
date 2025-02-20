<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'activity_date',
        'description',
        'is_event',
    ];

    public function list_attendences(){
        return $this->hasMany(Attendence::class,'activity_id') ;
    }
}
