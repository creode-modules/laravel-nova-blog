<?php

namespace Creode\LaravelNovaBlog\Repositories;

use Creode\LaravelRepository\BaseRepository;

class PostRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     */
    protected function getModel(): string
    {
        return config('nova-blog.post_model', \Creode\LaravelNovaBlog\Entities\Post::class);
    }
}
