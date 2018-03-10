<div class="col-lg-12 my-3">
    <h4 class="col-lg-12 text-center">
        <img src="{{ asset('images/location.png') }}">
        @if($data->postal_code !== ""){{$data->postal_code . ','}} @endif{{$data->city}}
    </h4>
    <div id="map" class="map col-lg-12"></div>
</div>

<script>
    $(function () {
        maps('{{ $data->lat }}', '{{ $data->lon }}', '{{ $data->city }}');
    })
</script>