<!DOCTYPE html>
<html>
<head>
    <title>{{isset($appName) ? $appName : 'SwapByBarter | Exchange your items for another'}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"  type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"  type="text/css" media="screen" />
    <link href="{{asset('css/jquery.uls.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery.uls.grid.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery.uls.lcd.css')}}" rel="stylesheet"/>

    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Exchange your items for another" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    {{--<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    --}}
{{--    <link href='//https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>--}}
    <!--//fonts-->
    <!-- Source -->
</head>
<body>
{{--Include header--}}
@include('frontend.layouts.partials.header')

{{--Include home content--}}
<div class="container-fluid">
    <div class="row">
            @if(Session::has('flash_message'))
                {!! Session::get('flash_message') !!}
            @endif
        <div class="clearfix"></div>
        @yield('content')
        <div class="clearfix"></div>

    </div>
    <div class="clearfix"></div>
</div>

<!--footer section start-->
@include('frontend.layouts.partials.footer')
<!--footer section end-->

<!-- js -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.js')}}"></script>
<script>
    $(document).ready(function () {
        let mySelect = $('#first-disabled2');

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    });
</script>
<script type="text/javascript" src="{{asset('js/jquery.leanModal.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.data.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.data.utils.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.lcd.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.languagefilter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.regionfilter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.uls.core.js')}}"></script>
<script>
    $( document ).ready( function() {
        $( '.uls-trigger' ).uls( {
            onSelect : function( language ) {
                let languageName = $.uls.data.getAutonym( language );
                $( '.uls-trigger' ).text( languageName );
            },
            quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
        } );
    } );
</script>
@stack('scripts')
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>
</html>