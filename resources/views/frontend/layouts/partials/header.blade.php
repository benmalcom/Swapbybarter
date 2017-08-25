<nav class="navbar navbar-default navbar-fixed-top shadow">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
 <span class="brand-yellow text-muted">{{ substr($appName,0,4) }}</span><span class="brand-green text-muted">{{substr($appName,4)}}</span>


{{--                <span class="text-muted text-white">{{ $appName }}</span>--}}
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if(Auth::check())
                <div class="btn-group mt-20 navbar-right navbar-auth-links">
                    <button type="button" class="btn btn-link text-white dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        My Account <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->account_verified)
                            <li @if(Request::path() == "profile")class="active"@endif>
                                <a href="{{'/profile'}}">My Profile</a>
                            </li>
                            <li @if(Request::path() == "password/change")class="active"@endif>
                                <a href="{{'/password/change'}}"> Change Password</a>
                            </li>
                            <li @if(Request::path() == "my-items")class="active"@endif>
                                <a href="{{'/my-items'}}">My Items</a>
                            </li>
                        <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="white-on-hover"
                                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li>
                                <div class="p-5 bg-danger text-white">Activate your account</div>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
            @if(Auth::guest())
                <div class="dropdown navbar-right navbar-nav navbar-auth-links mt-20">
                    <button class="btn btn-link dropdown-toggle text-white" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        My Account
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li @if(Request::path() == "login")class="active"@endif>
                            <a href="{{'/login'}}">Login</a>
                        </li>
                        <li @if(Request::path() == "register")class="active"@endif>
                            <a href="{{'register'}}">Register</a>
                        </li>
                    </ul>
                </div>
            @endif


            @if( Auth::check() && Auth::user()->isAdmin())
                <div class="btn-group mt-20 navbar-right navbar-auth-links">
                    <a class="btn btn-link text-white" href="{{url('/admin/dashboard')}}">Admin</a>
                </div>
            @endif


                                <div class="btn-group mt-20 navbar-right navbar-auth-links mr-5">
                                    <a  class="btn btn-transparent" href="{{url('/items/swap')}}"><i class="fa fa-exchange"></i> Swap your item</a>

                                </div>



        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
{{--

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>--}}
