<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'title',
        'code',
        'description',
        'date',
        'time',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = (string) Str::uuid();
                $model->code = random_int(123654, 999999);
            }
        });
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => date("d-m-Y",strtotime($value)),
            set: fn (string $value) => date("Y-m-d",strtotime($value)),
        );
    }

    /**
     * Get all of the meetingMember for the Meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetingMember(): HasMany
    {
        return $this->hasMany(MeetingMember::class, 'id');
    }
}
