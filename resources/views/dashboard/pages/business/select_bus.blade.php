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

            <p class="text-muted">Almost Done. Choose your Business Productivity Type.</p>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Select Business Operation Model</h3>

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
                <div class="card-body">

                    <small class="text-muted">Consider carefully before choosing an option. It is not reversible</small>
                    <br>
                    <br>
                    <div class="row">

                        @forelse($operations as $operation)
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h3 class="text-muted">{{ $operation->name }}</h3>
                                        <hr>
                                        <p class="" style="height: 80px">
                                            {{ $operation->info }}
                                        </p>

                                        <a href="{{ route('set.business2', [$bus_id, $operation->code_name]) }}" class="btn btn-outline-secondary btn-block"> Use {{ $operation->name }} </a>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h5 class="text-muted text-center">No Active Business Models Found.</h5>
                        @endforelse

                    </div>

                    <!-- /.table-responsive -->
                </div>

            </div>
        </div>
    </div>
@endsection