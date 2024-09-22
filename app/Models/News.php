<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class News extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uid)) {
                $model->uid = (string) Str::uuid();
                $model->slug = Str::slug($model->title);
                // $model->created_by = Auth::user()->id;
            }
        });


    }

    protected $fillable = [
        'uid',
        'news_category_id',
        'created_by',
        'title',
        'slug',
        'image',
        'description',
        'status',
        'published_at'
    ];

    /**
     * Get the newsCategory that owns the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsCategory(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
