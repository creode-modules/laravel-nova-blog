<?php

namespace Creode\LaravelNovaBlog;

use Creode\LaravelNovaBlog\Nova\Post;
use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaBlogServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->registerResources();
    }

    public function registerResources()
    {
        Post::$model = config('nova-blog.post_model', \Creode\LaravelNovaBlog\Entities\Post::class);
        Post::$trafficCop = config('nova-blog.traffic_cop');
        Nova::resources([
            Post::class,
        ]);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-nova-blog')
            ->hasViews()
            ->hasConfigFile()
            ->hasMigrations(
                [
                    '2023_08_07_122000_create_post_categories_table',
                    '2023_08_07_123305_create_posts_table',
                    '2023_08_07_154029_create_post_post_category_table',
                    '2023_08_10_104458_add_slug_field_to_posts_table',
                    '2023_08_10_134620_add_slug_field_to_post_categories_table',
                    '2023_08_10_152446_add_featured_post_field_to_posts_table',
                    '2023_08_10_160255_add_featured_image_field_to_posts_table',
                    '2024_02_01_164553_remove_post_post_categories_table',
                    '2024_02_01_164655_remove_post_categories_tables',
                    '2024_02_02_150337_remove_author_field',
                    '2024_02_02_155625_add_meta_description_field',
                    '2024_02_02_163321_create_published_at_field',
                ]
            )
            ->runsMigrations();
    }
}
