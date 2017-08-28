@extends('frontend.layouts.default')
@section('content')
            <div id="page-wrapper">
                <div class="graphs">
                    <div class="col-sm-4 col-sm-offset-4 p-20 light-well mb-20 mt-20">
                            <h4 class="text-muted">Verify your account</h4>
                            <p class="mt-10 mb-10">Enter the verification code sent to your mail</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/activate-account') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('verification_code') ? ' has-error' : '' }}">

                                <div class="col-sm-12">
                                    <input id="email" type="text" class="form-control input-lg simplebox"
                                           name="verification_code" value="{{ old('verification_code') }}"
                                           placeholder="Activation code" required autofocus>

                                    @if ($errors->has('verification_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('verification_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-transparent-success input-lg simplebox">
                                        Activate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

@endsection
