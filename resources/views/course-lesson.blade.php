@extends('layouts.app')

@section('title', $lesson->title . ' | ' . $course->title)

@push('css')

@endpush

@section('content')
    @if ($userBoughtCourse)
        <section id="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title pt-5">
                            <h1>{{ $lesson->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="thanks-content">

            <div class="container">
                {{-- if user has not bought the course we show the price with the buy now button pointing to the checkout route --}}
                <div class="row">
                    @if (!is_null($lesson->video))
                        <div class="col-md-8 offset-md-2">
                                <iframe src="{{ $lesson->video }}" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    @else
                        @if ($ext == 'pdf')
                        <object data="{{ asset('/uploads/course_files/' . $lesson->file) }}" type="application/pdf" width="100%" height="1200px">
                            <p>Sembrerebbe che tu non abbia un PDF reader per visualizzare il file <a href="assets/gravidanza-fit/pdf/valigia-parto.pdf">clicca qui per scaricarlo!</a></p>
                        </object>
                        @else
                            <img src="{{ asset('/uploads/course_files/' . $lesson->file) }}" alt="" class="img-fluid">
                        @endif

                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>{!! $lesson->description !!}</p>

                    </div>
                </div>
            @else
                
    @endif

    </div> <!-- end container -->
    </section>
@endsection

@push('js')
    @include('js-for-views.show-spinner-js')
@endpush
