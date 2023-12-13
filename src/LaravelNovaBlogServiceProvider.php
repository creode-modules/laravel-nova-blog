<?php

namespace Creode\LaravelNovaBlog;

use Creode\LaravelNovaBlog\Nova\Post;
use Creode\LaravelNovaBlog\Nova\PostCategory;
use Illuminate\Support\Facades\Blade;
use Laravel\Nova\Nova;
use Creode\LaravelNovaBlog\View\Components\ImageAndText;
use Creode\LaravelNovaBlog\View\Components\ImagesSideBySide;
use Creode\LaravelNovaBlog\View\Components\Text;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaBlogServiceProvider extends PackageServiceProvider
{

    public function boot()
    {
        parent::boot();

        $this->registerResources();
        $this->registerComponents();
    }

    public function registerResources()
    {
        Nova::resources([
            Post::class,
            PostCategory::class,
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

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-nova-blog')
            ->hasViews()
            ->hasRoutes('web')
            ->hasMigrations(
                [
                    '2023_08_07_122000_create_post_categories_table',
                    '2023_08_07_123305_create_posts_table',
                    '2023_08_07_154029_create_post_post_category_table',
                    '2023_08_10_104458_add_slug_field_to_posts_table',
                    '2023_08_10_134620_add_slug_field_to_post_categories_table',
                    '2023_08_10_152446_add_featured_post_field_to_posts_table',
                    '2023_08_10_160255_add_featured_image_field_to_posts_table',
                ]
            )
            ->runsMigrations();
    }
}
