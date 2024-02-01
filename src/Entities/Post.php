<?php

namespace Creode\LaravelNovaBlog\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Post extends Model
{
    use HasFlexible, HasTranslations;
    protected $fillable = [];

    public $translatable = ['title'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
