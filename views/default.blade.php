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
            </div>
        </div>
    </section>

@stop
