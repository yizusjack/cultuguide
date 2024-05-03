<x-layout
    title="Editar {{$lugar->nombre}}"
>
    <div class="m-3 p-3 space-y-12">
            <h2>Editar {{$lugar->nombre}}</h2>

            <form action="{{route('lugar.update', $lugar)}}" method="POST">
                @csrf
                @method('PATCH')

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre del lugar"
                    :value="$lugar->nombre"
                    required
                />

                <x-forms.textArea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción del lugar"
                    :value="$lugar->descripcion"
                    required
                />

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="latitud"
                            label="Latitud: "
                            placeholder="Ingrese la latitud"
                            type="number"
                            step="any"
                            :value="$lugar->latitud"
                            required
                        />
                    </div>
                    
                    <div>
                        <x-forms.normalInput
                            name="longitud"
                            label="Longitud: "
                            placeholder="Ingrese la longitud"
                            type="number"
                            step="any"
                            :value="$lugar->longitud"
                            required
                        />
                    </div>

                </div>


                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="direccion"
                            label="Dirección: "
                            placeholder="Ingrese la dirección"
                            :value="$lugar->direccion"
                            required
                        />
                    </div>

                    <div>
                        <x-forms.selectInput
                            name="municipios_id"
                            label="Municipio: "
                            placeholder="Seleccione el municipio de locación"
                            :options="$municipios"
                            attributeName="nombre"
                            :selected="$lugar->municipios_id"
                            required
                        />
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                
            </form>

    </div>

</x-layout>