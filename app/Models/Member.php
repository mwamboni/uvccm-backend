<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class Member extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = (string) Str::uuid();
            }
        });
    }

    protected $fillable = [
        'uid',
        'branch_id',
        'first_name',
        'middle_name',
        'last_name',
        'id_card_type',
        'id_card',
        'phone',
        'gender',
        'dob',
        'disability_status',
        'disablity',
        'disability_description',
        'employment_status'
    ];

    /**
     * Change Date Of Birth to Date Format.
     */
    protected function dob(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => date("d-m-Y",strtotime($value)),
            set: fn (string $value) => date("Y-m-d",strtotime($value)),
        );
    }

    /**
     * Get the branch that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
