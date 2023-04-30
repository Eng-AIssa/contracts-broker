<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    const AS_OWNER = 'مالك';
    const AS_RENTER = 'معيد التأجير';
    const AS_AUTHORIZED = 'وكيل';

    protected $table = 'units';
    protected $primaryKey = 'id';


    protected $fillable = [
        'code',
        'owner_id',
        'responsible_id',
        'responsible_as'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'unit_id', 'id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }
}
