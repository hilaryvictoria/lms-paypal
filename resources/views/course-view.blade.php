<div class="row">
    <div class="display-6 mb-5 text-center">Ciao Mamma! Benvenuta all’interno di {{ $course->title }}!</div>
</div>
<div class="alert alert-primary text-center col-md-6 offset-md-3"> Il tuo accesso a {{ $course->title }} scadrà tra
    {{ $lastingDays }}
    giorni!</div>
<div class="row pt-5">
    <!-- row -->
    <div class="col-md-8 offset-md-2">
        <!-- col-lg-12 -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $course->video }}" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-12">
        <div>
            {!! $course->intro !!}
        </div>
    </div> <!-- end col-lg-12 -->
</div> <!-- end row -->
@if ($course->warning)
    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            {{ $course->warning }}
        </div>
    </div>
@endif
<div class="row my-5">
    <!-- row course contents -->
    <div class="col-md-12">
        <h3 class="mb-4">Contenuti di {{ $course->title }}</h3>
        {{-- Dinamically rendering categories --}}
        <div id="accordion">
            @foreach ($categories as $category)
                @if ($category->id == 50)
                    <h3 class="mb-4">Parto Consapevole</h3>
                @endif
                <div class="card mb-4">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn collapse-header" data-toggle="collapse"
                                data-target="#collapse{{ $category->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $category->id }}">
                                {{ $category->title }}
                            </button>
                        </h5>
                    </div>
                    <div id="collapse{{ $category->id }}" class="collapse {{ $loop->first ? 'show' : '' }}"
                        aria-labelledby="heading{{ $category->id }}" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="video-list">
                                @foreach ($lessons as $lesson)
                                    @if ($lesson->category_id == $category->id)
                                        <li><a href="lessons/{{ $lesson->id }}">
                                                @if (is_null($lesson->video))
                                                    <i class="fas fa-file-pdf"></i> Articolo:
                                                @else
                                                    <i class="fas fa-video"></i> Video:
                                                @endif
                                                {{ $lesson->title }}
                                            </a></li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div> <!-- end row course contents -->
