<x-layout
    title="{{$evento->nombre}}"
>

    <div class="text-center">
        <h1>{{ $evento->nombre }}</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card px-3 pb-3">
                <div class="card-title text-center">
                    Detalles
                </div>
                <div>
                    <p><b>Inicio: </b>{{ Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y H:i') }}</p>

                    <p><b>Fin: </b>{{ Carbon\Carbon::parse($evento->fecha_fin)->format('d/m/Y H:i') }}</p>

                    <p><b>Lugar: </b>{{ $evento->lugares->nombre }}</p>

                    <p><b>Dirección: </b>{{ $evento->lugares->direccion }}, {{ $evento->lugares->municipios->nombre}}, Jalisco</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card px-3 pb-3">
                <div class="card-title text-center">
                    Descripción del evento
                </div>

                <div>
                    {{ $evento->descripcion }}
                </div>

                <div class="text-center">
                    <livewire:notificacion.crear
                        :evento="$evento"
                    />
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div x-show="showMap" x-transition>
            <div id="map" class="m-3 p-3" style="height: 400px;"></div>
        </div>
    </div>

    @section('js')
    <script>
        var map = L.map('map').setView([{{$evento->lugares->latitud}}, {{$evento->lugares->longitud}}], 10);

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

            const lugLat = {{$evento->lugares->latitud}};
            const lugLon = {{$evento->lugares->longitud}}

            if(marker){
                map.removeLayer(marker);
                map.removeLayer(circle);
            }

            //L.marker([{{$lugar->latitud}}, {{$lugar->longitud}}], {title:"{{$lugar->nombre}}"}).addTo(map);
            L.marker([lugLat, lugLon], {title:"{{$lugar->nombre}}"}).addTo(map);

            marker = L.marker([latitude, longitude], {title:"Ubicación actual"}).addTo(map);
            circle = L.circle([latitude, longitude], { radius: accuracy }).addTo(map);

            if(!zoomed){
                zoomed = map.fitBounds(circle.getBounds());
            }

            //map.setView([latitude, longitude]);
            map.setView([lugLat, lugLon]);
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

