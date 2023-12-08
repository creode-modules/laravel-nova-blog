<?php

namespace Creode\LaravelNovaBlog\Http\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    public function translate($block)
    {
        $locale = App::getLocale();
        return $block->{$locale};
    }
}
