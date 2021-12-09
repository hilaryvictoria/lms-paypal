@extends('layouts.app')

@section('title', 'Order Confirmation')

@push("css")

@endpush

@section('content')
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pt-5">
                    <h1>Conferma dell'ordine</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="thanks-content">

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="check d-flex justify-content-center">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="description mt-5">
                <h3>Grazie per il tuo acquisto!</h3>
               <p> <a href="{{route('member.dash')}}" class="btn btn-primary mt-5">Vai ai tuoi corsi</a></p>
            </div>
        </div>
    </div>

</div>

</section>



@endsection

@push("js")

@endpush
