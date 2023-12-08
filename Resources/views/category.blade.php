@extends('blog::layouts.master')

@section('content')

    <h1 class="text-7xl mb-10">{{ $postCategory->title }}</h1>

    <div class="grid grid-cols-12 gap-10">
        <aside class="col-span-4">
            <h3 class="text-2xl">Categories</h3>
            <hr>
            <ul>
                @foreach($postCategories as $category)
                    <li class="mt-3 underline"><a href="{{ route('blog.category.show', $category) }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </aside>
        <section class="col-span-8">
            <div class="grid grid-cols-3 mb-10 gap-6">
                @foreach($postCategory->posts as $post)
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
