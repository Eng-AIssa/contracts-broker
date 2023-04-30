<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owners';
    protected $primaryKey = 'id';


    protected $fillable = [
        'id_number',
        'phone',
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

    public function name(): Attribute
    {
        return new Attribute(fn() => $this->user->name);
    }

    public function email(): Attribute
    {
        return new Attribute(fn() => $this->user->email);
    }

    public function contracts(): HasManyThrough
    {
        return $this->hasManyThrough(Contract::class, User::class, 'userable_id', 'owner_id');
    }

    public function units(): HasManyThrough
    {
        return $this->hasManyThrough(Unit::class, User::class, 'userable_id', 'owner_id');
    }

    /**
     * Dynamic Relations/Columns
     */
    public function scopeWithFullInfo(Builder $query): void
    {
        $query->addSelect([
            "name" => User::select('name')
                ->whereColumn('userable_id', 'owners.id')->where('userable_type', 'App\Models\Owner')->latest()->take(1),
            "email" => User::select('email')
                ->whereColumn('userable_id', 'owners.id')->where('userable_type', 'App\Models\Owner')->latest()->take(1),
        ]);
    }
}
