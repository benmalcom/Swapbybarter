@extends('frontend.layouts.default')
@section('content')
    <div class="total-ads main-grid-border">

    <div class="container p-20">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="{{ url('/') }}">Home</a></li>
            {{--                <li><a href="categories.html">Categories</a></li>--}}
            <li class="active">{{ $category->name }}</li>
        </ol>
        <div class="ads-grid">
            <div class="side-bar col-md-3">
                <div class="resp-tabs-list side-categories p-0">
                    @foreach($categories as $category)
                        <a href="{{ url('/categories/'.$hashIds->encode($category->id).'/items') }}"
                           class="m-0 text-muted">
                            <i class="{{ $category->icon }}"></i> <b>{{ $category->name }}</b>
                        </a>
                    @endforeach

                    <a href="{{ url('/all-ads') }}"><i class="fa fa-list"></i> All Ads</a>
                </div>

            </div>
            <div class="ads-display col-md-9">
                <div class="wrapper">
                    <div id="container">
                        {{--<div class="view-controls-list" id="viewcontrols">--}}
                            {{--<label>view :</label>--}}
                            {{--<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>--}}
                            {{--<a class="listview active"><i--}}
                                        {{--class="glyphicon glyphicon-th-list"></i></a>--}}
                        {{--</div>--}}
                        <div class="sort">
                            <div class="sort-by">
                                <label>Sort By : </label>
                                <select class="form-control input-sm">
                                    <option value="">Most recent</option>
                                    <option value="">A to Z</option>
                                    <option value="">Random</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row p-10">
                                @foreach($items as $item)
                                    <div class="col-md-4">
                                            @include('frontend.pages.item.item',['item'=>$item])
                                    </div>

                                @endforeach
                        </div>
                        <div class="clearfix"></div>

                    @if(!$items->count())
                            <div class="bg-info shadow-lite p-10 mt-20">
                                <strong class="text-muted">No ad is available for your chosen category</strong>
                            </div>
                        @endif
                            <div>{{ $items->links() }}</div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
@endsection