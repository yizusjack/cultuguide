<x-layout
    title="{{$lugar->nombre}}"
>
    <div class="m-3 p-3">
        <div class="text-center">
            <h2>{{$lugar->nombre}}</h2>
        </div>

        <div class="mb-2">
            <livewire:acciones.acciones-lugar
                :lugar="$lugar"
            />
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    @if ($pictures->count() != 0)
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($pictures as $key=>$picture)
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
                                        <img src="{{Storage::url($picture->hash)}}" class="d-block w-100" style="width:100%; height: 250px; object-fit: contain;" alt="...">
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

            <div class="col-md-8">
                <div class="card p-3" style="height: 280px;">
                    <div class="card-title text-center">
                        Información
                    </div>

                    <div class="overflow-auto">
                        {!! nl2br($lugar->descripcion) !!}
                    </div>

                    <div class="mt-2">
                        <b>Horario: </b> {{$horaAp}} a {{$horaCie}}
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-2">
                    <div class="card-title text-center">
                        Costos
                    </div>
                    <div style="height: 493px;">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Costo</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($costos as $costo)
                                    <tr>
                                        <th scope="row">{{ $costo->categoria }}</th>
                                        <td>${{number_format($costo->costo), 2}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>

                        @if($costosMercado->count() > 0)
                            <div class="m-1">
                                <form class="space-y-6" action="{{ route('mercadopago.generarOrdenEntrada') }}" method="POST">
                                    @csrf

                                    <div>
                                        <label for="costo_id">Seleccione el tipo de entrada:</label>
                                        <select id="costo_id" name="costo_id" class="form-control">
                                        @foreach ($costosMercado as $costo)
                                            <option value="{{ $costo->id }}"
                                            @if ($loop->first)
                                                selected
                                            @endif
                                            >
                                            {{ $costo->categoria }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="flex justify-center">
                                        <button type="submit" class="btn btn-success flex-fill">Proceder al cobro</button>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-2">
                    <div class="card-title text-center">
                        ¿Cómo llegar?
                    </div>
                    <div>{{$lugar->direccion}}. {{$lugar->municipios->nombre}}, Jalisco</div>
                    <div x-data='{showMap: true}'>
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                              <button x-on:click="showMap = true" class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Mapa</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                              <button x-on:click="showMap = false" class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">Rutas</button>
                            </li>
                          </ul>

                          <div x-show="showMap" x-transition>
                            <div id="map" class="m-3 p-3" style="height: 400px;"></div>
                          </div>

                          <div x-show="! showMap" x-transition>
                            <div  class="m-3 p-3" style="height: 400px;">
                                <h5>Rutas cercanas:</h5>

                                <div>
                                    @if ($lugar->rutas()->count() > 0)
                                    <ul class="list-group">
                                        @foreach ($lugar->rutas as $ruta)
                                            <li class="list-group-item">
                                                {{$ruta->ruta_actual}} {{ $ruta->ruta_antigua != '-' ? '(' . $ruta->ruta_antigua . ')' : '' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    @else
                                        No hay rutas ligadas
                                    @endif
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row p-2">
            <div class="card">
                <div class="card-title text-center">
                    Administrar rutas
                </div>

                <div>
                    <form class="row m-3" action="{{route('ruta.asignar', $lugar)}}" method="POST">
                        @csrf
                        <div class="col-12">
                            <select name="ruta_id[]" class="form-select" multiple class="form-control">
                                @foreach ($rutas as $ruta)
                                    <option value="{{ $ruta->id }}"
                                        @selected(array_search($ruta->id, $lugar->rutas()->pluck('rutas.id')->toArray()) !== false)
                                    >
                                        {{$ruta->ruta_actual}} {{ $ruta->ruta_antigua != '-' ? '(' . $ruta->ruta_antigua . ')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="text-center m-2">
                          <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

        <div class="p-3">
            <h2>
                Exhibiciones en este lugar
            </h2>

            <livewire:listados.exhibiciones-list
                :lugar="$lugar"
            />
        </div>

        <div class="row p-2">
            <div class="card p-2">
                <div class="card-title text-center">
                    ¿La información no coincide?
                </div>
                <div>
                    <form action="{{ route('reclamo.store', $lugar) }}" method="POST">
                        @csrf

                        <x-forms.textArea
                            name="contenido"
                            label="Deja tu reclamo"
                            required
                        />

                        <div class="text-center m-2">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>

                    <span>Tus reclamos nos ayudan a mejorar nuestro servicio</span>
                </div>
            </div>
        </div>

        <livewire:comentarios :lugares_id="$lugar->id" />

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
            var map = L.map('map').setView([{{$lugar->latitud}}, {{$lugar->longitud}}], 10);

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

                const lugLat = {{$lugar->latitud}};
                const lugLon = {{$lugar->longitud}}

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
