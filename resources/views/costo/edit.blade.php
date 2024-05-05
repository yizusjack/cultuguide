<x-layout
    title="Crear costo"
>
    <div class="m-3 p-3 space-y-12">
        <h2>Añadir costo</h2>

        <form method="POST" action="{{ route('costos.update', $costo) }}">
            @csrf
            @method('PATCH')

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <x-forms.selectInput
                        name="categoria"
                        label="Categoría: "
                        placeholder="Ingrese una categoría"
                        :options="$categorias"
                        attributeName="value"
                        :selected="$costo->categoria"
                        required
                    />
                </div>

                <div>
                    <x-forms.normalInput
                        name="costo"
                        label="Costo: "
                        placeholder="Ingrese el costo"
                        type="number"
                        step="any"
                        :value="$costo->costo"
                        required
                    />
                </div>

            </div>

            <x-forms.selectInput
                name="lugares_id"
                label="Lugar: "
                placeholder="Seleccione el lugar"
                :options="$lugares"
                attributeName="nombre"
                :selected="$costo->lugares_id"
                required
            />

            <div class="flex justify-center">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</x-layout>
