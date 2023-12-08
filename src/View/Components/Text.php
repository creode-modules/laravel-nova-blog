<?php

namespace Creode\LaravelNovaBlog\View\Components;

use Creode\LaravelNovaBlog\Http\Traits\Translatable;
use Illuminate\View\Component;

class Text extends Component
{

    use Translatable;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function translate($value)
    {
        return $value->{app()->currentLocale()};
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.text');
    }
}
