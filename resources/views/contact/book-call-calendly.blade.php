@extends('layouts.app')

@section('title','Al-rushd Online School - Book a Call')

@section('content')
<a href="{{ route('book-a-call') }}" class="logo d-flex align-items-center m-auto" style="background: #f6f9fc;padding-top:10px;padding-bottom:10px;">
    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
</a>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 m-auto">
                <h3 class="page-title">How would you like to get in touch?</h3>

                <ul class="nav nav-pills justify-content-center gap-3" id="customTab" role="tablist">
                    <!-- Book A Call -->
                    <li class="nav-item">
                        <a class="nav-link active custom-btn first-btn" href="{{ route('book-a-call') }}">
                            Book A Call
                        </a>
                    </li>

                    <!-- Enquire Now -->
                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('enquire-now') }}">
                            Enquire Now
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('open-event') }}">
                            Attend an Open Event
                        </a>
                    </li>

                    <!-- Referral -->
                    <li class="nav-item">
                        <a class="nav-link custom-btn" href="{{ route('referral') }}">
                            Referral
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="row mt-4">

            <div class="col-lg-6 col-12 mb-3">
                
                <div id="calendarWrapper">
                    <div class="calendar-card p-2">
                        <div class="calendly-inline-widget" data-url="https://calendly.com/borkatullah2042/30min?background_color=0c2a58&text_color=ffffff&primary_color=ffffff" style="height:775px;"></div>
                        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-6 col-12 mb-3">

                <div class="card">
                    <div class="card-body">
                        <div class="text-light book_a_call_text">
                            <p class="">For immediate assistance, <br>you may Call us on <br><span style="color: #AE9A66;">+442036330757</span></p>
                            <p>Our hotline is open from Monday to <br><span style="color: #AE9A66;">Friday, 8:30 am – 6:00 pm.</span></p>
                            <p>Alternatively, we recommend that <br> you still book a call on our site and <br> complete the contact form.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

</section>


@endsection