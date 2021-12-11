<div class="row mb-5 d-flex align-items-center">
    <div class="display-6 mb-5 text-center">Ciao Mamma! Benvenuta all’interno di {{ $course->title }}!</div>
    <!-- row -->
    <div class="col-lg-6">
        <!-- col-lg-6 -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ $course->video }}"
                allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-lg-6">
        <div>
            {{-- <p>Prima di iniziare, ti consiglio di leggere tutto quello che ho riportato qui di seguito perché
            sono sicura che ti sarà molto utile per seguire e utilizzare al meglio tutto.<br>Ho creato questo
            percorso in modo tale che sia il più semplice e intuitivo possibile, ma sappi che se avrai
            necessità potrai sempre scrivere a <a href="mailto:info@virginiamaternitycoach.it">info@virginiamaternitycoach.it</a>. Il mio team ed io,
            cercheremo di risponderti nel più breve tempo possibile.</p>
            <p>Per ogni mese di gestazione, ho creato una <strong>morning routine</strong> apposita, ossia
            un planning giornaliero per i tuoi allenamenti
            quotidiani.<br>
            Ovviamente la morning routing è solo indicativa, quindi puoi decidere di seguirla alla
            lettera, altrimenti deciderai tu come impostarla, giorno dopo giorno, in base a come ti senti.</p>
            <p><strong>ASCOLTA SEMPRE IL TUO CORPO e
            CONSULTA IL TUO MEDICO CURANTE PRIMA DI INIZIARE QUALSIASI TIPO DI ALLENAMENTO!</strong></p>
            <p>Buon allenamento! 😊</p> --}}
            {!! $course->intro !!}
        </div>
    </div> <!-- end col-lg-6 -->
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

<div id="accordion">
    <div class="card mb-4">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn collapse-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            👉 Parti da qui: Respiro consapevole
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <ul class="video-list">
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica supina</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica quadrupedia</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione diaframmatica seduta</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica supina</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica quadrupedia</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione toracica seduta</a></li>
              <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Respirazione yogica completa</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingTen">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                ☀️ Morning Routine
            </button>
          </h5>
        </div>
        <div id="collapseTen" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Scheda: Morning routine mese 4</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Scheda: Morning routine mese 5</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Scheda: Morning routine mese 6</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Scheda: Morning routine mese 7</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
    {{-- card --}}
    <div class="card mb-4">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Circuiti tonificazione con pesetti max 1 kg
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus braccia e upper body 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus braccia e upper body 2</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus braccia e upper body 3</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus braccia e upper body 4 </a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus gambe e glutei 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus gambe e glutei 2</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus gambe e glutei 3</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus gambe e glutei 4</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Total body 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Total body 2</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Total body 3</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Total body 4</a></li>
            </ul>
        </div>
      </div>
    </div>
    {{-- end card --}}
    <div class="card mb-4"> <!-- card -->
      <div class="card-header" id="headingThree">
        <h5 class="mb-0">
          <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Circuiti Pilates
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
            <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates corpo libero 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates corpo libero 2</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 1 fitball</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 2 softball/cuscino</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 3 bastone</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 4 fitball</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 5 softball/cuscino</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates props 6 bastone </a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Circuiti pilates barre 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Circuiti pilates barre 2</a></li>
            </ul>
        </div>
      </div>
    </div> <!-- end card -->
    <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Circuiti Misti
            </button>
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Tono + Pilates</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates + Tono</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Barre + Pilates</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pilates + Barre</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingFive">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Automassaggio
            </button>
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Automassaggio cervicale softball o cuscino</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingEleven">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                Lezioni flow
            </button>
          </h5>
        </div>
        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                   <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow misto 1 (tono+pilates)</a></li>
                   <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow misto 2 (barre+pilates)</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di pilates a corpo libero 1</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di pilates a corpo libero 2</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di pilates con props 1 softball</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di pilates con props 2 bastone</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di pilates props 3 fitball</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di barre 1</a></li>
                  <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lezione flow di barre 2</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingSix">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Meditazione
            </button>
          </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                   <li><a href="" target="_blank"><i class="fas fa-volume-up"></i> Audio: Meditazione e rilassamento 1 (tono+pilates)</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingSeven">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                Pavimento pelvico
            </button>
          </h5>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Focus pavimento pelvico in tonificazione</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingEight">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Mobilità
            </button>
          </h5>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Mobilità e stretching corpo libero 1</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Mobilità e stretching corpo libero 2</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->
      <div class="card mb-4"> <!-- card -->
        <div class="card-header" id="headingNine">
          <h5 class="mb-0">
            <button class="btn collapse-header collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                Contenuti Speciali
            </button>
          </h5>
        </div>
        <div id="collapseNine" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
              <ul class="video-list">
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Articolo: Nutrizionista</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Articolo: Ostetrica</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Pubalgia</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Lombosciatalgia</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Cervicalgia</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Articolo: Stitichezza</a></li>
                <li><a href="" target="_blank"><i class="fas fa-file-pdf"></i> Articolo: Postura</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Automassaggio</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Circolazione</a></li>
                <li><a href="" target="_blank"><i class="fas fa-video"></i> Video: Polsi dolenti</a></li>
              </ul>
          </div>
        </div>
      </div> <!-- end card -->

  </div> <!-- end accordion -->

</div>

</div> <!-- end row course contents -->