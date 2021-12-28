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
                <div class="d-flex align-items-center">
                    <strike class="text-muted mr-3">
                        @if ($course->id == 1)
                            149
                        @elseif ($course->id == 2)
                            99
                        @elseif ($course->id == 3)
                            99
                        @elseif ($course->id == 4)
                            248
                        @endif
                    </strike>
                    <p>{{ $currency }}{{ App\Helpers\CurrencyHelper::getSetPriceFormat($course->price) }}
                    </p>
                </div>
            </div>
            <div class="course-buy-btn">
                {{-- checkout button --}}
                <a href="{{ route('checkout', $course->slug) }}" class="btn btn-warning"
                    onclick="showLoadSpinner();"><span class="spinner-border spinner-border-sm" id="spinnerOnBtn"
                        role="status" aria-hidden="true" style="display:none;"></span>
                    Acquista ora <i class="fas fa-cart-plus"></i></a>
            </div>

            {{-- <div>
                <p style="color:green;font-size:20px;"><strong>You have access to this course!</strong></p>
            </div> --}}
        </div>
    </div>
</div>
{{-- if the user bought the course we show the course content --}}
<div class="row">
    <div class="display-6 mb-5 text-center">Cosa troverai all'interno di {{ $course->title }}?</div>
    <ul class="features-list">
        @if ($course->id == 1)
            <li><i class="fas fa-check"></i> percorso adatto dalla 13esima alla 31esima sett</li>
            <li><i class="fas fa-check"></i> oltre 50 video</li>
            <li><i class="fas fa-check"></i> lezioni in circuito</li>
            <li><i class="fas fa-check"></i> lezioni flow guidate</li>
            <li><i class="fas fa-check"></i> programmi specifici </li>
            <li><i class="fas fa-check"></i> Focus pavimento pelvico</li>
            <li><i class="fas fa-check"></i> morning routine dettagliata</li>
            <li><i class="fas fa-check"></i> meditazione</li>
            <li><i class="fas fa-check"></i> ricette fit della biologa nutrizionista</li>
            <li><i class="fas fa-check"></i> contenuti extra dell’ostetrica</li>
            <li><i class="fas fa-check"></i> assistenza costante</li>
            <li><i class="fas fa-check"></i> accesso h24/7</li>
            <li><i class="fas fa-check"></i> aggiornamento costante del portale</li>
        @elseif($course->id==2)
            <li><i class="fas fa-check"></i>percorso adatto dalla 32esima alla 40esima sett</li>
            <li><i class="fas fa-check"></i>oltre 20 video </li>
            <li><i class="fas fa-check"></i>lezioni flow guidate</li>
            <li><i class="fas fa-check"></i>yoga per il parto</li>
            <li><i class="fas fa-check"></i>illustrazioni di posizioni utili per il travaglio e il parto
            </li>
            <li><i class="fas fa-check"></i>meditazione</li>
            <li><i class="fas fa-check"></i>programmi specifici </li>
            <li><i class="fas fa-check"></i>morning routine dettagliata</li>
            <li><i class="fas fa-check"></i>ricette fit della biologa nutrizionista</li>
            <li><i class="fas fa-check"></i>contenuti extra dell’ostetrica</li>
            <li><i class="fas fa-check"></i> assistenza costante</li>
            <li><i class="fas fa-check"></i> accesso h24/7</li>
            <li><i class="fas fa-check"></i> aggiornamento costante del portale</li>
        @elseif($course->id==3)
            <li><i class="fas fa-check"></i> percorso di 8 settimane</li>
            <li><i class="fas fa-check"></i> speciale diastasi</li>
            <li><i class="fas fa-check"></i> esercizi focus sul rinforzo del pavimento pelvico</li>
            <li><i class="fas fa-check"></i> video allattamento e postura</li>
            <li><i class="fas fa-check"></i> contenuti extra della biologa nutrizionista</li>
            <li><i class="fas fa-check"></i> assistenza costante</li>
            <li><i class="fas fa-check"></i> accesso h24/7</li>
            <li><i class="fas fa-check"></i> aggiornamento costante del portale</li>
        @elseif($course->id==4)
            <li><i class="fas fa-check"></i>un percorso adatto dalla 13esima alla 31esima sett</li>
            <li><i class="fas fa-check"></i>un percorso adatto dalla 32esima alla 40esima sett</li>
            <li><i class="fas fa-check"></i> oltre 70 video</li>
            <li><i class="fas fa-check"></i> lezioni in circuito</li>
            <li><i class="fas fa-check"></i> lezioni flow guidate</li>
            <li><i class="fas fa-check"></i> programmi specifici </li>
            <li><i class="fas fa-check"></i> Focus pavimento pelvico</li>
            <li><i class="fas fa-check"></i> morning routine dettagliata</li>
            <li><i class="fas fa-check"></i> meditazione</li>
            <li><i class="fas fa-check"></i>yoga per il parto</li>
            <li><i class="fas fa-check"></i>illustrazioni di posizioni utili per il travaglio e il parto
            </li>
            <li><i class="fas fa-check"></i> ricette fit della biologa nutrizionista</li>
            <li><i class="fas fa-check"></i> contenuti extra dell’ostetrica</li>
            <li><i class="fas fa-check"></i> assistenza costante</li>
            <li><i class="fas fa-check"></i> accesso h24/7</li>
            <li><i class="fas fa-check"></i> aggiornamento costante del portale</li>
        @endif
    </ul>
</div>
</div>
<div class="course-buy-btn text-center pb-5">
    {{-- checkout button --}}
    <a href="{{ route('checkout', $course->slug) }}" class="btn btn-warning" onclick="showLoadSpinner();"><span
            class="spinner-border spinner-border-sm" id="spinnerOnBtn" role="status" aria-hidden="true"
            style="display:none;"></span>
        Acquista ora <i class="fas fa-cart-plus"></i></a>
</div>
