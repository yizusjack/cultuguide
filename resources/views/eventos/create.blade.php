<x-layout
    title="Crear eventos"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Crear eventos</h1>

            <form action="{{route('evento.store')}}" method="POST">
                @csrf

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre del evento"
                    required
                />

                <x-forms.textArea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción del evento"
                    required
                />

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="fecha_inicio"
                            label="Fecha de inicio: "
                            type="date"
                            required
                        />
                    </div>

                    <div>
                        <x-forms.normalInput
                            name="fecha_fin"
                            label="Fecha de finalización: "
                            type="date"
                            required
                        />
                    </div>

                    <div>
                        <x-forms.selectInput
                            name="lugares_id"
                            label="Lugar del evento: "
                            placeholder="Seleccione el lugar del evento"
                            :options="$lugares"
                            attributeName="nombre"
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
