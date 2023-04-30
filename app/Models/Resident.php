<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;


class Resident extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'residents';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'email',
        'nationality',
        'id_number'
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
        return $this->hasMany(Contract::class, 'resident_id', 'id');
    }

    public function rentedUnits()
    {
        return $this->contracts->map->unit;
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'resident_user', 'resident_id', 'user_id')->withTimestamps();
    }
}
