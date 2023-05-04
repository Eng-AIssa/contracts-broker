<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * Virtual Attributes
     */
    public function name(): Attribute
    {
        return new Attribute(fn() => $this->user->name);
    }

    public function managerEmail(): Attribute
    {
        return new Attribute(fn() => $this->user->email);
    }
}
