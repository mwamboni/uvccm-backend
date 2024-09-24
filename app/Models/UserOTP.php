<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserOTP extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'phone', 'otp', 'expired_at', 'mac_address', 'ip_address', 'status'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = (string) Str::uuid();
                $model->otp = random_int(123456, 999999);
                $model->status = 0;
                $model->expired_at = now()->addHours(2);
                $model->mac_address = request()->ip();
                $model->ip_address = request()->ip();
            }
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'expired_at' => 'datetime',
        ];
    }
}
