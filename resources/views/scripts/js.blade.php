
<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

<!-- jquery
		============================================ -->
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ asset('js/plugins.js') }}"></script>


@if(!empty($scripts))
    @foreach($scripts as $script)
        <script src="{{ asset($script) }}"></script>
    @endforeach
@endif


<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qDiT4MyM7IxaGPbQyLnMjVUsJck02N0"></script>
<script>
    var myCenter = new google.maps.LatLng(30.249796, -97.754667);

    function initialize() {
        var mapProp = {
            center: myCenter,
            scrollwheel: false,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("hastech"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
            animation: google.maps.Animation.BOUNCE,
            icon: 'img/map-marker.png',
            map: map,
        });
        var styles = [{
            stylers: [{
                hue: "#c5c5c5"
            },
                {
                    saturation: -100
                }
            ]
        }, ];
        map.setOptions({
            styles: styles
        });
        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<!-- main JS
    ============================================ -->
<script src="{{ asset('js/main.js') }}"></script>
