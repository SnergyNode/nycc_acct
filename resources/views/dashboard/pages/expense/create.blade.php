<?php

$sidebar['new_activity'] = 'active';
$title = 'New Expense';
$breadcrumb = [
    $title=>'',
    'Dashboard'=>route('dashboard')
];

$injectables = ['expense.script'];

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
                            <h3 class="card-title">New Expense Entry</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="{{ route('expense.store') }}">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="activityDate">Date <small class="text-muted"><i>leave empty if today</i></small></label>
                                        <input type="date" name="date" class="form-control" id="activityDate" placeholder="Select Date" value="{{ old('date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="activityValue">* Amount</label>
                                        <input type="text" class="form-control" id="activityValue" name="amount" placeholder="Amount" autocomplete="off" value="{{ old('amount') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="activityValue" title="">* Type</label>
                                        <br>
                                        <input type="radio" name="type" required value="paid" class="ml-1 fieldMon_others"> Paid
                                        <input type="radio" name="type" required value="yet_to" class="ml-4 fieldMon_others"> Yet to Pay
                                        <input type="radio" name="type" required value="paid_ad" class="ml-4 fieldMon_others"> Paid in Advance
                                        <input type="radio" name="type" required value="other" class="ml-4 fieldMon_others"> Others

                                        <div class="mt-1 otherField" style="display: none">
                                            <input type="text" class="form-control" name="other" placeholder="Other Title" autocomplete="off" value="{{ old('others') }}" >
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
                            <span class="info-box-icon bg-dark elevation-1">
                                <a href="{{ route('expense.index') }}">
                                    <i class="fas fa-money-bill-alt"></i>
                                </a>
                            </span>

                                <div class="info-box-content">
                                    <h5 class="info-box-text p-2"><a href="{{ route('expense.index') }}">View Expenses</a></h5>

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