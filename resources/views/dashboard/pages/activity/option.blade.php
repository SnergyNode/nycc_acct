<?php

$sidebar['new_activity'] = 'active';
$title = 'New Activity ';
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
            <div class="row">

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <a href="{{ route('sales.create') }}">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </span>
                        <div class="info-box-content">
                            <h5 class="info-box-text p-2"><a href="{{ route('sales.create') }}">New Sales</a></h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <a href="{{ route('purchase.create') }}">
                    <i class="fas fa-box"></i>
                </a>
            </span>

                        <div class="info-box-content">
                            <h5 class="info-box-text p-2"><a href="{{ route('purchase.create') }}">New Purchases</a></h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
            <span class="info-box-icon bg-dark elevation-1">
                <a href="{{ route('expense.create') }}">
                    <i class="fas fa-dollar-sign"></i>
                </a>
            </span>

                        <div class="info-box-content">
                            <h5 class="info-box-text p-2"><a href="{{ route('expense.create') }}">New Expenses</a></h5>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->
            <br>


            <h5>Active Business</h5>
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
                                <h4 class="info-box-text m-0 p-0">{{ $bus->name }}</h4>
                                <span class="info-box-text">{{ $bus->operation->name }}</span>
                                <p class="text-muted"><b>{{ $bus->typeof() }}</b></p>
                                <div class="">
                                    @if($bus->current)
                                        <a href="#" class="btn btn-sm btn-primary" disabled>Currently Active for Entries</a>
                                    @else
                                        <a href="{{ route('make.bus.current', $bus->unid) }}" class="btn btn-sm btn-outline-primary">Make Current for Entries</a>
                                    @endif
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @endforeach

            </div>

        </div><!--/. container-fluid -->
    </section>

@endsection