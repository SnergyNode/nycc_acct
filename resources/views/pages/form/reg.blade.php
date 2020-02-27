<?php
$title = "Sign Up";
?>
@extends('layouts.app')

@section('content')

    <div id="home-area" class="main-slider-area bg-oapcity-40 bg-img-1 sm-height-none">
        <div class=" vh-100 " style="margin: 100px auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <div class="contact-from gray-bg">

                            <h3 class="text-center mb-4">Sign Up for FREE</h3>
                            @include('layouts.notify')
                            <br>
                            <form id="contact-form" action="{{ route('submit.reg.form') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6"><input name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}" required></div>
                                    <div class="col-md-6"><input name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}" required></div>
                                </div>
                                <input name="email" type="text" placeholder="Email" value="{{ old('email') }}" required>
                                <input name="phone" type="text" placeholder="Phone Number" required value="{{ old('phone') }}">
                                <div class="row">
                                    <div class="col-md-6"><input name="password" type="password" placeholder="Password" value="{{ old('password') }}" required></div>
                                    <div class="col-md-6"><input name="password_confirm" type="password" placeholder="Confirm Password" value="{{ old('password_confirm') }}" required></div>
                                </div>
                                <button class="submit" type="submit">SUBMIT</button>

                                <br>
                                <br>
                                <div class=""><a href="{{ route('login') }}" class="text-center pl-4">Login</a></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
