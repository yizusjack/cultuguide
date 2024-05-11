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
    {{--@foreach ($eventos as $evento)
        <div class="m-3">
            <h1>{{$evento->nombre}}</h1>
            <div>
                <p>Descripción: </p>
                <p>{!! nl2br($evento->descripcion) !!}</p>
            </div>
            <div>
                <p>Lugar del evento: </p>
                <p>{{$evento->lugares->nombre}}</p>
            </div>
            <div>
                <p>Fecha de inicio: </p>
                <p>{{$evento->fecha_inicio}}</p>
                <p>Fecha de finalización: </p>
                <p>{{$evento->fecha_fin}}</p>
            </div>
            <div>
                <p>Dirección del lugar: </p>
                <p>{{$evento->lugares->direccion}}</p>
            </div>
        </div>
    @endforeach--}}

</x-layout>
