<x-layout
    title="Editar ruta {{ $ruta->ruta_actual }}"
>
    <div class="m-3 p-3 space-y-12">
            <h2>Editar ruta {{ $ruta->ruta_actual }}</h2>

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
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                
            </form>

    </div>

</x-layout>
