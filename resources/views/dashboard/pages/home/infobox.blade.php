<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <a href="{{ route('activities') }}">
                    <i class="fas fa-star"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('activities') }}">Activities</a></span>
                <span class="info-box-number">{{ $activity }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <a href="{{ route('mybusiness') }}">
                    <i class="fas fa-store"></i>
                </a>
            </span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{ route('mybusiness') }}">My Business</a></span>
                <span class="info-box-number">
                  {{ $person->businessIndex() }}
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