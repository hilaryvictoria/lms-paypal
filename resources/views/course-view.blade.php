<div class="row">
    <div class="display-6 mb-5 text-center">Ciao Mamma! Benvenuta all’interno di {{ $course->title }}!</div>
</div>
<div class="row">
    <!-- row -->
    <div class="col-md-8 offset-md-2">
        <!-- col-lg-12 -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $course->video }}"
                allowfullscreen></iframe>
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
@if($course->warning)
<div class="col-md-12">
    <div class="alert alert-warning" role="alert">
       {{ $course->warning }}
      </div>
</div>
@endif
<div class="row my-5"><!-- row course contents -->
<div class="col-md-12">
<h3 class="mb-4">Contenuti di {{ $course->title }}</h3>


{{-- Dinamically rendering categories --}}
<div id="accordion">

  @foreach($categories as $category)
  <div class="card mb-4">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn collapse-header" data-toggle="collapse" data-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
          {{ $category->title }}
        </button>
      </h5>
    </div>

    <div id="collapse{{ $category->id }}" class="collapse {{  $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $category->id }}" data-parent="#accordion">
      <div class="card-body">
        <ul class="video-list">
          @foreach($lessons as $lesson)
            @if($lesson->category_id == $category->id )
            <li><a href="lessons/{{ $lesson->id }}" target="_blank">
              @if(is_null($lesson->video))
                <i class="fas fa-file-pdf"></i> Scheda:
              @else
                <i class="fas fa-video"></i> Video:
              @endif
               {{ $lesson->title }}</a></li>
            @endif

          @endforeach
            {{-- <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica supina</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica quadrupedia</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica seduta</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica supina</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica quadrupedia</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica seduta</a></li>
            <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione yogica completa</a></li> --}}
        </ul>
      </div>
    </div>
  </div>
  @endforeach
</div>



</div>

</div> <!-- end row course contents -->