<?php

namespace Creode\LaravelNovaBlog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Creode\LaravelNovaBlog\Entities\Post;
use Creode\LaravelNovaBlog\Repositories\PostRepository;

class BlogController extends Controller
{
    /**
     * Constructor for class.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(protected PostRepository $postRepository)
    {
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function showPost(Post $post)
    {
        return view('nova-blog::show', compact('post'));
    }
}
