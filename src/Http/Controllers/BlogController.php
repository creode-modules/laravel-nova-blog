<?php

namespace Creode\LaravelNovaBlog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Creode\LaravelNovaBlog\Entities\Post;
use Creode\LaravelNovaBlog\Entities\PostCategory;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $postCategories = PostCategory::all();
        $posts = Post::with('author', 'categories')->where('featured_post', '=', 0)->get();
        $featuredPost = Post::with('author', 'categories')->where('featured_post', '=', 1)->first();
        return view('nova-blog::index', compact('posts', 'featuredPost', 'postCategories'));
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function showPost(Post $post)
    {
        $post->load('author', 'categories');
        return view('nova-blog::show', compact('post'));
    }

    public function showCategory(PostCategory $postCategory)
    {
        $postCategories = PostCategory::all();
        $postCategory->load('posts');
        return view('nova-blog::category', compact('postCategories', 'postCategory'));
    }
}
