<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'ward_id', 'name'];

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
     * Get all of the member for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member(): HasMany
    {
        return $this->hasMany(Member::class, 'id');
    }

    /**
     * Get the ward that owns the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
