@extends('layouts.master', ['body_class'=>'home'])

@section('content')
    @themeSlide('anasayfa')

    <section class="section-event-list p-top-20 p-bot-20">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @eventsCalendar()
                </div>
                <div class="col-md-8">
                    <!-- ITEM -->
                    <div class="col-md-12 md-padding-0">
                        @activityLatest(12)
                    </div>
                    <!-- END / ITEM -->
                </div>
            </div>
        </div>
    </section>

    <!-- HOME NEW -->
    <section class="section-event-news">
        <div class="container">
            @newsLatestPosts(4)
        </div>
    </section>
    <!-- END / HOME NEW -->
@endsection