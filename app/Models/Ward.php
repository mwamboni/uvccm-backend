<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'state_id', 'name'];

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
     * Get the branch that owns the Ward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'id');
    }

    /**
     * Get all of the state for the Ward
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function state(): HasMany
    {
        return $this->hasMany(State::class, 'state_id');
    }
}
