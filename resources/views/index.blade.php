@extends('blog::layouts.master')

@section('content')
    <h1 class="text-7xl mb-10">Blog</h1>
    <div class="grid grid-cols-12 gap-10">
        <aside class="col-span-4">
            <h3 class="text-2xl">Categories</h3>
            <hr>
            <ul>
                @foreach($postCategories as $postCategory)
                    <li class="mt-3 underline"><a href="{{ route('blog.category.show', $postCategory) }}">{{ $postCategory->title }}</a></li>
                @endforeach
            </ul>
        </aside>
        <section class="col-span-8">
            <article class="mb-10 bg-gray-100 p-4 flex gap-4">
                <div class="w-1/2">
                    <img src="{{ asset('storage').'/'.$featuredPost->featured_image }}" alt="">
                </div>
                <div>
                    <h2 class="text-2xl font-bold underline"><a href="{{ route('blog.post.show', $featuredPost) }}">{{ $featuredPost->title }}</a></h2>
                    <p class="text-gray-400 mb-4"><strong>{{ $featuredPost->categories->pluck('title')->implode(', ') }}</strong></p>
                    <p>{{ $featuredPost->excerpt }}</p>
                </div>
            </article>
            <div class="grid grid-cols-3 mb-10 gap-6">
                @foreach($posts as $post)
                    <article class="bg-gray-100 p-4">
                        <img src="{{ asset('storage').'/'.$post->featured_image }}" alt="">
                        <h2 class="text-2xl font-bold underline"><a href="{{ route('blog.post.show', $post) }}">{{ $post->title }}</a></h2>
                        <p class="text-gray-400 mb-4"><strong>{{ $post->categories->pluck('title')->implode(', ') }}</strong></p>
                        <p>{{ $post->excerpt }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </div>

@endsection
