@extends('frontend.layouts.default')
@section('content')

    <div class="banner text-center">
        <div class="container-fluid">
            <h2 class="text-white mb-20">Swap/Exchange   <span class="segment-heading">    any of your valuable items online </span></h2>
            <a href="{{ url('/items/swap') }}">Start swapping</a>
        </div>
    </div>
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

                <p class="lead">Steps To Follow To Barter on {{$appName}}</p>
                <ul>
                    <li>Go through your store house attic and round up every item you don’t use or rarely use.</li>
                    <li>Post your items on {{$appName}}</li>
                    <li>Search for items of interest.</li>
                    <li>Regularly  check your dashboard for trade offers – to see what other Barterers have offered you.</li>
                    <li>The next thing is for you to select the offers you prefer.</li>
                    <li>Meet for the exchange.</li>
                </ul>
                <h3>Disclaimer</h3>
                <p>
                    {{$appName}} is not responsible for any loss that may be involved during an exchange.
                    We strongly warn Barterers to meet in an open and public place to exchange items.
                </p>
                <hr>
            </div>
        </div>
    </div>


@endsection