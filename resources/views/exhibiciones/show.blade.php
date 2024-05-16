<x-layout
    title="{{$exhibicion->nombre}}"
>

<div class="text-center">
    <h2>{{$exhibicion->nombre}}</h2>
</div>

<div class="row">
    <div class="card p-3">
        @if ($pictures->count() != 0)
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($pictures as $key=>$picture)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
                            <img src="{{Storage::url($picture->hash)}}" class="d-block w-100" style="width:100%; height: 400px; object-fit: contain;" alt="...">
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img src="{{asset('assets/imgs/nf.jpg') }}" style="width:100%; height: 250px; object-fit: contain;">
        @endif

    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card px-3 pb-3">
            <div class="card-title text-center">
                Detalles
            </div>
            <div>
                <p><b>Inicio: </b>{{ Carbon\Carbon::parse($exhibicion->fecha_inicio)->format('d/m/Y') }}</p>

                <p><b>Fin: </b>{{ Carbon\Carbon::parse($exhibicion->fecha_fin)->format('d/m/Y') }}</p>

                <p><b>Lugar: </b>{{ $exhibicion->lugares->nombre }}</p>

                <p><b>Dirección: </b>{{ $exhibicion->lugares->direccion }}, {{ $exhibicion->lugares->municipios->nombre}}, Jalisco</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card px-3 pb-3">
            <div class="card-title text-center">
                Descripción
            </div>

            <div>
                {{ $exhibicion->descripcion }}
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div x-show="showMap" x-transition>
        <div id="map" class="m-3 p-3" style="height: 400px;"></div>
    </div>
</div>

<div class="flex justify-center m-3">
    <div class="text-center w-full">
        <form action="{{route('imagen.store')}}" class="dropzone mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="my-awesome-dropzone">
            @csrf
            <input type="hidden" name="imageable_id" id="imageable_id" value="{{$exhibicion->id}}">
            <input type="hidden" name="imageable_type" id="imageable_type" value="{{get_class($exhibicion)}}">
        </form>
    </div>
</div>

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            acceptedFiles: 'image/*',
            dictDefaultMessage: "Arrastra las imágenes aquí o haz clic para seleccionar",
        };
    </script>

    <script>
        var map = L.map('map').setView([{{$exhibicion->lugares->latitud}}, {{$exhibicion->lugares->longitud}}], 10);

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

            const lugLat = {{$exhibicion->lugares->latitud}};
            const lugLon = {{$exhibicion->lugares->longitud}}

            if(marker){
                map.removeLayer(marker);
                map.removeLayer(circle);
            }

            L.marker([lugLat, lugLon], {title:"{{$exhibicion->lugares->nombre}}"}).addTo(map);

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