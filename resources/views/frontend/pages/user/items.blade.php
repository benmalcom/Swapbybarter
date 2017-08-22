@extends('frontend.layouts.default')
@section('content')
    <div class="container mt-30 mb-20">

        <div class="row">
                @foreach($items as $item)
                    <div class="col-md-3">
                        @include('frontend.pages.item.item',['item'=>$item])
                    </div>

                @endforeach
        </div>
        <div class="clearfix"></div>

    @if(!$items->count())
            <div class="bg-danger p-20 mt-20">
                <strong>You haven't posted any ads yet!</strong>
            </div>
        @endif
        <div class="clearfix"></div>

    </div>
@endsection