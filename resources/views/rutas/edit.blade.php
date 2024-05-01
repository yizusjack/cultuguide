<x-layout
    title="Editar ruta {{ $ruta->id }}"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Editar ruta {{ $ruta->id }}</h1>

            <form action="{{ route('rutas.update', $ruta) }}" method="POST">
                @csrf
                @method('PATCH')

                <x-forms.normalInput
                    name="ruta_antigua"
                    label="Ruta Antigua: "
                    placeholder="Ingrese la ruta antigua"
                    :value="$ruta->ruta_antigua"
                    required
                />

                <x-forms.normalInput
                    name="ruta_actual"
                    label="Ruta Actual: "
                    placeholder="Ingrese la ruta actual"
                    :value="$ruta->ruta_actual"
                    required
                />

                <div class="flex justify-center">
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Enviar</button>
                </div>
                
            </form>

    </div>

</x-layout>
