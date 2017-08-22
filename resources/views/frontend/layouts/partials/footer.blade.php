{{--
<div class="clearfix"></div>
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="{{url('/about-us')}}">About us</a>
                    </li>
                    <li><a href="{{url('/faqs')}}">FAQ</a>
                    </li>
                    <li><a href="{{url('/contact-us')}}">Contact us</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-4 col-sm-6">
                <h4>User section</h4>

                <ul>
                    <li><a href="{{url('/login')}}">Login</a>
                    </li>
                    <li><a href="{{url('/register')}}">Register</a>
                    </li>
                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->


            <div class="col-md-4 col-sm-6">

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="{{url('https://facebook.com/SwapByBarter')}}" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="{{url('https://twitter.com/SwapByBarter')}}" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="{{url('/contact-us')}}" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

            --}}
{{--<div class="col-md-3 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                    </div>
                    <!-- /input-group -->
                </form>
            </div>
            <!-- /.col-md-3 -->
--}}{{--


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© {{date('Y',time())}} and beyond</p>

        </div>
--}}
{{--        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious.com</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>--}}{{--

    </div>
</div>
<!-- *** COPYRIGHT END *** -->



--}}

<footer class="shadow-lite">
    <div class="footer-top">
        <div class="container">
            <div class="foo-grids">
                <div class="col-md-4 footer-grid">
                    <blockquote><small>For centuries people exchanged goods and services off a barter system; it has only been recently that so much emphasis has been placed on monetary exchanges. If you know what people want then you can always negotiate a deal with them that favors both parties.</small></blockquote>
                </div>
                <div class="col-md-4 footer-grid text-center">
                    <h4 class="footer-head">Help</h4>
                    <ul>
                        <li><a href="{{url('/how-it-works')}}">How it Works</a></li>
                        <li><a href="{{url('/faqs')}}">Faq</a></li>
                        <li><a href="{{url('/about-us')}}">About Us</a></li>
                        <li><a href="{{url('/contact-us')}}">Contact</a></li>
                    </ul>
                </div>
{{--                <div class="col-md-3 footer-grid">
                    <h4 class="footer-head">Information</h4>
                    <ul>
                        <li><a href="regions.html">Locations Map</a></li>
                        <li><a href="terms.html">Terms of Use</a></li>
                        <li><a href="popular-search.html">Popular searches</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>--}}
                <div class="col-md-4 footer-grid">
                    <h4 class="footer-head">Contact Us</h4>
                    <span class="hq">Our headquarters</span>
                    <address>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-map-marker"></span></li>
                            <li class="text-capitalize">Office Address to be available soon.</li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-earphone"></span></li>
                            <li>+2348159447655</li>
                            <div class="clearfix"></div>
                        </ul>
                        <ul class="location">
                            <li><span class="glyphicon glyphicon-envelope"></span></li>
                            <li><a href="support@tradebybarter.club">support@tradebybarter.club inquiries@tradebybarter.club</a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </address>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="footer-logo">
                <a href="/"><span class="brand-yellow">{{ substr($appName,0,4) }}</span><span class="brand-green">{{substr($appName,4)}}</span></a>
            </div>
            <div class="footer-social-icons">
                <ul>
                    <li><a class="facebook" href="{{url('https://facebook.com/SwapByBarter')}}"><span>Facebook</span></a></li>
                    <li><a class="twitter" href="{{url('https://twitter.com/SwapByBarter')}}"><span>Twitter</span></a></li>
                </ul>
            </div>
{{--            <div class="copyrights">
                <p> © 2016 Resale. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
            </div>--}}
            <div class="clearfix"></div>
        </div>
    </div>
</footer>