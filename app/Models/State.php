<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class State extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'district_id', 'name'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = (string) Str::uuid();
            }
        });
    }

    /**
     * Get all of the ward for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ward(): HasMany
    {
        return $this->hasMany(Ward::class, 'id');
    }

    /**
     * Get the district that owns the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
