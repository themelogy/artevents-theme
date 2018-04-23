@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ $page->title }}</h1>
    @endcomponent

    <section class="section-page">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('page') !!}
            <div class="page m-top-20 m-bot-30">
                {!! $page->body !!}

                @php $images = $page->present()->images(970,649,'fit',80) @endphp
                @if(count($images)>0)
                <div class="gallery-content">
                    <div class="row">
                        <div class="gallery-isotope col-4">

                            <div class="item-size"></div>

                            @foreach($images as $image)
                            <div class="item-isotope">
                                <div class="gallery_item">
                                    <a href="{!! $image !!}" class="mfp-image">
                                        <img src="{!! $image !!}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>

@stop
