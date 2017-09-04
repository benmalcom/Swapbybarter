@extends('frontend.layouts.default')
@section('content')
    <div class="container mt-30">
        @include('frontend.layouts.partials.search-bar')

        <div class="clearfix"></div>
    </div>
    <div class="container mt-30 mb-20">
        @if($items->count() > 0)
            <div class="mb-10 p-20 shadow-lite bg-white">
                <p class="text-muted">
                    Showing {{ $items->count() }} of {{ $items->total() }} results that matches your search
                    @if(isset($term))<span> for <b>{{ $term }}</b></span>@endif
                </p>
            </div>
        @endif
        <div class="clearfix"></div>
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-3 col-xs-12 col-sm-4">
                    @include('frontend.pages.item.item',['item'=>$item])
                </div>
            @endforeach
        </div>
        <div class="clearfix"></div>

        @if(!$items->count())
            <div class="bg-info shadow-lite p-10 mt-20 col-md-6 col-xs-12 col-lg-6">
                <strong class="text-muted">No results returned for your search! Define your search properly.</strong>
            </div>
            <div class="clearfix"></div>
{{--                <div class="bg-info shadow-lite p-10 mt-20 col-md-6 col-xs-12 col-lg-6">
                    <p class="text-muted">Can't find what you're looking for?</p>
                </div>
                <div class="clearfix"></div>--}}

            @endif
        <div class="clearfix"></div>

    </div>
@endsection