<x-layout
    title="Costos"
>

    <div class="text-center">
        <h1>Costos</h1>
    </div>

    <div class="row  mb-2">
        <div class="text-right">
            <a href="{{ route('exhibicion.create') }}">
                <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo costo</button>
            </a>
        </div>
    </div>

    <div>
        <livewire:listados.costo-list/>
    </div>
    

</x-layout>