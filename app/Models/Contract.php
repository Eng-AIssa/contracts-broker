<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Contract extends Model
{
    use HasFactory, HasUuids;

    const RESIDENT = 'اعتماد المستأجر';
    const REJECTED = 'مرفوض';
    const BROKER = 'مراجعة الوسيط';
    const OWNER = 'دفع المالك';
    const CERTIFIED = 'معتمد';
    const CANCELED = 'ملغي قبل الدفع';
    const CANCELED_AFTER_PAYMENT = 'ملغي بعد الدفع';
    const CONTRACT_STATUSES = [
        ['en' => 'Confirmed', 'ar' => 'معتمد'],
        ['en' => 'Rejected', 'ar' => 'مرفوض'],
        ['en' => 'Resident Confirm', 'ar' => 'اعتماد المستأجر'],
        ['en' => 'Broker Review', 'ar' => 'مراجعة الوسيط'],
    ];

    const FEES = 150;

    protected $table = 'contracts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'owner_id',
        'unit_id',
        'resident_id',
        'entry_date',
        'leaving_date',
        'status',
        'contract_fees',
        'rental_fees',
        'otp',
        'created_by'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'entry_date',
        'leaving_date'
    ];


    /**
     * Relations
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


    /**
     * Dynamic Relations/Columns
     */
    public function scopeWithNames(Builder $query): void
    {
        $query->addSelect([
            'owner_name' => User::select('name')
                ->whereColumn('id', 'contracts.owner_id'),
            'owner_mail' => User::select('email')
                ->whereColumn('id', 'contracts.owner_id'),
            'unit_code' => Unit::select('code')
                ->whereColumn('id', 'contracts.unit_id')
        ]);
    }

    /**
     * Owner Virtual Attributes
     */
    public function ownerPhone(): Attribute
    {
        return new Attribute(fn() => $this->owner->userable->phone);
    }

    public function ownerEmail(): Attribute
    {
        return new Attribute(fn() => $this->owner->email);
    }

    public function ownerIdNumber(): Attribute
    {
        return new Attribute(fn() => $this->owner->userable->id_number);
    }

    /**
     * Unit Virtual Attributes
     */
    public function unitName(): Attribute
    {
        return new Attribute(fn() => $this->unit->code);
    }

    /**
     * Resident Virtual Attributes
     */
    public function residentName(): Attribute
    {
        return new Attribute(fn() => $this->resident->name);
    }

    public function residentEmail(): Attribute
    {
        return new Attribute(fn() => $this->resident->email);
    }

    public function residentIdNumber(): Attribute
    {
        return new Attribute(fn() => $this->resident->id_number);
    }

    public function residentNationality(): Attribute
    {
        return new Attribute(fn() => $this->resident->nationality);
    }

    /**
     * Helpers
     */
    public function verifyOtp($otp): bool
    {
        return $this->otp == $otp;
    }

    public function isPending(): bool
    {
        return $this->status == Contract::RESIDENT;
    }
}
