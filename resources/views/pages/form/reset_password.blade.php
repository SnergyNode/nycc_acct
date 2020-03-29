<?php
$title = "Login";
$isactive['login'] = 'active';
?>
@extends('layouts.app')

@section('content')

    <div id="home-area" class="main-slider-area bg-oapcity-40 bg-img-1 sm-height-none">
        <div class=" vh-100 " style="margin: 100px auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <div class="contact-from gray-bg">

                            <h3 class="text-center mb-4">Login</h3>
                            <br>
                            @include('layouts.notify')
                            <form id="contact-form" action="{{ route('reset.lost.pass',[$user->unid, $user->reset_token]) }}" method="post">
                                {{ csrf_field() }}

                                <input name="password" type="password" placeholder="password" required>
                                <input name="confirm_password" type="password" placeholder="confirm password" required>
                                <button class="submit" type="submit">Reset Password</button>
                                <br>
                                <br>
                                <div class="row mt-4">
                                    <div class="col-md-6"><a href="{{ route('login') }}" class="float-left pl-4">Login</a></div>
                                    <div class="col-md-6"><a href="{{ route('register') }}" class="float-right pr-4 ">Sign Up</a></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
