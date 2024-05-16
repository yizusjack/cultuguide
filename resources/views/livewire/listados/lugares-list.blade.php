<div>
    
        @auth
            @if (Auth::user()->datos_id != null)
                <div class="row">
                    <div class="col">
                        <button wire:click="cambiar" type="button" class="btn btn-info">{{$recomendaciones == true ? 'Ver todos' : 'Ver recomendaciones'}}</button>
                    </div>
                </div>
            @endif
        @endauth
    

    <div class="row">
        <div class="col-6">
            <x-forms.normalInput
                name="nombreLugar"
                label="Nombre del lugar"
                placeholder="Buscar por nombre"
                wire:model.live='nombreLugar'
            />
        </div>

        <div class='col-6'>
            <x-forms.selectInput
                name="municipio"
                label="Municipio: "
                placeholder="Buscar por municipio"
                :options="$municipios"
                attributeName="nombre"
                wire:model.live='municipio'
            />
        </div>
    </div>

    <div class="row">
        @foreach ($lugares as $lugar)
        <div class="col-lg-4">
            <a href="{{ route('lugar.show', $lugar)}}">
                <div class="card p-2">
                    <img
                        src="{{ $lugar->imagenes()->first() ? Storage::url($lugar->imagenes()->first()->hash) : asset('assets/imgs/nf.jpg') }}"
                        class="card-img-top"
                        alt="{{ $lugar->nombre }}"
                        style="width:100%; height: 250px; object-fit: contain;"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ $lugar->nombre }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{ $lugares->links() }}
</div>
