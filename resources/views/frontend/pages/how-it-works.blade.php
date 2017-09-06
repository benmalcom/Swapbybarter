@extends('frontend.layouts.default')
@section('content')
    @include('frontend.layouts.partials.home-banner')

    <!-- Faq -->
    <div class="faq main-grid-border mt-20">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a>
                </li>
                <li>How It Works</li>
            </ul>
            <div>
                <h3>How {{$appName}} Works</h3>

                <p>Follow these steps </p>
                <ul class="mt-10">
                    <li>Go through your store house attic and round up every item you don’t use or rarely use.</li>
                    <li>Post your items on {{$appName}}</li>
                    <li>Search for items of interest.</li>
                    <li>Regularly  check your dashboard for trade offers – to see what other Barterers have offered you.</li>
                    <li>The next thing is for you to select the offers you prefer.</li>
                    <li>Meet for the exchange.</li>
                </ul>
                <h3 class="mt-20">Disclaimer</h3>
                <p>
                     This platform not responsible for any loss that may be involved during an exchange.
                    We strongly warn Barterers to meet in an open and public place to exchange items.
                </p>
            </div>
        </div>
    </div>


@endsection