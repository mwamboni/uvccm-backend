<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class SMSConfiguration extends Model
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
        'sender_name',
        'api_key',
        'secret_key',
        'sms_count',
        'base_api_url',
        'otp_api_url',
        'is_active',
    ];
}
