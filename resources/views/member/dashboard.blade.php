@extends('layouts.app')

@section('title', 'Member Dashboard')

@push("css")

@endpush

@section('content')
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pt-5">
                    <h1>Benvenuta <em>{{ $authUser->email }}</em></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="member-dash">

<div class="container">

    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>I tuoi corsi</h2>
                <hr>
            </div>
            <div class="table-responsive">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titolo del corso</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Data di acquisto</th>
                        <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->purchased_course_title}}</td>
                                <td>{{$currency}}{{App\Helpers\CurrencyHelper::getSetPriceFormat($order->price)}}</td>
                                <td>{{Carbon\Carbon::parse($order->created_at)->format('Y.m.d')}}</td>
                                <td><a href="{{route('courses.show', $order->purchased_course_id)}}" class="btn btn-info btn-sm">Vai al corso</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$orders->links()}}
        </div>
    </div>

</div>

</section>



@endsection

@push("js")

@endpush
