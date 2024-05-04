<div>
    <div class="row">
        @foreach ($lugares as $lugar)
        <div class="col-lg-4">
            <a href="{{ route('lugar.show', $lugar)}}">
                <div class="card">
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
</div>
