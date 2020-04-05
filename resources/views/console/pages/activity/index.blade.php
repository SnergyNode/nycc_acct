<?php

$sidebar['activity'] = 'active';
$title = 'Activity ';
$breadcrumb = [
    $title=>'',
    'Dashboard'=>route('dashboard')
];

?>

@extends('dashboard.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('layouts.notify')
            <!-- Info boxes -->
            @include('dashboard.pages.activity.infobox')
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>

@endsection