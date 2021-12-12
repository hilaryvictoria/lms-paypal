@extends('layouts.app')
@section('title', 'Course')
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
            @if (!$userBoughtCourse)
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <div class="course-img">
                            <img src="{{ asset('/uploads/images/' . $course->image) }}" class="img-fluid mr-3" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-course-content">
                            <div class="course-desc">
                                <p>{{ $course->description }}</p>
                            </div>
                            <div class="course-price">
                                {{-- I return the variable currency I formatted in the FrontendCourseController and I am using the CurrencyHelper's method getSetPriceFormat to format the course's price --}}
                                <p>{{ $currency }}{{ App\Helpers\CurrencyHelper::getSetPriceFormat($course->price) }}
                                </p>
                            </div>
                            <div class="course-buy-btn">
                                {{-- checkout button --}}
                                <a href="{{ route('checkout', $course->slug) }}" class="btn btn-warning"
                                    onclick="showLoadSpinner();"><span class="spinner-border spinner-border-sm"
                                        id="spinnerOnBtn" role="status" aria-hidden="true" style="display:none;"></span>
                                    Acquista ora <i class="fas fa-cart-plus"></i></a>
                            </div>

                            {{-- <div>
                                <p style="color:green;font-size:20px;"><strong>You have access to this course!</strong></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- if the user bought the course we show the course content --}}
            @else
                @include('course-view')
            @endif

        </div> <!-- end container -->
    </section>
@endsection

@push('js')
    @include('js-for-views.show-spinner-js')
@endpush
