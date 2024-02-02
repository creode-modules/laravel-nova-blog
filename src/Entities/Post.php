<?php

namespace Creode\LaravelNovaBlog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use PawelMysior\Publishable\Publishable;
use Spatie\Translatable\HasTranslations;
use Creode\NovaPageBuilder\Traits\HasComponents;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Whitecube\NovaFlexibleContent\Value\FlexibleCast;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Post extends Model
{
    use HasFlexible, HasTranslations, Publishable, HasComponents;

    protected $componentField = 'body';

    protected $casts = [
        'body' => FlexibleCast::class,
    ];

    public $translatable = ['title'];

    public function featuredImageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Storage::disk(config('nova-blog.storage.disk', 'public'))
                ->url($this->featured_image);
            }
        );
    }
}
