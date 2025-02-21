<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Panel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable  implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        if (Auth::user()->role === $panel->getId()) {
            return true;
        } else {
            return false;
        }
    }

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_ktp',
        'nisn',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'generation',
        'entry_date',
        'graduate_date',
        'status_graduate',
        'kelas_id',
        'department_id',
        'program_stage_id',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function generateCustomId($role)
    {
        $prefix = strtoupper(substr($role, 0, 3));
        $prefix = str_pad($prefix, 3, 'X');
        $uniqueId = Str::upper(Str::random(15));

        return $prefix . $uniqueId;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            Log::info($model);
            if (empty($model->id)) {
                do {
                    $id = self::generateCustomId($model->role);
                } while (self::where('id', $id)->exists());

                $model->id = $id;
            }
        });
    }

    public function mentor_of()
    {
        return $this->hasMany(Kelas::class, 'mentor_id');
    }

    public function leader_of()
    {
        return $this->hasMany(Departement::class, 'leader_id');
    }
    public function co_leader_of()
    {
        return $this->hasMany(Departement::class, 'co_leader_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function department()
    {
        return $this->belongsTo(Departement::class, 'department_id');
    }

    public function program_stage()
    {
        return $this->belongsTo(ProgramStage::class, 'program_stage_id');
    }

    public function list_izin()
    {
        return $this->hasMany(Permission::class, 'santri_id');
    }

    public function list_assesment()
    {
        return $this->hasMany(Assessment::class, 'santri_id');
    }

    public function list_attendence()
    {
        return $this->hasMany(Attendence::class, 'santri_id');
    }

    public function list_attachment()
    {
        return $this->hasMany(AttachmentSantri::class, 'santri_id');
    }

    public function family()
    {
        return $this->hasOne(SantriFamily::class, 'santri_id');
    }
}
