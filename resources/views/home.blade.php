@extends('layouts.app')
@section('title', 'Allenamento sicuro in gravidanza')
@section('content')
    <!-- Cover -->
    <section class="cover">
        <div class="cover__text">
            <h1>L'allenamento sicuro<br>in gravidanza</h1>
            <h3>Un percorso d'introspezione e connessione con il tuo bambino</h3>
            <p>Virginia Maternity Coach ti prepara all’incontro più bello e importante della tua vita.</p>
            <a href="{{ route('courses.index') }}" class="cta-btn">Scopri i corsi</a>
        </div>
    </section>
    <!-- /End cover -->
    <!-- Section video about -->
    <section class="video py-5 pink-gradient-bg">
        <div class="row d-flex align-items-center page-container">

            <div class="col-lg-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/657038127" frameborder="0"
                        allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            </div>
            <!-- Presentazione Virginia -->
            <div class="col-lg-6 m-top-sm">
                <div class="glass-container">
                    <h2>Mi Presento</h2>
                    <h3>Virginia Flaborea, fondatrice di Virginia Maternity Coach</h3>
                    <p>
                        Amo prendermi cura delle persone e cercare di educare le donne che incontro - mamme e non - al
                        <strong>benessere e alla prevenzione</strong>.
                        Per questo ho deciso di portare lo sport direttamente a casa loro, aiutandole a ritrovare il
                        benessere psicofisico anche durante la gravidanza e la forma fisica nel post parto.
                    </p>
                    <p>
                        Se sei una donna, una futura mamma o una neo-mamma, sono certa che hai sentito anche tu il
                        bisogno di essere motivata, guidata e seguita in maniera scrupolosa e attenta. E' proprio per
                        questo che ho realizzato per te un percorso strutturato, progressivo, completo e sicuro. Sono
                        certa che assieme faremo grandi cose!</p>

                    <p><em>Ti aspetto per iniziare il programma!</em> ❤️</p>
                    <a href="{{ route('courses.index') }}" class="cta-btn">Inizia qui</a>
                </div>
            </div>
            <!-- /End Presentazione Virginia -->
        </div>
    </section>
    <!-- /End Section video about -->
    <!-- Section pavimento pelvico about -->
    <section class="pelvico py-5">
        <div class="row d-flex align-items-center page-container">
            <div class="col-lg-6">
                <div class="glass-container">
                    <h2>Pavimento Pelvico</h2>
                    <h3>Il pavimento pelvico, questo sconosciuto</h3>
                    <p>Molte di noi iniziano a sentirne parlare solo all’inizio della gravidanza. Molti lo considerano
                        ancora un argomento tabù e gli studi a riguardo sono molto recenti.</p>
                    <p>Il pavimento pelvico è un intreccio di muscoli a forma di amaca alla base della pelvi (cioè il
                        bacino), che si estende dal pube al coccige e lateralmente ai due ischi (le parti dell'anca che
                        poggiano sulla sedia quando stiamo sedute). La sua funzione è quella di sostenere gli organi
                        interni.</p>
                    <p>E' parte del core (la muscolatura addominale): pensa a quante sollecitazioni lo sottoponiamo ogni
                        giorno! Soprattutto quando corriamo, solleviamo dei pesi o saltiamo. </p>
                    <p>Perché non se ne sente mai parlare?</p>
                    <p>Perché a differenza di altri muscoli molto esposti - come il bicipite - il pavimento pelvico,
                        trovandosi in una zona intima, non è visibile e facilmente percepibile. Questo ne comporta una
                        difficoltà di attivazione: è quasi impossibile farlo nel modo corretto!</p>
                    <p>Questo non significa però che si tratti di un muscolo meno importante degli altri. Infatti anche
                        la cura del pavimento pelvico contribuisce alla definizione della forma fisica con conseguente
                        esaltazione dell'aspetto estetico.</p>
                    <p>Per noi donne è di fondamentale importanza conoscerlo e lavorarlo con costanza. E questo non solo
                        ai fini estetici, ma anche dal punto di vista funzionale in quanto un corretto allenamento può
                        prevenire o risolvere problematiche come l’incontinenza urinaria da sforzo.</p>


                    {{-- <a href="#corsi" class="cta-btn">Inizia qui</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/frontend/images/pavimento-pelvico.png') }}" alt="Pavimento Pelvico"
                    class="img-fluid p-5 left-parallax">
            </div>
        </div>
    </section>
    <!-- /End Section pavimento pelvico about -->
    <!-- Section diastasi retto about -->
    <section class="pelvico blue-gradient-bg py-5">
        <div class="row d-flex align-items-center page-container">
            <div class="col-lg-6">
                <img src="{{ asset('assets/frontend/images/diastasi-virginia.png') }}" alt="diastasi retto"
                    class="img-fluid p-5 right-parallax">
            </div>
            <div class="col-lg-6">
                <div class="glass-container">
                    <h2>Cos’è la diastasi addominale?</h2>
                    <h3>La diastasi dei muscoli retti dell'addome</h3>
                    <p>la diastasi dei retti è una condizione che può insorgere in seguito alla gravidanza. All'inizio è
                        fisiologica, ma con il trascorrere del tempo può diventare patologica.</p>
                    <p>Per me si tratta di un argomento particolarmente importante e che mi tocca da vicino. Io stessa
                        infatti ne soffro e per questo ho deciso di fare informazione per aiutare più donne possibile a
                        prevenirlo.</p>
                    <p>Io per prima non mi accettavo, mi sentivo in un corpo che non era più il mio, evitavo di mettermi in
                        costume per paura del giudizio delle persone ma soprattutto avevo paura di non piacere più a mio
                        marito.</p>
                    <p>Per questo ho creato un protocollo di allenamento mirato, testato su di me!</p>
                    <p>Non importa che tu abbia partorito da due mesi o da dieci anni. Non è mai troppo tardi per iniziare a
                        prenderti cura di te stessa e di tornare a sorridere proprio come è successo a me!</p>
                    {{-- <p>Allenarsi è importante. E lo si può fare anche in gravidanza. Ma come molte altre cose, anche
                        l'attività fisica va adattata ad un momento così delicato.</p> --}}
                    <p><strong>Posso tornare ad allenarmi nel posto parto anche in presenza di diastasi?</strong></p>
                    <p>La risposta è si, ma con delle accortezze e soprattutto con un percorso specifico e sicuro perche
                        lavorare in sicurezza è fondamentale per non creare più danni che altro.
                        Ho messo a punto io stessa un percorso appositamente per tutte le mamme nel post parto che hanno
                        voglia di rimettersi in forma ma non sanno da dove partire e soprattutto a chi affidarsi. Che tu
                        abbia una diastasi (e poi ti mostrerò come autodiagnosticarla) oppure no, ti meriti di recuperare la
                        tua femminilità, di riscoprire il tuo corpo, di ascoltarti, di connetterti, per il tuo benessere
                        psico-fisico, dove e quando vuoi.</p>
                    <p></p>
                    <a href="{{ URL::to('/courses/3') }}" class="cta-btn"
                        style="margin:0 auto;max-width:350px;display:block">Scopri Fast 28' Post Parto</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Section diastasi retto about -->
    <!-- Trainers e info -->
    <section class="trainers py-4 pink-gradient-bg">
        <div class="page-container">

            <div class="row">
                <div class="col-md-12">
                    <div class="glass-container">
                        <h2 class="text-center">Perche ho voluto creare Virginia Maternity Coach?</h2>
                        <div class="py-2">
                            {{-- <h3>Lorem ipsum dolor sit amet consectetur.</h3> --}}
                            <p>Ho deciso di creare Virginia Maternity Coach per permettere a tutte le donne - ed in
                                particolar modo
                                alle mamme - di allenarsi in libertà e sicurezza.</p>
                            <p>Ho racchiuso all’interno di questo portale tutte le conoscenze e le competenze che ho
                                acquisito in 6 anni di studi in un lavoro di continua formazione.</p>
                            <p>Perchè Virginia Maternity Coach è online?</p>
                            <p>Perchè sia accessibile da tutte, ovunque e in qualsiasi momento.</p>
                            <p>Perchè possa usufruirne anche chi non ha sufficiente tempo libero per seguire i corsi che
                                tengo in palestra e per chi si trova in un momento difficile e magari non ha la
                                possibilità di permettersi una personal trainer.</p>
                            <p>Per le mamme che stanno affrontando la seconda o magari terza gravidanza e non sanno a
                                chi affidare gli altri bimbi.</p>
                            <p>Per dare uno stimolo in più a tutte le donne e a tutte le mamme.</p>
                            <p>Perché, non nascondiamocelo, con la gravidanza non abbiamo mica tanta voglia di
                                prepararci la borsa e prendere la macchina per recarci in palestra. E' un periodo
                                altalenante. Un giorno abbiamo energia da vendere, quello successivo vorremmo stare
                                tutto il giorno nel letto.</p>
                            <p>E' una fase straordinaria della vita, ma gli ormoni ci giocano brutti scherzi.</p>
                            <p>Ho scelto di creare questo portale online per permetterti di allenarti tranquillamente e
                                di svolgere gli allenamenti in qualsiasi momento tu voglia, secondo i tuoi bisogni.</p>

                            {{-- <p>Come faccio a sapere che Virginia Maternity Coach è quello giusto?</p>
                            <p>In rete troverai diversi esercizi per mantenerti in forma durante la gravidanza e nel
                                post parto: anche gratuiti!</p>
                            <p>Ti accorgerai però che spesso mancano di linearità, di un filo logico. Altre volte sono
                                carenti delle competenze di base. E non sono quasi mai completi!</p>
                            <p>Cosa rischi? Di perdere il tuo tempo. Di non imparare. Di seguire qualche esercizio e poi
                                lasciar perdere. Chiaramente non è questo ciò che stai cercando!</p> --}}
                            {{-- <p>Fatti guidare dal tuo intuito e dai tuoi sentimenti. Ti invito a seguire gratuitamente
                                alcuni dei miei video esercizi starter. Li ho realizzati per permetterti di valutare la
                                mia competenza e la qualità dei miei corsi prima di spendere anche un solo centesimo.
                            </p>
                            <p>Se poi ti piaceranno, se avrai capito che fanno per te e sono proprio ciò che stavi
                                cercando, potrai acquistare i corsi che ti interessano direttamente dal mio portale
                                Virginia Maternity Coach, ed averli sempre con te.</p> --}}



                        </div>

                        <div class="py-2">
                            <h3>Cosa mi offre Virginia Maternity Coach?</h3>
                            <p>Quello che troverai in Virginia Maternity Coach è un percorso strutturato che ti accompagna
                                durante
                                l'intera gravidanza, dal momento in cui scopri di essere incinta, al parto, fino al
                                post parto.</p>
                            <p>Il mio obiettivo è prepararti fisicamente e psicologicamente in maniera serena e
                                consapevole all’incontro più bello e importante della tua vita.</p>
                            <p>Le lezioni che ho preparato per te e che troverai nel portale sono assolutamente sicure e
                                testate prima di tutto su di me. Sono state ideate ponendo massima attenzione alla
                                corretta esecuzione dei movimenti.</p>
                            <p>Fare movimento in gravidanza è fondamentale per il tuo benessere e quello del tuo
                                bambino. Stimola le endorfine e gli ormoni del buon umore: ti sentirai più serena e
                                meglio con te stessa!</p>
                            <p>Gli esercizi che troverai all'interno di Virginia Maternity Coach sono sicuri e completi, ma
                                non
                                rigidi. Infatti sono concepiti per essere flessibili e adattarsi ai tuoi ritmi.</p>
                            <p>Non siamo alla ricerca di nessuna prestazione fisica! Le mie lezioni sono improntate al
                                benessere generale e alla prevenzione dai fastidi comuni in gravidanza come sciatalgia,
                                pubalgia, lombalgie, costipazione e nausea.</p>
                            <p>Se un giorno ti sentirai stanca potrai concederti una camminata o dedicati allo
                                stretching e alla mobilizzazione. E appena te la sentirai potrai riprendere
                                l'allenamento da dove lo avevi lasciato.</p>
                            <p>Svolgere gli esercizi corretti ed essere costante ti aiuterà a fronteggiare una
                                gravidanza in salute e una ripresa nel post parto più veloce.</p>
                            <p>La costanza premia: allenati con me giorno dopo giorno per sentirti subito bene! Ti
                                basteranno pochi minuti!</p>


                            <p>

                            </p>
                        </div>
                        <div class="text-center">
                            <span class="display-4">La gravidanza non e’ una malattia, quindi sì all’ attivita’
                                motoria </span>
                        </div>
                        <div class="py-2">
                            <h3>Cosa troverai all'interno di Virginia Maternity Coach?</h3>
                            <p>Lezioni a corpo libero. Lezioni con i props: piccoli attrezzi facilmente reperibili.
                                Lezioni dedicate al rinforzo del pavimento pelvico: andremo ad individuare, conoscere e
                                lavorare correttamente questo muscolo sconosciuto in preparazione al parto e per una
                                ripresa più rapida nel post.</p>
                            Utilizzeremo tecniche di respirazione che ci consentiranno di riconoscere il muscolo
                            trasverso dell’addome, il muscolo più profondo della cavità addominale, che sostiene i
                            nostri organi e la nostra colonna vertebrale.</p>
                            <p>Nella sezione Parto Consapevole troverai lezioni maggiormente incentrate sulla ricerca
                                del relax: dalla mobilizzazione allo scarico della colonna, dallo yoga per il parto alla
                                respirazione, fino alla meditazione.</p>
                            <p>Sperimenteremo insieme diverse posizioni che potranno esserti utili per il travaglio e il
                                parto per far si che quel giorno tu ti senta libera di scegliere consapevolmente per te
                                stessa.</p>
                            <p>Non esistono posizioni giuste o sbagliate. Nessuno dovrà dirti come partorire: dovrai
                                deciderlo tu stessa, in base a come ti sentirai meglio in quel momento.</p>
                            <h4>Contenuti Speciali</h4>
                            <p>Nella sezione contenuti speciali troverai gli articoli delle due professioniste che
                                collaborano con me a questo progetto: l’ostetrica Federica Sari e la dottoressa Chiara
                                Savarino, biologa nutrizionista, che si occupa di alimentazione in gravidanza e
                                allattamento.</p>
                            <p>Il nostro è un team tutto al femminile pensato per supportare la mamma a 360 gradi.</p>
                            <p>Sempre all’interno della sezione contenuti speciali troverai tanti altri argomenti
                                interessanti e consigli utili su come contrastare i fastidi più comuni come cervicalgia,
                                pubalgia, reflusso gastrico, ritenzione idrica e stitichezza.</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-5 mx-auto-sm card-group">
                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/images/virginia.jpg') }}" class="img-fluid" alt="">
                            <div class="member-content p-4">
                                <h4>Virginia Flaborea</h4>
                                <i>Chinesiologa, Personal Fitness Coach</i>
                                <p class="pt-2">Virginia Flaborea, chinesiologa, e personal fitness coach
                                    certificata presso la Power Pilates di Verona e la Postural Pilates di Torino nel
                                    2015. Laureanda in scienze motorie.</p>
                                <p>
                                    Diventare <strong>mamma di Ginevra e Beatrice</strong>, mi ha avvicinata ancora al
                                    mondo delle mamme, tutto femminile, spingendomi a specializzarmi nella
                                    <strong>ginnastica in gravidanza e post parto</strong>, per poter essere un supporto
                                    a quante più mamme possibile.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch m-top-sm">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/images/federica.jpg') }}" class="img-fluid" alt="">
                            <div class="member-content p-4">
                                <h4>Federica Sari</h4>
                                <i>Ostetrica</i>
                                <p class="pt-2">
                                    Laureata in ostetricia a Roma, mi destreggio tra visite domiciliari, formazione e
                                    progetti futuri.
                                    Amo viaggiare, in ogni modo: attraverso nuovi luoghi, persone, emozioni e avventure.
                                    Il viaggio
                                    che amo ha delle fondamenta sempre uguali che reggono tutto il percorso e riescono a
                                    guidarmi
                                    anche nei momenti più difficoltosi: la consapevolezza è ciò che regge i miei
                                    progetti.
                                    Ed è proprio da qui che vorrei partire: conoscere, sapere ed essere consapevoli. Tre
                                    ingredienti
                                    fondamentali che nella mia – e vostra – valigia non possono mai mancare.
                                    Diamoci la mano e partiamo: la vita ci aspetta!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch m-top-sm">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/images/chiara.jpg') }}" class="img-fluid" alt="">
                            <div class="member-content p-4">
                                <h4>Chiara Savarino</h4>
                                <i>Biologa Nutrizionista</i>
                                <p class="pt-2">
                                    Mi occupo di nutrizione e di educazione al cibo sano.</p>
                                <p>Elaboro percorsi nutrizionali mirati per le diverse esigenze: dimagrimento,
                                    miglioramento della composizione corporea, aumento della massa muscolare,
                                    miglioramento del quadro clinico per sportivi e non, bambini, adolescenti, anziani e
                                    donne in gravidanza/allattamento.</p>
                                <p>Aiuto chi si affida a me a raggiungere i proprio obiettivi di salute, benessere e
                                    organizzazione dei pasti senza inutili restrizioni e privazioni. Mangiare è bello,
                                    farlo bene ancora di più!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Trainers e info Section -->
    <!-- cta section -->
    <section class="cta">
        <div class="cta-text text-center">
            <h2>Inizia ad allenarti ora</h2>
            <p>È semplicissimo<br>
                Iscriviti<br>
                Accedi dalla tua mail</p>
            <i class="fas fa-chevron-down"></i>
            </p>
            <a href="{{ route('courses.index') }}" class="cta-btn mx-auto">Inzia ad allenarti </a>
        </div>
    </section>
    <!-- /end cta section -->
    <!-- Section corso #1 about -->
    <section class="corso py-5" id="corsi">
        <div class="row d-flex align-items-center page-container column-reverse-md">
            <div class="col-lg-8">

                <h2>Gravidanza Fit</h2>
                <h3>Il tuo percorso di allenamento strutturato e sicuro che ti accompagna per tutta la gravidanza fino
                    al post parto.</h3>
                <p class="pt-3"> Allenati dove e quando vuoi. </p>
                <p>Un programma che ti guiderà al raggiungimento della consapevolezza corporea e al benessere
                    psicofisico. Preparati al meglio, per l’appuntamento più bello e importante della tua vita. </p>
                <h4>Cosa troverai all'interno del corso?</h4>
                <p>All’interno di Gravidanza Fit ci sono diverse tipologie di allenamento: i circuiti, lezioni fast di
                    pochi minuti adatte alle mamme che hanno poco tempo ma che non vogliono rinunciare a stare bene, le
                    lezioni flow guidate da 30’ o 60’ di pilates, barre, tonificazione, stretching, mobilizzazione,
                    meditazione.</p>
                <h4>Perché è importante l'attività fisica in gravidanza?</h4>
                <p>
                    Come dimostrato dai molti studi scientifici condotti sull'argomento, fare attività fisica con
                    costanza durante il periodo gestazionale, ha moltissimi benefici:
                <ul>
                    <li>miglioramento della respirazione e della percezione del corpo</li>
                    <li>riduzione dei disturbi fisici come il mal di schiena (molto comune durante la gravidanza)</li>
                    <li>miglioramento della circolazione sanguigna e respiratoria</li>
                    <li>riduzione del rischio di diabete gestazionale</li>
                    <li>aumento del tono muscolare con miglioramento del pavimento pelvico e del trasverso dell’addome,
                    <li>miglioramento della gestazione, del travaglio e parto</li>
                    <li>regolazione dei cicli sonno-veglia</li>
                    <li>miglioramento generale dello stato di salute</li>
                    <li>diminuzione dei tempi del parto e dei conseguenti rischi di interventi (cesareo o episiotomia)
                    </li>
                    <li>velocizzazione del recupero post parto</li>
                </ul>
                </p>

                <a href="{{ URL::to('/courses/1') }}" class="cta-btn">Inizia qui</a>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('assets/frontend/images/grav_fit_mockup.png') }}" alt="Gravidanza Fit"
                    class="img-fluid p-5 left-parallax image-max-width">
            </div>
        </div>
    </section>
    <!-- /End Section corso #1 about -->
    <!-- Section corso #2 about -->
    <section class="corso py-5 white-bg">
        <div class="row d-flex align-items-center page-container">
            <div class="col-lg-4">
                <img src="{{ asset('assets/frontend/images/parto_consapevole_mockup.png') }}" alt="Parto Consapevole"
                    class="img-fluid p-5 right-parallax image-max-width">
            </div>
            <div class="col-lg-8">
                <h2>Parto Consapevole</h2>
                <h3>Il momento di “lasciare andare” di “sentire“ il tuo pavimento pelvico, di creare spazio, di accogliere e
                    di prepararsi alla diade</h3>
                <p>E’ arrivato il momento di “lasciare andare” di “sentire“ il tuo pavimento pelvico, di creare spazio, di
                    accogliere e di prepararsi alla diade.</p>
                <h4>Cosa troverai all'interno del corso?</h4>
                <p class="pt-3">Oltre 20 video dedicati alla mamma nell’ottavo e nono mese, gli ultimi due mesi di
                    attesa prima di tenere il suo piccolo tra le braccia.</p>

                <p>Troverai lezioni dedicate al respiro consapevole, lezioni flow di yoga per il parto, illustrazioni di
                    posizioni utili per il travaglio e il parto e tanti contenuti extra
                    preparati appositamente dall’ostetrica Federica Sari.</p>
                <a href="{{ URL::to('/courses/2') }}" class="cta-btn">Inizia qui</a>
            </div>

        </div>
    </section>
    <!-- /End Section corso #2 about -->
    <!-- Section corso #3 about -->
    <section class="corso py-5">
        <div class="row d-flex align-items-center page-container column-reverse-md">
            <div class="col-lg-8">
                <h2>Fast 28' Post Parto</h2>
                <h3>Il tuo programma di allenamento completo e sicuro dedicato al post parto.</h3>
                <p class="pt-3">Prenditi cura di te e del tuo <strong>pavimento pelvico</strong>: questo
                    importantissimo fascio di muscoli, fondamentale per la salute delle mamme. Impara a sentirlo,
                    conoscerlo e lavorarlo in sicurezza.</p>
                <h4>Cosa troverai all'interno del corso?</h4>
                <p><strong>8 video della durata di 28 minuti circa ciascuno.</strong></p>
                <p>Ideali per noi mamme, che abbiamo poco tempo ma non vogliamo rinunciare al nostro benessere e alla
                    nostra forma fisica.</p>
                {{-- <p>Un video a settimana da ripetere da 4 a 6 giorni su 7, per un totale di <strong>8 settimane</strong>.
                </p> --}}
                <p>In video a settimana da ripetere almeno 4 volte nell’arco della settimana oppure scorporare il video e
                    fare <strong>almeno 10 minuti al giorno</strong>.</p>
                <p>Ogni video è strutturato per essere eseguito in progressione graduale e in sicurezza per una remise
                    en forme ottimale.</p>
                <p>Obiettivo del programma è la riconnessione con il proprio corpo dopo 9 mesi di gestazione, per
                    riportare consapevolezza alla parete addominale e al pavimento pelvico attraverso la respirazione.
                    All'interno del corso sono presenti anche esercizi mirati e specifici, per chi ha partorito con
                    taglio cesareo, per chi soffre di <strong>diastasi dei retti</strong> o di <strong>ernie
                        ombelicali</strong>.</p>

                <p>E' un argomento che mi tocca in prima persona e a cui tengo moltissimo, perché ne soffro io stessa.
                    Ho quindi deciso di mettere a punto un <strong>protocollo specifico</strong>.</p>

                <p>Troverai inoltre un video per alleviare le tensioni al tratto cervicale dovuto alla <strong>postura
                        scorretta durante l’allattamento</strong>.
                </p>

                <p>Gli esercizi sono costruiti su base pilates alternando momenti di mobilizzazione, posturale,
                    stretching e tonificazione. Il tutto condito a una sana respirazione.</p>

                <h4>Attrezzatura necessaria</h4>
                <ul>
                    <li>un tappetino pilates/yoga</li>
                    <li>un cuscino</li>
                    <li>una palla</li>
                </ul>



                <a href="{{ URL::to('/courses/3') }}" class="cta-btn">Inizia qui</a>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('assets/frontend/images/fast_28_mockup.png') }}" alt="Fast 28' Post Parto"
                    class="img-fluid p-5 left-parallax image-max-width">
            </div>
        </div>
    </section>
    <!-- /End Section corso #3 about -->
    {{-- Reviews --}}
    @include('layouts.includes.reviews')
    {{-- /End reviews --}}
    <!-- Section price -->
    <section class="pink-gradient-bg py-5" id="inizia">
        <div class="pricing page-container">
            <div class="pricing__card">
                <div class="pricing__card--title">
                    Gravidanza Fit
                </div>
                <span class="badge bg-badge"><i class="fas fa-trophy"></i> Il più richiesto</span>

                <div class="pricing__card--price">
                    <strike><small>149</small></strike> 99 <sup>€</sup>

                </div>
                <p class="text-center">OFFERTA LANCIO!</p>
                <div class="pricing__card--features">
                    <ul>
                        <li>Allenamenti specifici dal quarto mese al settimo mese</li>
                        <li><strong>50 video</strong> tra cui:</li>
                    </ul>
                </div>

                <div class="pricing__card--more">
                    <ul>
                        <li>Imparare a consapevolizzare il respiro <strong>&middot;</strong> <strong>Morning
                                routine giornaliera dettagliata</strong> <strong>&middot;</strong> Lezioni in
                            circuiti e lezioni flow guidate di tonificazione <strong>&middot;</strong> Pilates
                            <strong>&middot;</strong> Barre <strong>&middot;</strong> Piccoli attrezzi
                            <strong>&middot;</strong> Mobilità <strong>&middot;</strong> Stretching
                            <strong>&middot;</strong> Automassaggio
                        </li>
                    </ul>
                </div>

                <div class="pricing__card--features">
                    <ul>
                        <li><strong>Lezioni focus per problematiche specifiche</strong></li>
                    </ul>
                </div>
                <div class="pricing__card--more">
                    <ul>
                        <li><strong>Cervicalgia &middot; Pubalgia
                                &middot; Lombalgia &middot; Polsi Dolenti
                                &middot; Circolazione &middot; Meditazione</strong>
                        </li>
                    </ul>
                </div>

                <div class="pricing__card--features mb-4">
                    <ul>
                        <li>Contenuti extra della <strong>biologa nutrizionista</strong> Chiara Savarino e
                            dell’<strong>ostetrica</strong> Federica Sari</li>
                        <li><strong>Assistenza tramite mail</strong></li>
                        <li>Aggiornamento costante del portale</li>
                    </ul>
                </div>
                <div class="pricing__card--button">
                    <a href="{{ URL::to('/courses/1') }}" class="cta-btn">Inizia ora</a>
                </div>
            </div>
            <div class="pricing__card">
                <div class="pricing__card--title">
                    Parto Consapevole
                </div>
                <span class="badge bg-badge">Allenamento preparto</span>

                <div class="pricing__card--price">
                    <strike><small>99</small></strike> 59 <sup>€</sup>
                </div>
                <p class="text-center">OFFERTA LANCIO!</p>

                <div class="pricing__card--features">
                    <ul>
                        <li><strong>Oltre 20 video</strong> dedicati alla mamma nell’ottavo e nono mese, gli
                            ultimi due mesi di attesa prima di tenere il suo piccolo tra le braccia. E’ arrivato
                            il momento di “lasciare andare” di “sentire“ il tuo pavimento pelvico, di creare
                            spazio , di accogliere e di prepararsi alla diade.</li>
                        <li>Troverai lezioni dedicate:</li>
                    </ul>
                </div>

                <div class="pricing__card--more">
                    <ul>
                        <li>al respiro consapevole <strong>&middot;</strong> lezioni flow di yoga per il parto
                            <strong>&middot;</strong> <strong>Morning routine giornaliera dettagliata</strong>
                            <strong>&middot;</strong> illustrazioni di posizioni utili che potrebbero esserti
                            utili durante il travaglio e parto
                        </li>
                    </ul>
                </div>

                <div class="pricing__card--features">
                    <ul>
                        <li>Lezioni focus per problematiche specifiche</li>
                    </ul>
                </div>
                <div class="pricing__card--more">
                    <ul>
                        <li>Cervicalgia <strong>&middot;</strong> <strong>Pubalgia</strong>
                            <strong>&middot;</strong> Lombalgia <strong>&middot;</strong> Polsi Dolenti
                            <strong>&middot;</strong> Circolazione <strong>&middot;</strong> Automassaggio
                            <strong>&middot;</strong> Pavimento pelvico come rilassarlo
                            <strong>&middot;</strong> Meditazione
                        </li>
                    </ul>
                </div>

                <div class="pricing__card--features mb-4">
                    <ul>
                        <li>Contenuti extra e linee guida sull'alimentazione della <strong>biologa
                                nutrizionista</strong> Chiara Savarino e dell’<strong>ostetrica</strong>
                            Federica Sari</li>
                        <li><strong>Assistenza tramite mail</strong></li>
                        <li>Aggiornamento costante del portale</li>
                    </ul>
                </div>
                <div class="pricing__card--button">
                    <a href="{{ URL::to('/courses/2') }}" class="cta-btn">Inizia Ora</a>
                </div>
            </div>
            <div class="pricing__card">
                <div class="pricing__card--title">
                    Fast 28' Post Parto
                </div>
                <span class="badge bg-badge">Allenamento postparto</span>
                <div class="pricing__card--price">
                    <strike><small>99</small></strike> 59 <sup>€</sup>
                </div>
                <p class="text-center">OFFERTA LANCIO!</p>

                <div class="pricing__card--features">
                    <ul>
                        <li><strong>8 video della durata di 28 minuti circa ciascuno.</strong> Ideali per noi
                            mamme che abbiamo poco tempo ma che non vogliamo rinunciare al nostro benessere e
                            alla nostra forma fisica. Un video a settimana da ripetere almeno 4 volte nell’arco
                            della settimana, per un totale di 8 settimane. </li>
                        <li>Percorso di 8 settimane:</li>
                    </ul>
                </div>

                <div class="pricing__card--more">
                    <ul>
                        <li>esercizi mirati e specifici <strong>&middot;</strong> <strong>speciale diastasi</strong>
                            <strong>&middot;</strong> esercizi focus sul rinforzo del pavimento pelvico
                            <strong>&middot;</strong> video allattamento e postura
                        </li>
                    </ul>
                </div>

                <div class="pricing__card--features mb-4">
                    <ul>
                        <li>Contenuti extra e linee guida sull'alimentazione della <strong>biologa
                                nutrizionista</strong> Chiara Savarino</li>
                        <li><strong>Assistenza tramite mail</strong></li>
                        <li>Aggiornamento costante del portale</li>
                    </ul>
                </div>
                <div class="pricing__card--button">
                    <a href="{{ URL::to('/courses/3') }}" class="cta-btn">Inizia ora</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /End section price -->
    <!-- cta section -->
    <section class="cta">
        <div class="cta-text text-center">
            <h2>Promo Gravidanza Fit e Parto Consapevole</h2>
            <p>Acquista Gravidanza Fit insieme a Parto Consapevole<br>un percorso specifico adatto dalla 13esima alla
                31esima
                settimana<br>e uno specifico dalla 32esima alla 40esima settimana</p>
            <p>Ad un prezzo ulteriormente scontato!</p>
            <i class="fas fa-chevron-down"></i>
            </p>
            <a href="{{ URL::to('/courses/4') }}" class="cta-btn mx-auto">Scopri la promo </a>
        </div>
    </section>
    <!-- /end cta section -->
    <!-- Feature Section -->
    @include('layouts.includes.features')
    <!-- /End Feature Section -->
    <!-- Faq -->
    <section class="pink-gradient-bg">
        <div class="faq">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 text-center py-4">
                    <h2>Domande frequenti</h2>
                    <p class="mb-3 sub-storytelling">Sono qui per aiutarti a risolvere qualsiasi dubbio!</p>
                </div>
            </div>
        </div>
        {{-- Domanda 1 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Quali sono i requisiti di accesso?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Indispensabile, prima di iniziare qualsiasi programma di allenamento in gravidanza e post parto,
                    consultare sempre il medico curante!
                </p>
            </div>
        </div>
        {{-- fine domanda 1 --}}
        {{-- Domanda 2 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Il programma è adatto anche per gravidanze gemellari?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Il programma è più indicato per gravidanze singole, in caso di gravidanze gemellari è obbligatorio
                    consultare il ginecologo!
                </p>
            </div>
        </div>
        {{-- fine domanda 2 --}}
        {{-- domanda 3 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Se sono al sesto mese, che programma devo acquistare?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Ti consiglio di fare riferimento alle settimane di gestazione in cui sei attualmente. Se sei più a
                    ridosso della 13esima sett, puoi acquistare gravidanza fit, se sei più a ridosso della 31esima puoi
                    acquistare parto consapevole. Se hai bisogno di aiuto scrivimi all’indirizzo e-mail.
                </p>
            </div>
        </div>
        {{-- fine domanda 3 --}}
        {{-- domanda 4 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Come ricevo il programma?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Non appena effettuato il pagamento, ti arriverà all’indirizzo mail che hai fornito, un link di accesso
                    alla tua area riservata cosi da iniziare subito il tuo allenamento.
                </p>
            </div>
        </div>
        {{-- fine domanda 4 --}}
        {{-- domanda 5 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Il programma ha una scadenza?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Si, il programma GRAVIDANZA FIT+PARTO CONSAPEVOLE ha una durata di 6 mesi dall’acquisto, il programma
                    GRAVIDANZA FIT ha una durata di 4 mesi dall’acquisto, il programma PARTO CONSAPEVOLE ha una durata di 2
                    mesi dall’acquisto, mentre FAST 28’ POST PARTO, ha una durata di 2 mesi dall’acquisto.
                </p>
            </div>
        </div>
        {{-- fine domanda 5 --}}
        {{-- domanda 6 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Ci sono dei programmi di allenamento?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Si, hai a disposizione una MORNING ROUTINE GIORNALIERA indicativa, che puoi decidere tu, se seguire alla
                    lettera, oppure gestire gli allenamenti in base a come ti senti quel giorno.La MORNING ROUTINE è diversa
                    in base al mese di gestazione per rendere i workout più stimolanti.
                </p>
            </div>
        </div>
        {{-- fine domanda 6 --}}
        {{-- domanda 7 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Il programma e’ rimborsabile?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    No, il programma non è rimborsabile.
                </p>
            </div>
        </div>
        {{-- fine domanda 7 --}}
        {{-- domanda 8 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Cosa mi serve per allenarmi in gravidanza?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Tappetino Pilates/Yoga, fitball, cuscino o la softball del pilates, bastone della scopa, booty band,
                    pesetti 0,5 max
                    1 kilo oppure 2 bottigliette d’acqua, sedia.
                </p>
            </div>
        </div>
        {{-- fine domanda 8 --}}
        {{-- domanda 9 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Dove posso allenarmi?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Ovunque tu voglia, ti basta poco spazio.
                </p>
            </div>
        </div>
        {{-- fine domanda 9 --}}
        {{-- domanda 10 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Come posso pagare?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Tramite Paypal o Carta di Credito.
                </p>
            </div>
        </div>
        {{-- fine domanda 10 --}}
        {{-- domanda 11 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Posso fare un bonifico?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    No, il bonifico non è accettato come metodo di pagamento.
                </p>
            </div>
        </div>
        {{-- fine domanda 11 --}}
        {{-- domanda 12 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Quando posso iniziare il programma fast 28’ post parto?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Ti consiglio di attendere almeno 50/60 giorni dal parto e di confrontarti con il tuo medico curante
                    prima di intraprendere qualsiasi tipo di allenamento.
                </p>
            </div>
        </div>
        {{-- fine domanda 12 --}}
        {{-- domanda 13 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Ho partorito oltre un anno fa, posso comunque acquistare fast 28’ post parto?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Certo! Non c’è un momento più giusto, tutto sta in base a quando te la senti tu.
                </p>
            </div>
        </div>
        {{-- fine domanda 13 --}}
        {{-- domanda 14 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Ho partorito con taglio cesareo, posso iniziare il percorso fast 28’post parto?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Si, considera che il cesareo è un vero e proprio intervento chirurgico, quindi chiedi sempre consiglio
                    al medico che ha seguito la tua gravidanza per sapere esattamente quando iniziare. Solitamente la
                    ripresa è un pò più lunga rispetto a chi partorisce naturalmente.
                </p>
            </div>
        </div>
        {{-- fine domanda 14 --}}
        {{-- domanda 15 --}}
        <div class="domanda-container">
            <div class="domanda">
                <div class="domanda__button custom-collapse">
                    <div class="domanda__titolo">
                        Cosa mi serve per allenarmi nel post parto?
                    </div>
                </div>
                <p class="domanda__risposta contenuto">
                    Tappetino Pilates/yoga, cuscino o softball del pilates, sedia.
                </p>
            </div>
        </div>
        {{-- fine domanda 15 --}}
    </section>
    <!-- /End Faq -->
@endsection
