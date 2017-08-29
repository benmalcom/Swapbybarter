@extends('frontend.layouts.default')
@section('content')
    @include('frontend.layouts.partials.home-banner')

    <!-- Terms of use -->
    <div class="contact main-grid-border">
        <div class="container">
            <h2 class="head text-center">Contact Us</h2>
            <section id="hire">
                <form id="filldetails">
                    <div class="field name-box">
                        <input type="text" id="name" name="name" placeholder="Who Are You? Your name"/>
                        <label for="name">Name</label>
                        <span class="ss-icon">check</span>
                    </div>

                    <div class="field email-box">
                        <input type="text" id="email" name="email" placeholder="example@email.com"/>
                        <label for="email">Email</label>
                        <span class="ss-icon">check</span>
                    </div>
                    <div class="field msg-box">
                        <textarea name="message_body" id="msg" rows="4" placeholder="Your message goes here..."/></textarea>
                        <label for="msg">Your Msg</label>
                        <span class="ss-icon">check</span>
                    </div>
                    <input class="button" type="submit" value="Send" />



                </form>
            </section>
        </div>
    </div>
@endsection