<?php

$sidebar['dashboard'] = 'active';
$title = 'Dashboard ';
$breadcrumb = [
    $title=>'',
];

?>

@extends('console.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('layouts.notify')
            <!-- Info boxes -->
            @include('console.pages.home.infobox')
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>

@endsection