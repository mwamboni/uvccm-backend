<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Region extends Model
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

    protected $fillable = ['uid', 'name'];

    /**
     * Get all of the district for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function district(): HasMany
    {
        return $this->hasMany(District::class, 'id');
    }
}
