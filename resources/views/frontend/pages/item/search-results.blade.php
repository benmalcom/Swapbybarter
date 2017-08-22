@extends('frontend.layouts.default')
@section('content')
    <div class="container mt-30">
        <div class="row m-0" style="background-color: #9CDBD0; opacity: 0.9;">
            <form method="get" action="{{ url('/search') }}">
                <div class="col-md-3 pt-10 pb-10">
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

                <div class="col-md-3 pt-10 pb-10">
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

                <div class="col-md-4 pt-10 pb-10">
                    <strong class="pull-left">Search a particular item</strong>
                    <div>
                        <input type="text" class="form-control simplebox" name="term" placeholder="Search a particular item">
                    </div>
                </div>

                <div class="col-md-2 pt-10 pb-10">
                    <br>
                    <button type="submit" class="btn btn-default btn-block shadow-lite search-btn">Search</button>
                </div>
            </form>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="container mt-30 mb-20">
        @if($items->count() > 0)
            <div class="mb-10 mt-10 p-20 shadow-lite bg-white">
                <strong class="text-muted">Showing {{ $items->count() }} of {{ $items->total() }} search results for {{ $term }}</strong>
            </div>
        @endif
        <div class="clearfix"></div>
        <div class="row">
            @foreach($items as $item)
                <a href="{{ url('/items/'.$hashIds->encode($item->id).'/details') }}">
                    <div class="col-md-3">
                        <div class="shadow-lite">
                            <img src="{{ $item->images[0]->url }}" title="" alt=""/>
                            <section class="list-left p-5 light-well">
                                <h5 class="title">{{ $item->name }}</h5>
                                <p class="catpath brand-yellow text-muted"><i class="fa fa-tags"></i> {{ $item->category->name }}</p>
                            </section>
                            <section class="list-right p-5 light-well">
                                                <span class="date text-muted"><i
                                                            class="fa fa-clock-o"></i> {{ $item->created_at->diffForHumans() }}</span>
                                <span class="cityname"><i class="fa fa-map-marker"></i> {{ $item->state->name }}</span>
                                <span class="label label-info">[View Details]</span>
                            </section>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </a>

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