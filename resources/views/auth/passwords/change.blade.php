@extends('frontend.layouts.default')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="col-sm-4 col-sm-offset-4 p-20 light-well">
                    <h4 class="text-muted">Change Password</h4>
                    <p class="mt-10 mb-10">Enter your old and new password</p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/change') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" placeholder="Enter current password" type="password" class="form-control simplebox input-lg" name="old_password"
                                       required>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Enter new password" class="form-control simplebox input-lg" name="password"
                                       required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Confirm new password" class="form-control simplebox input-lg"
                                       name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-transparent-success input-lg">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
