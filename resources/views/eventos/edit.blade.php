<x-layout
    title="Editar {{$evento->nombre}}"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Editar {{$evento->nombre}}</h1>

            <form action="{{route('evento.update', $evento)}}" method="POST">
                @csrf
                @method('PATCH')

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre del evento"
                    :value="$evento->nombre"
                    required
                />

                <x-forms.textArea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción del evento"
                    :value="$evento->descripcion"
                    required
                />

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="fecha_inicio"
                            label="Fecha de inicio: "
                            :value="$fecha_inicio"
                            type="date"
                            required
                        />
                    </div>

                    <div>
                        <x-forms.normalInput
                            name="fecha_fin"
                            label="Fecha de finalización: "
                            :value="$fecha_fin"
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
                            :selected="$evento->lugares_id"
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
