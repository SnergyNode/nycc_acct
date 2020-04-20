<?php

$sidebar['activity'] = 'active';
$title = 'New Sale';
$breadcrumb = [
    $title=>'',
    'Dashboard'=>route('dashboard')
];
$injectables = ['sale.script'];

?>

@extends('dashboard.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">

            @include('layouts.notify')
            <br>

            <h5>{{ $person->business->where('current', true)->first()->name }}</h5>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">New Sale Entry</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="{{ route('sales.store') }}">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="activityDate">Date <small class="text-muted"><i>leave empty if today</i></small></label>
                                        <input type="date" name="date" class="form-control" id="activityDate" placeholder="Select Date" value="{{ old('date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="activityValue">* Amount <small>(numbers)</small></label>
                                        <input type="text" class="form-control" id="activityValue" onkeypress="return isNumberKey(event);" name="amount" placeholder="Amount" autocomplete="off" value="{{ old('amount') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="activityValue" title="">* Type</label>
                                        <br>
                                        <input type="radio" name="type" required value="cash" class="ml-1 fieldMon_others"> Cash Sale
                                        <input type="radio" name="type" required value="credit" class="ml-4 fieldMon_others"> Credit Sale
                                        <input type="radio" name="type" required value="cash and credit" class="ml-4 fieldMon_others"> Cash and Credit Sale

                                        <div class="mt-1 otherField" style="display: none">
                                            <small class="text-muted">Enter Credit Value (numbers)</small>
                                            <input type="text" class="form-control" name="credit" onkeypress="return isNumberKey(event);" placeholder="Enter Credit Value Only" autocomplete="off" value="{{ old('others') }}" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="activityInfo">Details <small class="text-muted">(optional)</small></label>
                                        <textarea type="text" class="form-control" id="activityInfo" placeholder="Amount" autocomplete="off" name="details"> {{ old('details') }}</textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-primary">Update Record</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1">
                                <a href="{{ route('sales.index') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </span>

                                <div class="info-box-content">
                                    <h5 class="info-box-text p-2"><a href="{{ route('sales.index') }}">View Sales</a></h5>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>





        </div><!--/. container-fluid -->
    </section>

@endsection