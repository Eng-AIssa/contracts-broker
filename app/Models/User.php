<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';
    protected $primaryKey = 'id';


    protected $fillable = [
        'userable_id',
        'userable_type',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'email_verified_at'
    ];


    /**
     * Relations
     */
    public function userable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'userable_type', 'userable_id');
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'owner_id', 'id');
    }

    public function createdContracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'created_by', 'id');
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'owner_id', 'id');
    }

    public function residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, 'resident_user', 'user_id', 'resident_id')->withTimestamps();
    }


    /**
     * Dynamic Relations/Columns
     */
    public function lastContract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function scopeWithLastContractId(Builder $query): void
    {
        $query->addSelect(["last_contract_id" => Contract::select('id')
            ->whereColumn('owner_id', 'users.id')->latest()->take(1)
        ]);
    }

    public function scopeWithFullInfo(Builder $query): void
    {
        $query->addSelect([
            "phone" => Owner::select('phone')
                ->whereColumn('id', 'users.userable_id')->where('userable_type', 'App\Models\Owner')->latest()->take(1),
            "id_number" => Owner::select('id_number')
                ->whereColumn('id', 'users.userable_id')->where('userable_type', 'App\Models\Owner')->latest()->take(1)
        ]);;
    }
}
