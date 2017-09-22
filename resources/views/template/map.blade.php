@if($map)
<script>
    var map_{{ $map->id }};
    function init_map_{{ $map->id }}() {
        map_{{ $map->id }} = new google.maps.Map(document.getElementById('{{ isset($map_id) ? $map_id : ("map_" .$map->id) }}'), {
            zoom: {{ $map->zoom ?: 1 }},
            center: new google.maps.LatLng({{ $map->latitude ?: 0 }}, {{ $map->longitude ?: 0 }})
        });
        
        var results = {!! $main_map->json !!};
        @map_script($map, $map->after_script)
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.key') }}&callback=init_map_{{ $map->id }}"></script>
@endif