@extends('frontend.layouts.default')
@section('content')
    <div class="banner text-center">
        <div class="container">
            <h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with Resale</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            <a href="post-ad.html">Post Free Ad</a>
        </div>
    </div>
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