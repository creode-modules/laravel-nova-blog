<?php

namespace Creode\LaravelNovaBlog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
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
    public function show(string $slug)
    {
        $post = $this->postRepository
            ->where('slug', $slug)
            ->published()
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('nova-blog::show', [
            'post' => $post
        ]);
    }
}
