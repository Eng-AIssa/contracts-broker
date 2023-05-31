<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    //const AS_OWNER = 'مالك';
    //const AS_RENTER = 'معيد التأجير';
    //const AS_AUTHORIZED = 'وكيل';
    const RESPONSIBILITY_FORMS = ['مالك', 'معيد التأجير', 'وكيل'];

    protected $table = 'units';
    protected $primaryKey = 'id';


    protected $fillable = [
        'code',
        'owner_id',
        'sector_id',
        'responsible_id',
        'responsible_as',
        'created_by'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    /**
     * Relations
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'unit_id', 'id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sector_id', 'id');
    }

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }


    /**
     * Scope a query to only include certain users.
     */
    public function scopeSearchCode(Builder $query, string $search): void
    {
        $query->where('code', 'like', '%' . $search . '%');
    }

    public function scopeSelectSector(Builder $query, string $sector): void
    {
        $query->where('sector_id', 'like', $sector);
    }
}
