@extends('frontend.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="col-md-4 col-md-offset-4 light-well p-20 mt-20">
                <h3 class="text-muted">Create an account</h3>
                <p class="mt-10 mb-10">Sign up to swap your items. Fast and easy.</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input id="email" type="email" class="form-control simplebox input-lg" name="email" value="{{ old('email') }}" placeholder="Your email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input id="password" type="password" class="form-control simplebox input-lg" name="password" placeholder="Choose password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input id="mobile" type="text" class="form-control simplebox input-lg" name="mobile" value="{{ old('mobile') }}" placeholder="Your phone number">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    {{--<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input id="first_name" type="text" class="form-control simplebox input-lg" name="first_name" placeholder="First name" required>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                        <div class="col-sm-12">
                            <input id="first_name" type="text" class="form-control simplebox input-lg" name="last_name" placeholder="Last name" required>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
--}}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-transparent-success simplebox input-lg">
                                Create account
                            </button>
                            <a class="btn text-muted pull-right" href="{{ url('/login') }}">
                                A user already? Login.
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
