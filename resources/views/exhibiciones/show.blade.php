<x-layout
    title="{{$exhibicion->nombre}}"
>

<h2>{{$exhibicion->nombre}}</h2>

<div class="flex justify-center m-3">
    <div class="text-center w-full">
        <form action="{{route('imagen.store')}}" class="dropzone mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="my-awesome-dropzone">
            @csrf
            <input type="hidden" name="imageable_id" id="imageable_id" value="{{$exhibicion->id}}">
            <input type="hidden" name="imageable_type" id="imageable_type" value="{{get_class($exhibicion)}}">
        </form>
    </div>
</div>

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            acceptedFiles: 'image/*',
            dictDefaultMessage: "Arrastra las imágenes aquí o haz clic para seleccionar",
        };
    </script>
@endsection

</x-layout>