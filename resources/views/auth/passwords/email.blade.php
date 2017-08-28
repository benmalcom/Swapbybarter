@extends('frontend.layouts.default')

<!-- Main Content -->
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="col-sm-4 col-sm-offset-4 col-xs-12 p-20 mt-30 light-well">
                <h4 class="text-muted">Reset Password</h4>
                <p class="mt-10 mb-10">Enter your email to receive reset link</p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control input-lg simplebox" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Enter your email address" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-transparent-success input-lg">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
