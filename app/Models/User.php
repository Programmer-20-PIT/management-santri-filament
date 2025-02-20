<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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
        'kelas_santri_Id',
        'department_id',
        'program_stage_id',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'generation',
        'entry_date',
        'graduate_date',
        'status_graduate',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for seri    alization.
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
        $prefix = strtoupper(substr($role ? 'XX' : $role, 0, 3));
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

    public function kelas_of_()
    {
        return $this->hasMany(KelasSantri::class, 'mentor_id');
    }

    public function leader_of_()
    {
        return $this->hasMany(Department::class, 'leader_id');
    }

    public function co_leader_of_()
    {
        return $this->hasMany(Department::class, 'co_leader_id');
    }

    public function raport()
    {
        return $this->hasOne(RaportSantri::class, 'santri_id');
    }

    public function assesment()
    {
        return $this->hasOne(Assesment::class, 'santri_id');
    }

    public function permission()
    {
        return $this->hasMany(Permission::class, 'santri_id');
    }

    public function santriFamily()
    {
        return $this->hasMany(SantriFamily::class, 'santri_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }

    public function financialRecord()
    {
        return $this->hasMany(FinancialRecord::class, 'accounting_id');
    }

    public function AttachmentSantri()
    {
        return $this->hasMany(AttachmentSantri::class, 'santri_id');
    }

    public function Activities()
    {
        return $this->belongsTo(Activities::class, 'santri_id');
    }


}
