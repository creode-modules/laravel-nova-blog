<?php

namespace Creode\LaravelNovaBlog\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use Whitecube\NovaFlexibleContent\Flexible;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \Creode\LaravelNovaBlog\Entities\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'body',
    ];

    public static $group = 'Blog';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255')
                ->translatable(),
            Slug::make('Slug')->from('Title'),
            Boolean::make('Featured Post', 'featured_post'),
            Flexible::make('Body')->addLayout('Image and Text', 'ImageAndText', [
                Image::make('Image', 'image')
                    ->disk('public')
                    ->path('blog')
                    ->prunable(),
                Markdown::make('Text', 'Text')
                    ->translatable(),
            ])
            ->addLayout('Text', 'text', [
                Markdown::make('Text', 'text')
                    ->translatable(),
            ])
            ->addLayout('Images Side by Side', 'ImagesSideBySide', [
                Image::make('Left Image', 'left_image')
                    ->disk('public')
                    ->path('blog')
                    ->prunable(),
                Image::make('Right Image', 'right_image')
                    ->disk('public')
                    ->path('blog')
                    ->prunable(),
            ])
            ->button('Add Content'),
            Textarea::make('Excerpt'),
            Image::make('Featured Image', 'featured_image')
                ->disk('public')
                ->path('blog')
                ->prunable(),
            BelongsTo::make('Author', 'author', 'App\Nova\User')
                ->default(auth()->id()),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
