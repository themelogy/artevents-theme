@extends('layouts.master')

@section('content')
    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ $media->title }}</h1>
        <a class="category" href="{{ route('mediapress.media.category', $media->media_type) }}">{{ $media->present()->media_type }}</a>
    @endcomponent

    <section class="section-blog bg-white">
        <div class="container">

            {!! Breadcrumbs::renderIfExists('mediapress.category') !!}

            <div class="blog">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="blog-content events-content">
                            <article class="post">
                                <div class="entry-header no-padding align-center">
                                    <h2 class="entry-title">{{ $media->title }}<br/><small>{{ $media->brand }} / {{ $media->created_at->formatLocalized('%d %B %Y') }}</small></h2>
                                </div>
                                <div class="img align-center">
                                    <img src="{{ $media->present()->firstImage(800,null,'resize',80) }}" alt="{{ $media->title }}">
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection