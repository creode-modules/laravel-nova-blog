<?php

namespace Creode\LaravelNovaBlog\Providers;

use Illuminate\Support\Facades\Blade;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Creode\LaravelNovaBlog\View\Components\ImageAndText;
use Creode\LaravelNovaBlog\View\Components\ImagesSideBySide;
use Creode\LaravelNovaBlog\View\Components\Text;

class BlogNovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Boots everything this package needs to boot into Nova.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerResources();
        $this->registerComponents();
    }

    public function registerResources()
    {
        Nova::resources([
            \Creode\LaravelNovaBlog\Nova\Post::class,
            \Creode\LaravelNovaBlog\Nova\PostCategory::class,
        ]);
    }

    public function registerComponents()
    {

//        $registerComponentEvent = new RegisterComponentEvent();
//
//        trigger($registerComponentEvent);
//
//        foreach ($registerComponentEvent->components as $component) {
//            Blade::anonymousComponentPath(module_path($component->name, $component->path));
//        }

        //Blade::anonymousComponentPath(module_path('Blog', '/Resources/views/components'));

        Blade::components([
            'ImageAndText' => ImageAndText::class,
            'ImagesSideBySide' => ImagesSideBySide::class,
            'text' => Text::class,
        ]);
    }
}
