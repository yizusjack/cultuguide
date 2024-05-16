<x-layout
    title="Exhibiciones"
>

    <div class="text-center">
        <h1>Exhibiciones</h1>
    </div>

    <div class="row">
        <div class="text-right">
            <a href="{{ route('exhibicion.create') }}">
                <button class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Nueva exhibicion</button>
            </a>
        </div>
    </div>

    <div>
        <livewire:listados.exhibicion-list/>
    </div>
    

</x-layout>