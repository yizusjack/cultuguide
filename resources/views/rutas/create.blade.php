<x-layout
    title="Crear rutas"
>
    <div class="m-3 p-3 space-y-12">
            <h2>Crear rutas</h2>

            <form action="{{ route('rutas.store') }}" method="POST">
                @csrf

                <x-forms.normalInput
                    name="ruta_antigua"
                    label="Ruta Antigua: "
                    placeholder="Ingrese la ruta antigua"
                />

                <x-forms.normalInput
                    name="ruta_actual"
                    label="Ruta Actual: "
                    placeholder="Ingrese la ruta actual"
                    required
                />

                <div class="flex justify-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                
            </form>
        
        </div>

</x-layout>
