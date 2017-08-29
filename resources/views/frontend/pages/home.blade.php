@extends('frontend.layouts.default')
@section('content')

<div class="main-banner banner text-center">
    <div class="container-fluid">
        <div class="container mt-10">
        <h2 class="text-white mb-20 home-text">{{ $appName }}</h2>
        <h3 class="mb-20 home-text text-white" style="opacity: 0.8;">No Buy. No Sell. Just Exchange.</h3>
         @include('frontend.layouts.partials.search-bar')
        </div>

        {{--        <h2 class="text-white mb-20 home-text">Swap/Exchange   <span class="segment-heading">    any of your valuable items online </span></h2>
                <a href="{{ url('/items/swap') }}">Start swapping</a>--}}
    </div>


</div>
<!-- content-starts-here -->
<div class="content">

{{--    <div class="container mt-30">
        <div class="row m-0" style="background-color: #9CDBD0; opacity: 0.9;">
            <form method="get" action="{{ url('/search') }}">
                <div class="col-md-3 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Search through locality</strong>
                    <div>
                        <select class="form-control simplebox" name="state" data-live-search="true">
                            <option value="">-- select --</option>

                            @foreach($states as $state)
                                <option value="{{ $hashIds->encode($state->id) }}">
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Search through category</strong>
                    <div>
                        <select class="form-control simplebox" name="category" data-live-search="true">
                            <option value="">-- select --</option>
                            @foreach($categories as $category)
                                <option value="{{ $hashIds->encode($category->id) }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Search a particular item</strong>
                    <div>
                        <input type="text" class="form-control" name="term" placeholder="Search a particular item">
                    </div>
                </div>

                <div class="col-md-2 pt-10 pb-10 col-sm-4">
                    <br>
                    <button type="submit" class="btn btn-custom btn-block shadow-lite search-btn">Search</button>
                </div>
            </form>
        </div>

        <div class="clearfix"></div>
    </div>--}}
    <div class="categories">
        <div class="container">

            @foreach($categories as $category)
                <div class="col-md-2 focus-grid">
                    <a href="{{ url('/categories/'.$hashIds->encode($category->id).'/items') }}">
                        <div class="focus-border">
                            <div class="focus-layout">
                                <div class="focus-image"><i class="{{ $category->icon }}"></i></div>
                                <h4 class="clrchg">{{ $category->name }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="trending-ads">
        <div class="container">
            <!-- slider -->
            <div class="trend-ads">
                <h2>Trending Ads</h2>
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-3 col-xs-12 col-sm-4">
                            @include('frontend.pages.item.item',['item'=>$item])
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center mt-20"><a href="#" class="btn btn-default btn-lg">Show All Ads</a></div>
            </div>
        </div>
        <!-- //slider -->
    </div>
    {{--<div class="mobile-app">
        <div class="container">
            <div class="col-md-5 app-left">
                <a href="mobileapp.html"><img src="images/app.png" alt=""></a>
            </div>
            <div class="col-md-7 app-right">
                <h3>Resale App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at elementum. Suspendisse et condimentum nibh.</p>
                <div class="app-buttons">
                    <div class="app-button">
                        <a href="#"><img src="images/1.png" alt=""></a>
                    </div>
                    <div class="app-button">
                        <a href="#"><img src="images/2.png" alt=""></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>--}}
</div>

@endsection