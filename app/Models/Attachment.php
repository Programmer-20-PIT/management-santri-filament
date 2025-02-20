<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'attachment_name',
        'attachment_path',
    ];

    public function list_attachment_santri(){
        return $this->hasMany(AttachmentSantri::class,'attachment_id') ;
    }
}
