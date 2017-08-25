<footer class="shadow-lite m-0">
    <div class="footer-top">
        <div class="foo-grids">
            <div class="col-md-4 footer-grid text-center">
                <blockquote>
                    <small>For centuries people exchanged goods and services off a barter system; it has only been
                        recently that so much emphasis has been placed on monetary exchanges. If you know what people
                        want then you can always negotiate a deal with them that favors both parties.
                    </small>
                </blockquote>
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
{{--            <div class="col-md-3 footer-grid">
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
                    <ul>
                        <li><span class="fa fa-map-marker brand-green"></span> Office Address to be available soon.</li>
                        <li><span class="fa fa-phone brand-green"></span> +2348159447655</li>
                        <li><span class="fa fa-envelope brand-green"></span> support@swapbybarter.com,  inquiries@swapbybarter.com</li>
                    </ul>
                </address>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="footer-logo">
                <a href="/"><span class="brand-yellow">{{ substr($appName,0,4) }}</span><span
                            class="brand-green">{{substr($appName,4)}}</span></a>
            </div>
            <div class="footer-social-icons">
                <ul>
                    <li><a class="facebook"
                           href="{{url('https://facebook.com/SwapByBarter')}}"><span>Facebook</span></a></li>
                    <li><a class="twitter" href="{{url('https://twitter.com/SwapByBarter')}}"><span>Twitter</span></a>
                    </li>
                </ul>
            </div>
            {{--            <div class="copyrights">
                            <p> © 2016 Resale. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
                        </div>--}}
            <div class="clearfix"></div>
        </div>
    </div>
</footer>