<?php
    $isactive['home'] = 'active';
?>
@extends('layouts.app')

@section('content')


    @include('pages.home.home')

    @include('pages.home.service')

    @include('pages.home.about')

    @include('pages.home.features')

    @include('pages.home.funfact')

    {{--@include('pages.home.screenshot')--}}

    @include('pages.home.download')

    {{--@include('pages.home.pricing')--}}

    {{--@include('pages.home.newsletter')--}}

    {{--@include('pages.home.review')--}}

    {{--@include('pages.home.blog')--}}

    @include('pages.home.icon_slide')

    @include('pages.home.map')

    @include('pages.home.contact')


@endsection
