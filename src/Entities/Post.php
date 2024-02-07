<?php

namespace Creode\LaravelNovaBlog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PawelMysior\Publishable\Publishable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Creode\NovaPageBuilder\Traits\HasComponents;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Post extends Model
{
    use HasFlexible, HasTranslations, Publishable, HasComponents, HasFactory;

    /**
     * Determine the field which will be used for Page Builder components.
     *
     * @var string
     */
    protected $componentField = 'body';

    /**
     * Adds the flexible content field to the model.
     *
     * @var array
     */
    protected $casts = [
        'body' => FlexibleCast::class,
    ];

    /**
     * Sets attributes which will be translatable.
     *
     * @var array
     */
    public $translatable = ['title'];

    /**
     * Set default table for the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return \Creode\LaravelNovaBlog\Database\Factories\PostFactory::new();
    }

    /**
     * Query Scope to get all featured articles.
     *
     * @param Builder $query
     */
    public function scopeIsFeatured(Builder $query): void
    {
        $query->where('featured_post', true);
    }

    /**
     * Allows the retrieval of the featured image URL.
     *
     * @return Attribute
     */
    public function featuredImageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Storage::disk(config('nova-blog.image_disk', 'public'))
                    ->url($this->featured_image);
            }
        );
    }
}
