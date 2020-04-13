<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('admin/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
{{--<script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>--}}
{{--<script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>--}}
<!-- ChartJS -->
{{--<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>--}}

{{--<!-- PAGE SCRIPTS -->--}}
{{--<script src="{{ asset('admin/js/dashboard2.js') }}"></script>--}}

@if(!empty($injectables))
    @foreach($injectables as $injectable)
        @include('dashboard.pages.'.$injectable)
    @endforeach
@endif