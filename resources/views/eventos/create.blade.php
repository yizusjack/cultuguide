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

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <x-forms.dateInput
                            name="fecha_inicio"
                            label="Fecha de inicio: "
                            required
                        />
                    </div>

                    <div>
                        <x-forms.dateInput
                            name="fecha_fin"
                            label="Fecha de finalización: "
                            required
                        />
                    </div>

                </div>


                <div class="grid md:grid-cols-2 gap-4">
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
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Enviar</button>
                </div>

            </form>

        </div>

</x-layout>
