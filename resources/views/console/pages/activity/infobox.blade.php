<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <a href="{{ route('sales.create') }}">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('sales.index') }}">View Sales</a></span>
                <span class="info-box-number">{{ $sales }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <a href="{{ route('purchase.create') }}">
                    <i class="fas fa-box"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('purchase.index') }}">View Purchases</a></span>
                <span class="info-box-number">
                  {{ $purchase }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-dark elevation-1">
                <a href="{{ route('expense.create') }}">
                    <i class="fas fa-money-bill-alt"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('expense.index') }}">View Expenses</a></span>
                <span class="info-box-number">
                  {{ $expense }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <a href="{{ route('transaction') }}">
                    <i class="fas fa-list"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('transaction') }}">View Transactions</a></span>
                <span class="info-box-number">
                  {{ $trans }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

</div>