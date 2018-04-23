@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ $category->title }}</h1>
    @endcomponent

    <section class="section-room bg-white">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('activity.category') !!}
            <div class="room-wrap-5">
                <div class="row">
                    @foreach($activities as $activity)
                    <div class="col-xs-6">
                        <div class="room_item-5" data-background='{{ $activity->present()->coverImage(570,330,'fit',80) }}'>

                            <div class="img">
                                <a href="{{ $activity->url }}"><img src="{{ $activity->present()->coverImage(570,330,'fit',80) }}" alt=""></a>
                            </div>

                            <div class="room_item-forward">
                                <h2><a href="{{ $activity->url }}">{{ $activity->title }}</a></h2>
                                <span class="price">{{ $activity->category->title }}</span>
                            </div>

                            <div class="count-date" data-end="{{ $activity->events()->first()->event_at->format('Y/m/d H:i:s') }}"></div>

                            <div class="room_item-back">
                                <h3>{{ $activity->title }}</h3>
                                <span class="price">{{ $activity->category->title }}</span>
                                <p>{{ str_sentence(Str::words(strip_tags($activity->description), 20), 16) }}</p>
                                <a href="{{ $activity->url }}" class="awe-btn awe-btn-13">{{ trans('themes::activity.buttons.details') }}</a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                {!! $activities->render('partials.components.pagination') !!}
            </div>

        </div>
    </section>

@endsection