<?php

namespace Creode\LaravelNovaBlog\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use PawelMysior\Publishable\Publishable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Post extends Model
{
    use HasFlexible, HasTranslations, Publishable;

    protected $fillable = [];

    public $translatable = ['title'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
