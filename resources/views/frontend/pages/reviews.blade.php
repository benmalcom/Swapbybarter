@extends('frontend.layouts.default')
@section('content')
    <div class="col-md-8 col-md-offset-2 col-xs-12 mt-40">
        <h3>Post a review</h3>
        <div class="shadow-lite p-10 text-info mt-20">
            Reviews, comments or suggestions on how to make {{$appName}} better? We are open to it, let's know what you
            think.
        </div>

        @if(Auth::check())
            <form class="form-horizontal" method="post" action="{{url('/reviews')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                    <div class="col-sm-12">
                                <textarea class="form-control simplebox" name="body"
                                          placeholder="Tell us what you feel"
                                          rows="3"></textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mb-5">
                        <button type="submit" class="btn btn-transparent-success simplebox">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        @else
            <div class="well well-sm text-danger mt-20">
                You must be logged in to post a review.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                @if(count($reviews) > 0)
                    <div class="timeline-centered">
                        @foreach($reviews as $index=>$review)
                            <article class="timeline-entry">
                                <div class="timeline-entry-inner">
                                     {{--<time class="timeline-time" datetime="{{ $review->created_at->toDateTimeString() }}">
                                         <span>{{ $review->created_at->format('h:i A') }}</span>
                                         @if($review->created_at->isToday())
                                         <span>Today</span>
                                         @else
                                         <span>{{ $review->created_at->toDateString() }}</span>
                                         @endif
                                     </time>--}}


                                    @if(($index + 1) % 2 == 0)
                                        <div class="timeline-icon bg-success">
                                            @else
                                                <div class="timeline-icon bg-danger">
                                                    @endif
                                                    <i class="entypo-feather"></i>
                                                </div>

                                                <div class="timeline-label">
                                                    <h2>
                                                    <a href="#">{{ $review->poster->fullName() }}</a>
                                                    <span class="pull-right text-sm text-black block-on-minimize">
                                                    <span>{{ $review->created_at->format('h:i A') }}, </span>

                                                    @if($review->created_at->isToday())
                                                                <span>Today</span>
                                                    @else
                                                        <span>{{ $review->created_at->toDateString() }}</span>
                                                    @endif

                                                </span>
                                                    </h2>
                                                    <p>{{ $review->body }}</p>
                                                </div>
                                        </div>

                            </article>

                        @endforeach


                    </div>
                @else
                @endif

            </div>
        </div>

    </div>

@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('css/review-timeline.css')}}" type="text/css" media="screen"/>
@endpush
