<?php

$sidebar['activity'] = 'active';
$title = 'Transactions';
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

            <?php $tableTitle = "Transactions"; ?>
            @include('dashboard.pages.transaction.table')

            {{ $transactions->links() }}

            

        </div><!--/. container-fluid -->
    </section>

@endsection