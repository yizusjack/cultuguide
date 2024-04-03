<x-layout
    title="{{$lugar->nombre}}"
>
    <div class="m-3">
        <h1>{{$lugar->nombre}}</h1>
        <div>
            <p>{!! nl2br($lugar->descripcion) !!}</p>
        </div>
    </div>

    <div id="map" style="height: 800px;"></div>

    @section('js')
        <script>
            var map = L.map('map').setView([{{$lugar->latitud}}, {{$lugar->longitud}}], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            let marker, circle, zoomed;

            navigator.geolocation.watchPosition(success, error);

            

            function success(position){
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                const accuracy = position.coords.accuracy;

                if(marker){
                    map.removeLayer(marker);
                    map.removeLayer(circle);
                }

                L.marker([{{$lugar->latitud}}, {{$lugar->longitud}}], {title:"{{$lugar->nombre}}"}).addTo(map);

                marker = L.marker([latitude, longitude], {title:"Ubicación actual"}).addTo(map);
                circle = L.circle([latitude, longitude], { radius: accuracy }).addTo(map);

                if(!zoomed){
                    zoomed = map.fitBounds(circle.getBounds());
                }

                map.setView([latitude, longitude]);
            }

            function error(error){
                if(error.code === 1){
                    alert('Se requieren permisos de ubicación');
                }
                else{
                    //alert('No se pudo mijo');
                }
            }

        </script>
    @endsection

</x-layout>