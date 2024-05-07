<div>
    <div class="text-right">
        <button wire:click="$set('display', true)" type="button" class="btn btn-secondary">Acciones</button>
    </div>

    <x-dialog-modal wire:model='display'>
        <x-slot name='title'> <br>
            <div class="text-center">
                <h4>Acciones</h4>
            </div>
        </x-slot>
        <x-slot name='content'>
            <div class="row text-center">
                <div class="col-6">
                    <a href="{{ route('lugar.edit', $lugar) }}">
                        <button class="btn btn-primary">Editar lugar</button>
                    </a>
                </div>

                <div class="col-6">
                    <form action="{{ route('lugar.destroy', $lugar)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar lugar</button>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="mt-2">
                    Agregar imagenes
                </div>
                
                <div class="flex justify-center m-3">
                    <div class="text-center w-full">
                        <form action="{{route('imagen.store')}}" class="dropzone mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="my-awesome-dropzone">
                            @csrf
                            <input type="hidden" name="imageable_id" id="imageable_id" value="{{$lugar->id}}">
                            <input type="hidden" name="imageable_type" id="imageable_type" value="{{get_class($lugar)}}">
                        </form>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
            <button wire:click="$set('display', false)" type="button" class="btn btn-secondary">Cerrar</button>
        </x-slot>
    </x-dialog-modal>
</div>
