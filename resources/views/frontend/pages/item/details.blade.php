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
                <li class="active"><a>{{ $item->category->name }}</a></li>
                <li class="active">{{ $item->name }}</li>
            </ol>
            <div class="product-desc">
                <div class="col-md-7 product-view">
                    <h2>{{ $item->name }}</h2>
                    <p> <i class="glyphicon glyphicon-map-marker"></i> <a href="#">{{ $item->address }},</a> <a href="#">{{ $item->state->name }}</a>| Added {{ $item->created_at->diffForHumans() }}</p>
                    <div>
                        <div class="img-container text-center col-md-4 col-md-offset-4">
                            <img class="item-image-big" src="{{ $item->images[0]->url }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="">
                            @foreach($item->images as $image)
                                    <img class="item-image-thumb" src="{{ $image->url }}"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-details">
{{--                        <h4>Brand : <a href="#">Company name</a></h4>--}}
                        <h4>Views : <strong>{{ $item->views }}</strong></h4>
{{--                        <p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p>--}}
                        <p><strong>Summary</strong> : {{ $item->description }}</p>

                    </div>
                </div>
                <div class="col-md-5 product-details-grid">
                    <div class="item-price">
                        <div class="product-price">
                            <p class="p-price"><b>Exchange</b></p>
                            <h5 class="rate">{{ $item->exchange }}</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="condition">
                            <p class="p-price"><b>Condition</b></p>
                            <h5>{{ $item->item_condition }}</h5>
                            <div class="clearfix"></div>
                        </div>
                        <div class="itemtype">
                            <p class="p-price"><b>Item Category</b></p>
                            <h5><a class="text-black" href="{{ url('/categories/'.$hashIds->encode($item->category->id).'/items') }}">{{ $item->category->name }}</a> </h5>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="interested text-center">
                        <h4>Interested in this Ad?<small> Contact the Owner!</small></h4>
                        <p><i class="glyphicon glyphicon-earphone"></i>{{ $item->poster->mobile }}</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<!-- FlexSlider -->
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider -->
@endpush