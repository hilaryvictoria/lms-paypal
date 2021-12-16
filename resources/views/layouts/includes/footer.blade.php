    <!-- Footer -->
    <footer class="white-bg mt-5">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="{{ asset('/assets/frontend/images/logo-PDF.png') }}" alt="" width="180" class="mb-3">
                    <small class="font-italic text-muted d-block pb-3">Royalty Free Music from Bensound</small>
                    <small class="font-italic text-muted d-block pb-3"><a href="{{ route('terms') }}">Termini e condizioni</a></small>
                    <small class="font-italic text-muted d-block pb-3"><a href="{{ route('privacy') }}">Privacy Policy</a></small>
                    <div><img src="{{ asset('/assets/frontend/images/paypal-logo.png') }}" alt="Paypal" class="d-block"> 
                    <p class="mt-2"><small>Virginia Maternity Coach utilizza Paypal per permetterti pagamenti veloci e sicuri</small></p></div>
                    <ul class="list-inline mt-4">
                        <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">I corsi</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="{{ URL::to('/courses/1') }}" class="text-muted">Gravidanza Fit</a></li>
                        <li class="mb-2"><a href="{{ URL::to('/courses/2') }}" class="text-muted">Parto Consapevole</a></li>
                        <li class="mb-2"><a href="{{ URL::to('/courses/3') }}" class="text-muted">Fast 28' Post Parto</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">Portale</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="{{ route('login') }}" class="text-muted">Login</a></li>
                        <li class="mb-2"><a href="{{ route('register') }}" class="text-muted">Registrati</a></li>
                        <li class="mb-2"><a href="{{ route('member.dash') }}" class="text-muted">I tuoi corsi</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-lg-0">
                    <h6 class="text-uppercase font-weight-bold mb-4">Disclaimer</h6>
                    <p class=" mb-4 text-muted">Prima di intraprendere qualsiasi tipo di attività fisica in gravidanza è importante consultare il proprio medico!</p>
                    <p class="text-muted">Domande? Dubbi? Scrivimi a <a href="mailto:info@virginiamaternitycoach.it">info@virginiamaternitycoach.it</a></p>
                    <p class="text-muted">Problemi tecnici? Contatta il supporto a <a href="mailto:supporto@virginiamaternitycoach.it">supporto@virginiamaternitycoach.it</a></p>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">Copyright &copy; 2021-{{ date('Y') }} Virginia Maternity Coach All rights reserved.</p>
                <p>By Uxnovo</p>
            </div>
        </div>
    </footer>