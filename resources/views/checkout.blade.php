@extends('layouts.app')
@section('title', 'Checkout')

@push('css')

@endpush

@section('content')
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title pt-5">
                        <h1>Completa l'acquisto</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="main-checkout">
        <div class="container">
            {{-- if session("faliureMsg") variable is set we are showing the alert and we echo out the variable with the faliure message --}}
            @if (session('failureMsg'))
                <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
                    <strong>{{ session('failureMsg') }}</strong>
                </div>
            @endif
            <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
                <strong id="validationErrorText"></strong>
            </div>
            <div class="row">

                <div class="col-lg-6 customer-info">

                    <div class="step1">
                        <h4>Informazioni di contatto
                        </h4>
                        <hr>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="first_name">Nome <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                aria-describedby="first_name" value="{{ old('first_name') }}">
                        </div>
                        <div class="col">
                            <label for="last_name">Cognome<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                aria-describedby="last_name" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="email_address">Indirizzo Email<span style="color: red;">*</span></label>
                            <input type="email" name="email_address" class="form-control" id="email_address"
                                aria-describedby="email_address" value="{{ old('email_address') }}">
                        </div>
                        <div class="col">
                            <label for="phone">Telefono</label>
                            <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phone"
                                value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="step2">
                        <h4>Indirizzo di fatturazione</h4>
                        <hr>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="street">Indirizzo<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="street" id="street" aria-describedby="street"
                                value="{{ old('street') }}">
                        </div>
                        <div class="col">
                            <label for="apartment">Numero civico</label>
                            <input type="text" class="form-control" name="apartment" id="apartment"
                                aria-describedby="apartment" value="{{ old('apartment') }}">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="city">Citt??<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="city" id="city" aria-describedby="city"
                            value="{{ old('city') }}">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="state">Provincia<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="state" id="state" aria-describedby="state"
                                value="{{ old('state') }}">
                            {{-- <select id="state" class="custom-select" name="state" autocomplete="off"></select> --}}
                        </div>


                        <div class="col">
                            <label for="country">Paese<span style="color: red;">*</span></label>
                            {{-- <input type="text" class="form-control" name="country" id="country" aria-describedby="country"
                            value="{{ old('country') }}"> --}}
                            <select id="country" class="custom-select" name="country">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->code }}" autocomplete="off" @if (!old('country'))
                                        {{ $country->code == 'IT' ? 'selected' : '' }}
                                    @else
                                        {{ old('country') == $country->code ? 'selected' : '' }}
                                @endif
                                >
                                {{ stripslashes($country->name) }} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group mt-4">
                        <label for="zip">CAP<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="zip" id="zip" value="{{ old('zip') }}">
                    </div>

                </div> <!-- /.col-lg-6 -->

                <!-- SECOND COLUMN -->
                <div class="col-lg-6">

                    <div class="step3">
                        <h4>Checkout e pagamento</h4>
                        <hr>
                    </div>
                    <div class="order-details">
                        <div class="order-meta d-flex justify-content-between">
                            <div>Corso</div>
                            <div>Totale</div>
                        </div>
                        <div class="product-row d-flex justify-content-between">
                            <div>
                                {{ $course->title }}
                            </div>
                            <div>
                                {{ $currency }}{{ App\Helpers\CurrencyHelper::getSetPriceFormat($course->price) }}
                            </div>
                        </div>
                        <div class="total d-flex justify-content-between">
                            <div>Total</div>
                            <div id="total" data-total="{{ $course->price }}">
                                {{ $currency }}{{ App\Helpers\CurrencyHelper::getSetPriceFormat($course->price) }}
                            </div>
                        </div>
                    </div>
                    <div class="payment-title mb-1 mt-4">
                        <h4>Seleziona un metodo di pagamento</h4>
                    </div>

                    <div class="all-payment-methods-container">
                        <div class="accordion" id="all-payment-methods">
                            @if ($braintreeEnabled)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" onclick="checkRadioBtn(this)"
                                                data-target="#tm-braintree-div" aria-expanded="false"
                                                aria-controls="tm-braintree-div">
                                                <div class="d-flex justify-content-between">
                                                    <div class="braintree-payment-div">
                                                        <input class="form-check-input" type="radio" name="paymentRadio"
                                                            id="braintreePayment" value="">
                                                        <label class="form-check-label" for="braintreePayment">
                                                            {{ $brainTreeLabel }}</label>
                                                    </div>
                                                    <div class="tmsonic-braintree-image">
                                                        <img src="{{ asset('public/assets/frontend/images/braintree-cards.png') }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="tm-braintree-div" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#all-payment-methods">
                                        <div class="card-body">
                                            <div class="wrapper">
                                                <div class="checkout container">
                                                    <section>
                                                        <div class="bt-drop-in-wrapper">
                                                            <div id="bt-dropin"></div>
                                                        </div>
                                                    </section>
                                                    <form action="{{ route('braintree.payment') }}" id="payment-form-bt"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" id="nonce_bt" name="nonce" />
                                                        <input type="hidden" id="first_name_bt" name="first_name" />
                                                        <input type="hidden" id="last_name_bt" name="last_name" />
                                                        <input type="hidden" id="phone_bt" name="phone" />
                                                        <input type="hidden" id="street_bt" name="street" />
                                                        <input type="hidden" id="apartment_bt" name="apartment" />
                                                        <input type="hidden" id="city_bt" name="city" />
                                                        <input type="hidden" id="country_bt" name="country" />
                                                        <input type="hidden" id="state_bt" name="state" />
                                                        <input type="hidden" id="zip_bt" name="zip" />
                                                        <input type="hidden" id="course_bt" name="course" />
                                                        <input type="hidden" id="total_bt" name="total" />
                                                        <button class="button btn btn-payment btn-block" id="btPayStartBtn"
                                                            form="payment-form-bt" type="submit">
                                                            <span>Click to complete purchase</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>
                        @if ($stripeEnabled)
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" onclick="checkRadioBtn(this)"
                                            data-target="#tm-stripe-div" aria-expanded="true" aria-controls="tm-stripe-div">
                                            <div class="d-flex justify-content-between">
                                                <div class="stripe-payment-div">
                                                    <input class="form-check-input" type="radio" name="paymentRadio"
                                                        id="stripePayment" value="">
                                                    <label class="form-check-label" for="stripePayment"> Credit card by
                                                        Stripe </label>
                                                </div>
                                                <div class="stripe-image">
                                                    <img src="{{ asset('public/assets/frontend/images/stripe-cards.png') }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="tm-stripe-div" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#all-payment-methods">
                                    <div class="card-body">
                                        <div class="wrapper">
                                            <div class="checkout container">
                                                <section>
                                                    <div class="tm-stripe-wrapper">
                                                        <label for="stripe-card-element"></label>
                                                        <div id="stripe-card-element">
                                                        </div>
                                                    </div>
                                                </section>
                                                <form action="{{ route('checkout.fulfill.order') }}"
                                                    id="payment-form-stripe" name="stripePayForm" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="first_name_stripe" name="first_name" />
                                                    <input type="hidden" id="last_name_stripe" name="last_name" />
                                                    <input type="hidden" id="phone_stripe" name="phone" />
                                                    <input type="hidden" id="street_stripe" name="street" />
                                                    <input type="hidden" id="apartment_stripe" name="apartment" />
                                                    <input type="hidden" id="city_stripe" name="city" />
                                                    <input type="hidden" id="country_stripe" name="country" />
                                                    <input type="hidden" id="state_stripe" name="state" />
                                                    <input type="hidden" id="zip_stripe" name="zip" />
                                                    <input type="hidden" id="course_stripe" name="course" />
                                                    <input type="hidden" id="transaction_stripe" name="transaction_id" />
                                                    <input type="hidden" id="total_stripe" name="total" />
                                                    <button class="button btn btn-payment btn-block" id="payStartBtnStripe"
                                                        form="payment-form-stripe" type="submit"><span>Click to complete
                                                            purchase</span> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- If Paypal payment is enabled --}}
                        @if ($payPalSmartEnabled)
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" onclick="checkRadioBtn(this)"
                                            data-target="#tm-paypal-smart-div" aria-expanded="true"
                                            aria-controls="tm-paypal-smart-div">
                                            <div class="d-flex justify-content-between">
                                                <div class="paypal-smart-payment-div">
                                                    <input class="form-check-input" type="radio" name="paymentRadio"
                                                        id="paypalSmartPayment" value="">
                                                    <label class="form-check-label" for="paypalSmartPayment"> Paga con
                                                        Paypal </label>
                                                </div>
                                                <div class="paypal-image">
                                                    <img src="{{ asset('public/assets/frontend/images/paypal-logo.png') }}"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                </div>
                                <div id="tm-paypal-smart-div" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#all-payment-methods">
                                    <div class="card-body">
                                        <div class="wrapper">
                                            <div class="checkout container">
                                                <section>
                                                    <div class="tm-paypal-smart-wrapper">
                                                        {{-- Empty div where the Paypal js will load smart payment buttons --}}
                                                        <div id="tm-paypal-smart-placement">
                                                        </div>
                                                    </div>
                                                </section>
                                                <form action="{{ route('checkout.fulfill.order') }}"
                                                    id="payment-form-paypal-smart" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="first_name_paypal" name="first_name" />
                                                    <input type="hidden" id="last_name_paypal" name="last_name" />
                                                    <input type="hidden" id="phone_paypal" name="phone" />
                                                    <input type="hidden" id="street_paypal" name="street" />
                                                    <input type="hidden" id="apartment_paypal" name="apartment" />
                                                    <input type="hidden" id="city_paypal" name="city" />
                                                    <input type="hidden" id="country_paypal" name="country" />
                                                    <input type="hidden" id="state_paypal" name="state" />
                                                    <input type="hidden" id="zip_paypal" name="zip" />
                                                    <input type="hidden" id="course_paypal" name="course" />
                                                    <input type="hidden" id="transaction_paypal" name="transaction_id" />
                                                    <input type="hidden" id="total_paypal" name="total" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div id="terms_privacy_div" class="form-group form-check mt-4" style="border: 1px solid red">
                            <input type="checkbox" class="form-check-input" id="terms_checkbox" autocomplete="off">
                            <label class="form-check-label" for="terms_checkbox">Effettuando l'ordine dichiaro di accettare
                                i
                                <a target="_blank" href="{{ route('terms') }}">termini e le condizioni</a> la <a
                                    target="_blank" href="{{ route('privacy') }}">privacy policy</a>.
                            </label>
                        </div>
                    </div> <!-- /.payment-methods-container -->
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border text-info" style="width: 3rem; height: 3rem; display: none;"
                            id="payStartSpinner" role="status">
                        </div>
                    </div>
                </div> <!-- /.col-lg-6 -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->

        <!-- Processing Modal begins -->
        <div class="modal fade" id="processingModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>La tua richiesta sta per essere eseguita. Questo potrebbe richiedere un po' di tempo. Grazie per
                            la tua pazienza!</p>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Processing Modal ends -->

    </section>

@endsection

@push('js')
    @include('js-for-views.checkout-js')
    @if ($braintreeEnabled)
        @include('js-for-views.payment-gateway-js.braintree-js')
    @endif
    @if ($stripeEnabled)
        @include('js-for-views.payment-gateway-js.stripe-js')
    @endif
    {{-- inclusion of js file --}}
    @if ($payPalSmartEnabled)
        @include('js-for-views.payment-gateway-js.paypal-smart-js')
    @endif
@endpush
