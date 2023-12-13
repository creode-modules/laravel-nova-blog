@extends('blog::layouts.master')

@section('content')

    <h1 class="text-7xl mb-10">{{ $post->title }} <small class="text-xl"> by {{ $post->author->name }}</small></h1>
    <img src="{{ asset('storage').'/'.$post->featured_image }}" alt="">
    <h5 class="my-5"><strong>Categories: </strong>{{ $post->categories->pluck('title')->implode(', ') }}</h5>

    @foreach($post->flexible('body') as $block)
        <x-dynamic-component :component="$block->name()" :$block></x-dynamic-component>
    @endforeach

@endsection
