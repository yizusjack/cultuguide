<x-layout
    title="Editar {{$lugar->nombre}}"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Editar {{$lugar->nombre}}</h1>

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

                <x-forms.textarea
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
                        <x-forms.select
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
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Enviar</button>
                </div>
                
            </form>

    </div>

</x-layout>