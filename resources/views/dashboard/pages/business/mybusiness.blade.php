<?php
$sidebar['my-business'] = 'active';
$title = 'My Business';
$breadcrumb = [

    'Home' => route('dashboard'),
    $title => '#'
]
?>
@extends('dashboard.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                @foreach($person->business as $bus)
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <a href="#">
                                <i class="fas fa-store"></i>
                            </a>
                        </span>

                            <div class="info-box-content">
                                <h4 class="info-box-text m-0 p-0">{{ $bus->name }}
                                    @if($bus->current)
                                        <small class="float-right" style="font-size: 12px"><i class="fa fa-check-circle text-success"></i> <i>Current</i></small>
                                    @endif
                                </h4>
                                <span class="info-box-text">{{ $bus->operation->name }}</span>
                                <p class="text-muted"><b>{{ $bus->typeof() }}</b></p>
                                <p class="text-muted">{{ $bus->info }}</p>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @endforeach


                    <div class="col-12 col-sm-12 col-md-3">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1">
                            {{--<a href="{{ route('new.business') }}">--}}
                                {{--<i class="fas fa-plus"></i>--}}
                            {{--</a>--}}
                            <a href="#">
                                <i class="fas fa-plus"></i>
                            </a>
                        </span>

                            <div class="info-box-content">
                                <h4 class="info-box-text m-1 p-5"><a href="#">New Business</a></h4>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>

                <div class="clearfix hidden-md-up"></div>

            </div>

        </div>
    </div>
@endsection