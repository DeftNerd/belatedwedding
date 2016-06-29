@extends('layouts.theme')

@section('content')

            <!--Content Area Start-->
            <div id="content">

                <!--Attending-section-start-->
                <section class="attending-class">
                    <div class="container">
                        <div class="row">
                            <div class="header-center">
                                <h4>You RSVP'd on {{ Carbon::parse($invitation->rsvp_at)->toFormattedDateString() }}</h4>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-xs-12 col-sm-10 col-sm-push-1">
                                <div class="rsvp-wrapper">
                                    <form name="form" method="post" action="/invite/{{$invitation->code}}">
                                    <h3>RSVP</h3>
                                    @if (!empty($invitation->rsvp_at))
                                        <span class="plz-cls">You RSVP'd on {{ Carbon::parse($invitation->rsvp_at)->toFormattedDateString() }}</span>
                                    @else
                                        <span class="plz-cls">Please RSVP as soon as possible! </span>

                                        <span class="plz-cls">You can invite up to {{ $invitation->guests_allowed }} guests. Leave the names blank if you don't need that many guests. Include an email address to receive updates about the wedding and links to the photos afterwards.</span>
                                    @endif
                                    <div class="inner-wrapper">

                                        {{ csrf_field() }}
                                        @foreach ($invitation->guests as $key => $guest)
                                        <div class="row">
                                            <div class="col-md-2"><h4>Guest {{ $key + 1 }}</h4></div>
                                            <div class="col-md-3 input-box">
                                                <input type="text" name="guest[{{$guest->id}}][name]" placeholder="Name" value="{{ $guest->name }}" class="form-control">
                                            </div>
                                            <div class="col-md-4 input-box">
                                                <input type="text" name="guest[{{$guest->id}}][email]" placeholder="Email" value="{{ $guest->email }}" class="form-control">
                                            </div>
                                            <div class="col-md-3 input-box">
                                                {!! Form::select("guest[$guest->id][meal_id]", $meals, $guest->meal_id, ['placeholder' => 'Choose a Dinner']) !!}
                                            </div>
                                        </div>
                                        @endforeach
                                        @for($i = $invitation->guests->count() + 1; $i <= $invitation->guests_allowed; $i++ ) 
                                        <div class="row">
                                            <div class="col-md-2">
                                                <h4>Guest {{ $i }}</h4>
                                            </div>
                                            <div class="col-md-3 input-box">
                                                <input type="text" name="new[{{$i}}][name]" placeholder="Name" class="form-control">
                                            </div>
                                            <div class="col-md-4 input-box">
                                                <input type="text" name="new[{{$i}}][email]" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="col-md-3 input-box">
                                                {!! Form::select("new[$i][meal_id]", $meals, NULL, ['placeholder' => 'Choose a Dinner']) !!}
                                            </div>
                                        </div>
                                        @endfor
                                        <span class="notes">If you could wish anything for the couple, what would it be?</span><br />
                                        <textarea name="wish"></textarea>
                                        <button name="is_attending" value="true">We can attend</button>
                                        <button name="is_attending" value="false">We can't make it</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Attending-section-end-->

                <!--wedding-event section start here -->
                <section class="wedding-event" id="event">
                    <div class="wedding-event-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="header-center">
                                        <h2>Wedding Events</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row padding-right">
                            <div class="col-xs-12 col-md-7 col-sm-7">
                                <figure>
                                    <img src="/assets/images/chapel.jpg" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-md-pull-1 col-md-5 col-sm-pull-2 col-sm-5">
                                <div class="event-description-wrapper">
                                    <div class="event-description">
                                        <h3><a href="#">Main Ceremony</a></h3>
                                        <span class="day-class">Sunday, July 24th, 2016</span>
                                        <span class="clk-class">1:30 PM - 3:00 PM</span>
                                        <address>
                                            <span class="map-class">Chapel Dulcinea</span>
                                            <span class="venue-class">16221 Crystal Hills Drive Austin, TX 78737</span>
                                        </address>
                                        <p>
                                            Be sure to register at the Welcome Center upon arrival. They'll direct you to the chapel. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row padding-right">
                            <div class="col-xs-12 col-md-5 col-sm-5 push">
                                <div class="event-description-wrapper reception-description-sec">
                                    <div class="event-description">
                                        <h3><a href="#">Reception</a></h3>

                                        <span class="day-class">Sunday, July 24th, 2016</span>
                                        <span class="clk-class">3:30 PM - 10:30 PM</span>
                                        <address>
                                            <span class="map-class">Brown Family Ranch</span>
                                            <span class="venue-class">13484 Avis Rd, Dale, TX 78616</span>
                                        </address>
                                        <p>
                                            Newly rebuilt, the Brown Family ranch house will host our reception party. Look for a sign with balloons on the right side of Avis Rd so you don't miss the entrance!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-7 col-sm-7 ">
                                <figure>
                                    <img src="/assets/images/ranch.jpg" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
                <!--wedding-event section end here -->


                <!--Count-down section start here -->
                <div class="count-down">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="clearfix" id="countdown">
                                    <li>
                                        <a href="#">120<span>Days</span></a>
                                    </li>
                                    <li>
                                        <a href="#">12<span>Hours</span></a>
                                    </li>
                                    <li>
                                        <a href="#">16<span>Minutes</span></a>
                                    </li>
                                    <li>
                                        <a href="#">30<span>Seconds</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Count-down section end here -->



                @if (count($wishes) > 0)
                <!--friend-wishes section start here -->
                <section class="friend-wishes">
                    <div class="container">
                        <div class="row">
                            <div class="header-center">
                                <h2>Friends Wishes</h2>
                            </div>
                        </div>
                        <div class="wishes clearfix">
                            <div class="row">
                                <div id="people-thought">
                                    @foreach ($wishes as $wish)
                                    <div class="item">
                                        <div class="quoto">
                                            <div class="para-wrapper">
                                                <p>{{ $wish->message }}
                                                </p>
                                            </div>
                                            <div class="overlay clearfix">
                                                <span class="profile-info"> <strong>{{ $wish->from }}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--friend-wishes section end here -->

                @endif

                <!--wedding-gift section start-->
                <section class="wedding-gift">
                    <div class="container">
                        <div class="row text-center">
                            <div class="header-center">
                                <h2>Wedding Gifts</h2>
                            </div>
                            <div class="sub-para">
                                <p>
                                    We're moving cross-country in the upcoming months and the less stuff we have the easier it'll be to relocate. The best wedding gift we could hope to receive is money or gift cards.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="wedding-section-gift">
                        <div class="container">
                            <div id="wedding-item">
                                <div class="item">
                                    <div class="gift-class">
                                        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QFSPXLZ2YLNDE"><img src="/assets/images/paypal.png" alt=""/></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="gift-class">
                                        <a href="https://www.coinbase.com/deftnerd"><img src="/assets/images/bitcoin.png" alt=""/></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="gift-class">
                                        <a href="https://www.amazon.com/wedding/bethany-duke-adam-brown-austin-july-2016/registry/3HUR9BKRSZ6SO"><img src="/assets/images/amazon.png" alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--wedding-gift-section end-->

            </div>
            <!--Content Area End-->

@endsection
