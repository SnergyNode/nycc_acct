<?php
$title = 'Create Business';
$breadcrumb = [
    'Home'=>route('dashboard'),
    'My Business'=>route('mybusiness'),
    $title =>'#',
]
?>
@extends('dashboard.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">

            <p class="text-muted">Welcome to NYCC Accounting Application. Quickly setup your Business.</p>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Add Business </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('set.business1') }}" method="post">
                    {{ csrf_field() }}

                    <div class="card-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Business Name</label>
                                    <input type="text" name="name" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <label for="">Business Type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="sole_proprietorship">Sole Proprietor (My Business)</option>
                                        <option value="partnership">Partnership </option>
                                        <option value="corporation">Corporation (Enterprise) </option>
                                    </select>
                                </div>



                                <div class="col-12">
                                    <label for="">Brief Information on your business</label>
                                    <textarea name="info" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                        <button type="submit" class="btn btn-sm btn-primary float-right">Save and Proceed</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection