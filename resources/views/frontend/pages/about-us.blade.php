@extends('frontend.layouts.default')
@section('content')
    <div class="banner text-center">
        <div class="container-fluid">
            <h2 class="text-white mb-20">Swap/Exchange   <span class="segment-heading">    any of your valuable items online </span></h2>
            <a href="{{ url('/items/swap') }}">Start swapping</a>
        </div>
    </div>
    <!--single-page-->
    <div class="single-page main-grid-border">
        <div class="container">
            <ol class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">About Us</li>
            </ol>
            <div>
                <h3>Our Aim</h3>

                <p>
                    Have you ever wanted an item, electronic, shoe, cloth, car, office equipment, you name it? Here’s your chance to trade up for those items.
                    For centuries people exchanged goods and services off a barter system; it has only been recently that so much emphasis has been placed on monetary exchanges. If you know what people want then you can always negotiate a deal with them that favors both parties.
                    An advantage of bartering is that you aren't paying sales tax on items that are traded. If you were to go sell items in a shop or on one of those online message boards or auction sites, you would still pay tax one way or the other most likely you are going to turn around and spend it on an item you want and what happens? You pay sales tax.
                    Bartering can be fun considering the fact that one can trade up on an item which seemed cheap for an item very much expensive.
                    You can barter for fun or for a need.


                </p>
                <hr>
            </div>
        </div>
    </div>



@endsection