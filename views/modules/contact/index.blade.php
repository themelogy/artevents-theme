@extends('layouts.master')

@section('content')

    @component('partials.components.banner', ['background'=>'bg-5'])
        <h1>{{ trans('themes::contact.title')}}</h1>
    @endcomponent

    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">

                    <div class="col-md-6 col-lg-5">

                        <div class="text">
                            <h2>{{ trans('themes::contact.description') }}</h2>
                            <ul>
                                <li><i class="icon hillter-icon-location"></i> {!! setting('theme::address') !!}</li>
                                <li><i class="icon hillter-icon-phone"></i> {{ setting('theme::phone') }}</li>
                                <li><i class="icon fa fa-envelope-o"></i> {!! Html::email(setting('theme::email')) !!}</li>
                            </ul>
                        </div>

                        <div class="map m-top-20" style="height: 250px;">
                            @gmap('250px', '16', 'images/marker.png')
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        @include('contact::form')
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection