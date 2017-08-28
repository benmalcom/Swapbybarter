@extends('frontend.layouts.default')


@section('content')
            <div class="col-md-8 col-md-offset-2 mt-20 mb-10">
                <h2>My account</h2>
                <h5 class="text-muted mt-10 mb-10">Update your personal details here. Including your full name.</h5>
                <div class="row">

                    <div class="col-md-5 mb-20">
                        {{--                            <h4 class="text-muted mb-10 mt-10">Profile preview</h4>--}}
                        <div class="shadow pb-10">
                                <form method="POST" action="{{ url('/profile/avatar') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="center-content light-well pt-10 pb-10">
                                        <img src="{{ !empty($user->avatar_url)  ?  $user->avatar_url : 'http://placehold.it/380x500'}}"
                                             class="avatar circulate circulate-xlg"
                                             alt="">
                                    </div>
                                    <div><br></div>
                                    <div>
                                        <p class="text-center mb-5">
                                            <label class="btn btn-default btn-xs"><i class="fa fa-camera"></i> Choose
                                                photo<input type="file" name="avatar"
                                                            class="hidden avatar-input" required></label>
                                            <button type="submit" class="btn btn-transparent-success btn-xs simplebox">
                                                Upload
                                            </button>
                                        </p>
                                    </div>
                                </form>

                            {{--                                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />--}}
                            <div class="text-center">
                                <h4 class="text-muted mt-5 mb-5"><b>{{$user->fullName()}}</b></h4>
                                <h5 class="mt-5 mb-5">{{$user->email}}</h5>
                                <h5 class="mt-5 mb-5">{{$user->mobile}}</h5>
                                <h5 class="mt-5 mb-5">Posted {{$user->items_count}} items</h5>

                                <h5 class="mt-5 mb-5">Registered {{$user->created_at->diffForHumans()}}</h5>
                                <!-- Split button -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-20">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile') }}"
                              enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control simplebox input-lg"
                                           value="{{ $user->email }}" placeholder="Email" readonly>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control simplebox input-lg" name="first_name"
                                           value="{{ $user->first_name }}" placeholder="First name" autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control simplebox input-lg" name="last_name"
                                           value="{{ $user->last_name }}" placeholder="Last name">

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control simplebox input-lg" name="mobile"
                                           value="{{ $user->mobile }}" placeholder="Mobile no">

                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-transparent-danger simplebox input-lg">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
    <!-- /.container -->
@endsection