<x-layout
    title="Eventos"
>
    @foreach ($eventos as $evento)
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
    @endforeach

</x-layout>
