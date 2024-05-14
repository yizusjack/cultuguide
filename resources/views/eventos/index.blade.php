<x-layout
    title="Eventos"
>

    <div class="text-center">
        <h1>Eventos</h1>
    </div>

    <div class="row mb-2">
        <div class="text-right">
            <a href="{{ route('evento.create') }}">
                <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo evento</button>
            </a>
        </div>
    </div>

    <div>
        <livewire:listados.evento-table/>
    </div>
    

</x-layout>
