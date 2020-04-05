<?php

$sidebar['new_activity'] = 'active';
$title = 'Expenses';
$breadcrumb = [
    $title=>'',
    "Activity"=>route('activities'),
    'Dashboard'=>route('dashboard')
];

?>

@extends('dashboard.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>

            <h5>{{ $person->business->where('current', true)->first()->name }}</h5>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-dark">
                        <div class="card-header ">
                            <h3 class="card-title">Recent Expenses</h3>

                            {{--@include('dashboard.pages.sale.search')--}}

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Narration</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($expenses as $expense)
                                    <tr>
                                        <td>{{ date('F d, Y', $expense->date) }}</td>
                                        <td><span class="">{{ number_format($expense->amount, 2) }}</span></td>
                                        <td>{{ $expense->details }}</td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="3"><h5 class="text-center">No Records Found</h5></td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>


                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            {{ $expenses->links() }}

            

        </div><!--/. container-fluid -->
    </section>

@endsection