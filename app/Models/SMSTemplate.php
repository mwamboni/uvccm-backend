<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class SMSTemplate extends Model
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
        'template_category_id',
        'message',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(SMSTemplateCategory::class);
    }
}
