@extends('nova-blog::layouts.master')

@section('content')
    @if ($post->featured_image)
        <img src="{{ $post->featured_image_url }}" alt="{{ __('Featured image for article {title}', ['{title}' => $post->title])}}">
    @endif

    <h1 class="text-7xl mb-10">{{ $post->title }}</h1>

    @include('page-builder::components', ['components' => $post->components])
@endsection
