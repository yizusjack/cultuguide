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
        <div class="col-span-full w-1/4">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                </div>
            </div>
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