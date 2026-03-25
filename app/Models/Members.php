<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'document_id',
        'birth_date',
        'age',
        'age_range',
        'gender',
        'marital_status',
        'ministry',
        'ministry_role',
        'church_role',
        'phone',
        'email',
        'address',
        'neighborhood',
        'is_baptized',
        'is_sealed',
        'friend_relation',
        'join_date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'join_date' => 'date',
        'is_baptized' => 'boolean',
        'is_sealed' => 'boolean',
        'age' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            $member->calculateAge();
            $member->calculateAgeRange();
            if (!$member->status) {
                $member->status = 'activo';
            }
        });

        static::updating(function ($member) {
            if ($member->isDirty('birth_date')) {
                $member->calculateAge();
                $member->calculateAgeRange();
            }
        });
    }

    /**
     * Calculate age from birth date.
     */
    public function calculateAge(): void
    {
        if ($this->birth_date) {
            $this->age = Carbon::parse($this->birth_date)->age;
        }
    }

    /**
     * Calculate age range based on age.
     */
    public function calculateAgeRange(): void
    {
        if (!$this->age) {
            $this->calculateAge();
        }

        if ($this->age <= 12) {
            $this->age_range = 'niños';
        } elseif ($this->age <= 25) {
            $this->age_range = 'jóvenes';
        } elseif ($this->age <= 59) {
            $this->age_range = 'adultos';
        } else {
            $this->age_range = 'adultos_mayores';
        }
    }

    /**
     * Scope a query to only include active members.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'activo');
    }

    /**
     * Scope a query to only include inactive members.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactivo');
    }

    /**
     * Scope a query to filter by age range.
     */
    public function scopeByAgeRange($query, $ageRange)
    {
        return $query->where('age_range', $ageRange);
    }

    /**
     * Scope a query to filter by gender.
     */
    public function scopeByGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

    /**
     * Scope a query to filter by ministry.
     */
    public function scopeByMinistry($query, $ministry)
    {
        return $query->where('ministry', $ministry);
    }

    /**
     * Scope a query to search by name or document.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('fullname', 'like', "%{$search}%")
              ->orWhere('document_id', 'like', "%{$search}%");
        });
    }

    /**
     * Get formatted church role name.
     */
    public function getFormattedChurchRoleAttribute(): string
    {
        $roles = config('church.roles');

        return $roles[$this->church_role] ?? ucfirst($this->church_role);
    }

    /**
     * Get formatted ministry name.
     */
    public function getFormattedMinistryAttribute(): string
    {
        $ministries = config('church.ministries');

        return $ministries[$this->ministry] ?? ucfirst($this->ministry);
    }

    /**
     * Get ministry roles based on ministry type.
     */
    public static function getMinistryRoles(string $ministry): array
    {
        $roles = config('church.ministry_roles');

        return $roles[$ministry] ?? ['' => 'Sin rol específico'];
    }
}
