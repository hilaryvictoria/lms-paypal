@extends('layouts.app')
@section('title', $course->title)
@push('css')
@endpush

@section('content')
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pt-5">
                        <h1>{{ $course->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            {{-- if user has not bought the course we show the price with the buy now button pointing to the checkout route --}}
            @if (!$userBoughtCourse && !$courseExpired)
                @include('buy')
                @include('layouts.includes.reviews')
                @include('layouts.includes.features')

            @elseif(($userBoughtCourse && !$courseExpired))
                @include('course-view')
            @else
                <div class="alert alert-warning text-center col-md-6 offset-md-3"> Il tuo accesso a {{ $course->title }} è
                    scaduto, acquistalo di nuovo!</div>
                @include('buy')

            @endif

        </div> <!-- end container -->
    </section>
@endsection

@push('js')
    @include('js-for-views.show-spinner-js')
@endpush
