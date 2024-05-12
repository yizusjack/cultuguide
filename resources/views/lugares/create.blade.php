<x-layout
    title="Crear lugares"
>

    <section id="service" class="section pt-0">
        <div class="m-3 p-100">
            <div>
                <h2>Crear lugares</h2>
            </div>

            <form action="{{route('lugar.store')}}" method="POST">
                @csrf

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre del lugar"
                    required
                />

                <x-forms.textArea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción del lugar"
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
                            required
                        />
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="horario_apertura"
                            label="Horario de Apertura: "
                            type="time"
                            required
                        />
                    </div>

                    <div>
                        <x-forms.normalInput
                            name="horario_cierre"
                            label="Horario de Cierre: "
                            type="time"
                            required
                        />
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                
            </form>
        
        </div>

    </section>
</x-layout>
