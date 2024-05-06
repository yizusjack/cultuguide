<div>
    <div class="row">
        <x-forms.normalInput
            name="nombreExhibicion"
            label="Nombre de la exhibicion"
            placeholder="Buscar por nombre"
            wire:model.live='nombreExhibicion'
        />
    </div>

    <div class="row">
        @foreach ($exhibiciones as $exhibicion)
        <div class="col-lg-4">
            <a href="{{ route('exhibicion.show', $exhibicion)}}">
                <div class="card p-2">
                    <img
                        src="{{ $exhibicion->imagenes()->first() ? Storage::url($exhibicion->imagenes()->first()->hash) : asset('assets/imgs/nf.jpg') }}"
                        class="card-img-top"
                        alt="{{ $exhibicion->nombre }}"
                        style="width:100%; height: 250px; object-fit: contain;"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ $exhibicion->nombre }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{ $exhibiciones->links() }}
</div>

