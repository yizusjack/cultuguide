<x-layout
    title="{{$lugar->nombre}}"
>
    <div class="m-3">
        <h1>{{$lugar->nombre}}</h1>
        <div>
            <p>{!! nl2br($lugar->descripcion) !!}</p>
        </div>
    </div>

    <div class="flex justify-center m-3">
        <div class="text-center w-full">
            <form action="{{route('imagen.store')}}" class="dropzone mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="my-awesome-dropzone">
                @csrf
                <input type="hidden" name="imageable_id" id="imageable_id" value="{{$lugar->id}}">
                <input type="hidden" name="imageable_type" id="imageable_type" value="{{get_class($lugar)}}">
            </form>
        </div>
    </div>

    <div id="map" style="height: 800px;"></div>

    @section('js')
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script>
            Dropzone.options.myAwesomeDropzone = {
                acceptedFiles: 'image/*',
                dictDefaultMessage: "Arrastra las imágenes aquí o haz clic para seleccionar",
            };
        </script>

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
    
    <livewire:comentarios :lugares_id="$lugar->id" />

</x-layout>