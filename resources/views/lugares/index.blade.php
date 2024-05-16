<x-layout
    name="Lugares"
>
    <div class="text-center">    
        <h1>Lugares</h1>
    </div>

    @auth
        <livewire:acciones.add-datos/>
    @endauth
    
    <div class="row">
        <div class="text-right">
            <a href="{{ route('lugar.create') }}">
                <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nuevo lugar</button>
            </a>
        </div>
    </div>
    
    <livewire:listados.lugares-list/>

</x-layout>