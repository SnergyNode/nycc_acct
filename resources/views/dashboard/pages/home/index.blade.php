<?php

$sidebar['dashboard'] = 'active';
$title = 'Dashboard ';
$breadcrumb = [
    $title=>'',
];

?>

@extends('dashboard.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('layouts.notify')
            <!-- Info boxes -->
            @include('dashboard.pages.home.infobox')
            <!-- /.row -->
                <?php $tableTitle = "Recent Transactions for ".$person->currentBusiness(); ?>
            @include('dashboard.pages.transaction.table')

            {{ $transactions->links() }}


        </div><!--/. container-fluid -->
    </section>

@endsection