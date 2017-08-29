@extends('frontend.layouts.default')
@section('content')
    <div class="container mt-30">
        <div class="row m-0" style="background-color: #9CDBD0;">
            <form method="get" action="{{ url('/search') }}">
                <div class="col-md-3 col-xs-12 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Which item do you have?</strong>
                    <div>
                        <input type="text" class="form-control bg-white" style="opacity: 1;" name="item" placeholder="Type your item name">
                    </div>
                </div>

                <div class="col-md-3 col-xs-12  pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Which item are you searching for?</strong>
                    <div>
                        <input type="text" class="form-control bg-white" name="exchange" placeholder="What are you exchanging for?">
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Include state?</strong>
                    <div>
                        <select class="form-control simplebox bg-white" name="state" data-live-search="true">
                            <option value="">-- select --</option>

                            @foreach($states as $state)
                                <option value="{{ $hashIds->encode($state->id) }}">
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2 col-xs-12 pt-10 pb-10 col-sm-4">
                    <strong class="pull-left">Include category?</strong>
                    <div>
                        <select class="form-control simplebox bg-white" name="category" data-live-search="true">
                            <option value="">-- select --</option>
                            @foreach($categories as $category)
                                <option value="{{ $hashIds->encode($category->id) }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-2 pt-10 pb-10 col-sm-4">
                    <br>
                    <button type="submit" class="btn btn-custom btn-block shadow-lite search-btn">Search</button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container mt-30 mb-20">
        @if($items->count() > 0)
            <div class="mb-10 p-20 shadow-lite bg-white">
                <p class="text-muted">
                    Showing {{ $items->count() }} of {{ $items->total() }} search results
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
            <div class="bg-danger p-20 mt-20">
                <strong>No results returned for your search!</strong>
            </div>
        @endif
        <div class="clearfix"></div>

    </div>
@endsection