@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ trans('mediapress::mediapress.title.mediapress') }}</h1>
    @endcomponent

    <section class="section-activiti bg-white no-padding">
        <div class="container">

            {!! Breadcrumbs::renderIfExists('mediapress.category') !!}

            <div class="activiti m-top-20 m-bot-50">
                <div class="gallery-cat activiti-cat text-center">
                    <ul class="list-inline">
                        <li class="{{ Request::route()->getName() == 'mediapress.media.index' ? 'active' : '' }}"><a href="{{ route('mediapress.media.index') }}">{{ trans('themes::theme.buttons.all') }}</a></li>
                        @foreach($mediaTypes as $key => $mediaType)
                        <li class="{{ last(Request::segments()) == $key ? 'active' : '' }}"><a href="{{ route('mediapress.media.category', $key) }}">{{ $mediaType }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="activiti_content">

                    <div class="row">

                        @foreach($medias as $media)
                        <div class="col-md-4 col-xs-6">
                            <div class="activiti_item">
                                <div class="img align-center">
                                    <a href="{{ $media->url }}"><img src="{{ $media->present()->firstImage(null,230,'resize',80) }}" alt="{{ $media->title }}"></a>
                                </div>
                                <div class="text">
                                    <h2><a href="{{ $media->url }}">{{ $media->title }}<br/><small>{{ $media->brand }} / {{ $media->created_at->formatLocalized('%d %B %Y') }}</small></a></h2>
                                    <a href="{{ $media->url }}" class="view-more">{{ trans('global.buttons.read more') }} <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {!! $medias->render('partials.components.pagination') !!}

                </div>

            </div>

        </div>
    </section>

@endsection