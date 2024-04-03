<x-layout
    title="{{$lugar->nombre}}"
>
    <div class="m-3">
        <h1>{{$lugar->nombre}}</h1>
        <div>
            <p>{!! nl2br($lugar->descripcion) !!}</p>
        </div>
    </div>
</x-layout>