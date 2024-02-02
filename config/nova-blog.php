<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Excluded Blocks
    |--------------------------------------------------------------------------
    |
    | This value contains the blocks which will be excluded from the page
    | builder for blog posts.
    |
    */

    'excluded_blocks' => [],

    /*
    |--------------------------------------------------------------------------
    | Post Model
    |--------------------------------------------------------------------------
    |
    | Model class which will be used within this package.
    |
    */
    'post_model' => \Creode\LaravelNovaBlog\Entities\Post::class,

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | Prefix used when defining the blog routes.
    |
    */
    'route_prefix' => 'blog',

    /*
    |--------------------------------------------------------------------------
    | Image Disk
    |--------------------------------------------------------------------------
    |
    | The disk on which to store images on.
    */
    'image_disk' => 'public',
];
