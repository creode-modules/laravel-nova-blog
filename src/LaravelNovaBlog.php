<?php

namespace Creode\LaravelNovaBlog;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class LaravelNovaBlog extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('laravel-nova-blog', __DIR__.'/../dist/js/tool.js');
        Nova::style('laravel-nova-blog', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return MenuSection::make('Laravel Nova Blog')
            ->path('/laravel-nova-blog')
            ->icon('server');
    }
}
