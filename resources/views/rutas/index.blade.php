<x-layout
    title="Rutas"
>
    
    <div class="text-center">
        <h1>Rutas</h1>
    </div>

    <div class="row mb-2">
        <div class="text-right">
            <a href="{{ route('rutas.create') }}">
                <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nueva ruta</button>
            </a>
        </div>
    </div>

    <div>
        <livewire:listados.ruta-table/>
    </div>

</x-layout>