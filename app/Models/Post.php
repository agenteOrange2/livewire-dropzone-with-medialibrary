<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $registerMediaConversionsUsingModelInstance = true;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'file'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('webp')
            ->format('webp')
            ->width(800)
            ->height(800)
            ->optimize()
            ->nonQueued();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
