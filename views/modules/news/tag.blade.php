@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ trans('themes::news.tag', ['tag'=>$tag->name]) }}</h1>
    @endcomponent

    <section class="section-blog bg-white">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('news.tag') !!}
            <div class="blog">
                <div class="row">
                    <div class="col-md-8 col-md-push-4">
                        <div class="blog-content">

                            @foreach($posts as $post)
                                @include('news::partials._post')
                            @endforeach

                            {!! $posts->render('partials.components.pagination') !!}
                        </div>
                    </div>

                    @include('news::partials.sidebar')

                </div>
            </div>
        </div>
    </section>

@endsection