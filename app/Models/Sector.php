<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sectors';
    protected $primaryKey = 'id';


    //protected $appends = ['name', 'manager_email'];
    protected $fillable = [
        'code',
        'registration_number',
        'fees',
        'manager_name',
        'manager_phone',
        'manager_id',
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
    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function units(): HasManyThrough
    {
        return $this->hasManyThrough(Unit::class, User::class, 'userable_id', 'sector_id');
    }


    /**
     * Scope a query to only include certain sectors.
     */

    public function scopeSector(Builder $query): void
    {
        $query->where('userable_type', '=', 'App\Models\Sector');
    }
    public function scopeOwner(Builder $query): void
    {
        $query->where('userable_type', '=', 'App\Models\Owner');
    }

    public function scopeSearchManagerPhone(Builder $query, string $search): void
    {
        $query->where('manager_phone', 'like', '%' . $search . '%');
    }

    public function scopeOrSearchRegisterNumber(Builder $query, string $search): void
    {
        $query->orWhere('registration_number', 'like', '%' . $search . '%');
    }


    /**
     * Virtual Attributes
     */
    public function SectorName(): Attribute
    {
        return new Attribute(fn() => $this->user->name);
    }

    public function managerEmail(): Attribute
    {
        return new Attribute(fn() => $this->user->email);
    }


    /**
     * Dynamic Relations/Columns
     */
    public function scopeWithFullInfo(Builder $query): void
    {
        $query->addSelect([
            "name" => User::select('name')
                ->whereColumn('userable_id', 'sectors.id')->where('userable_type', 'App\Models\Sector')->latest()->take(1),
            "email" => User::select('email')
                ->whereColumn('userable_id', 'sectors.id')->where('userable_type', 'App\Models\Sector')->latest()->take(1),
        ]);
    }
}
