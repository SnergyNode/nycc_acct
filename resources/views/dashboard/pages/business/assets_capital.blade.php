<?php
$title = 'Setup Business';
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

            <p class="text-muted">Almost Done. Update your Business Capital and Assets.</p>
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Update Business </h3>

                </div>
            @include('layouts.notify')
                <!-- /.card-header -->
                <div class="card-body">

                    <p><small class="text-muted">Update business  Assets, capital and liabilities. Use UPDATE to add records. When satisfied, click the complete button bellow.</small></p>
                    <p><small class="text-muted">If there are no assets or capital, you may still click the complete button.</small></p>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <h5 class=" btn-dark p-2">Assets</h5>
                            <div id="accordion">
                                @forelse($assets as $asset)
                                    <div class="card shadow-sm">
                                        <div class="card-header p-1" id="heading{{ $asset->id }}" style="background-color: #F4F6F9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#{{ $asset->unid }}" aria-expanded="false" aria-controls="{{ $asset->unid }}">
                                                    <b class="text-dark">{{ ucfirst($asset->name) }}</b>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="{{ $asset->unid }}" class="collapse" aria-labelledby="heading{{ $asset->id }}" data-parent="#accordion">
                                            <div class="card-body p-3">
                                                Amount: {{ number_format($asset->amount, 2) }}
                                                <br>
                                                {{ $asset->details }}
                                                <br>
                                                <a href="#" class="btn btn-sm btn-outline-danger">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center">No Assets</p>
                                @endforelse
                            </div>


                            <h5 class="mt-3 btn-dark p-2">Capitals</h5>
                            <div id="accordion">
                                @forelse($capitals as $capital)
                                    <div class="card shadow-sm">
                                        <div class="card-header p-1" id="heading{{ $capital->id }}" style="background-color: #F4F6F9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#{{ $capital->unid }}" aria-expanded="false" aria-controls="{{ $capital->unid }}">
                                                    <b class="text-dark">{{ ucfirst($capital->name) }}</b>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="{{ $capital->unid }}" class="collapse" aria-labelledby="heading{{ $capital->id }}" data-parent="#accordion">
                                            <div class="card-body p-3">
                                                Amount: {{ number_format($capital->amount, 2) }}
                                                <br>
                                                {{ $capital->details }}
                                                <br>
                                                <a href="#" class="btn btn-sm btn-outline-danger">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center">No Capital</p>
                                @endforelse
                            </div>

                            <h5 class="mt-3 btn-dark p-2">Liabilities</h5>
                            <div id="accordion">
                                @forelse($liabilities as $liability)
                                    <div class="card shadow-sm">
                                        <div class="card-header p-1" id="heading{{ $liability->id }}" style="background-color: #F4F6F9">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#{{ $liability->unid }}" aria-expanded="false" aria-controls="{{ $liability->unid }}">
                                                    <b class="text-dark">{{ ucfirst($liability->name) }}</b>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="{{ $liability->unid }}" class="collapse" aria-labelledby="heading{{ $liability->id }}" data-parent="#accordion">
                                            <div class="card-body p-3">
                                                Amount: {{ number_format($liability->amount, 2) }}
                                                <br>
                                                {{ $liability->details }}
                                                <br>
                                                <a href="#" class="btn btn-sm btn-outline-danger">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center">No Liabilities</p>
                                @endforelse
                            </div>


                        </div>
                        <div class="col-md-6 col-sm-12">

                            <form action="{{ route('update.assets_capital',$bus_id ) }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">

                                    <h5 class=" btn-dark p-2"> <i class="fa fa-star text-white" style="font-size: 11px"></i> Update Type</h5>
                                    <select name="type" id="" class="form-control" required="required">
                                        <option value="" disabled selected>Select an Option</option>
                                        <option value="asset">Assets</option>
                                        <option value="capital">Capital</option>
                                        <option value="liability">Liability</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">* Title | Name</label>
                                    <input class="form-control" type="text" placeholder="Title or Name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="">* Value (money value)</label>
                                    <input class="form-control" type="text" placeholder="Value in money terms" name="amount" value="{{ old('amount') }}" autocomplete="off" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Details</label>
                                    <textarea rows="2" class="form-control" type="text" placeholder="Details (optional)" name="details" autocomplete="off">{{ old('details') }}</textarea>
                                </div>

                                <button class="btn btn-dark btn-sm btn-block" type="submit">Update</button>
                            </form>

                        </div>
                    </div>



                    <!-- /.table-responsive -->

                    <hr class="mt-5">
                    <a href="{{ route('complete.bus.setup', $bus_id) }}" class="btn btn-outline-dark btn-block">Complete </a>
                </div>

            </div>
        </div>
    </div>
@endsection