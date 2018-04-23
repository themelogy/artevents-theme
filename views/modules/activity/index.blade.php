@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ trans('themes::activity.title.activities') }}</h1>
    @endcomponent

    <section class="section-room bg-white no-padding">
        <div class="container">
            {!! Breadcrumbs::renderIfExists('activity.index') !!}
            <div class="room-wrap-5 m-top-20 m-bot-40">
                <div class="row">
                    @foreach($activities as $activity)
                        @include('activity::_activity')
                    @endforeach
                </div>
                {!! $activities->render('partials.components.pagination') !!}
            </div>

        </div>
    </section>

@endsection