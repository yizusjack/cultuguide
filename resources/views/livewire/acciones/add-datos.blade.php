<div>
    <x-dialog-modal wire:model='display'>
        <x-slot name='title'> <br>
            <div class="text-center">
                <h4>Agrega información adicional sobre ti</h4>
            </div>
        </x-slot>
        <x-slot name='content'>
            <form wire:submit.prevent="save">
                @csrf

                <x-forms.normalInput
                    name="fecha_n"
                    wire:model='fecha_n'
                    label='Fecha de nacimiento:'
                    placeholder="Ingresa tu fecha de nacimiento"
                    type="date"
                    required
                />

                <x-forms.selectInput
                    name="ciudad"
                    wire:model='ciudad'
                    label="Ciudad de residencia: "
                    placeholder="Seleccione una ciudad"
                    :options="$ciudades"
                    attributeName="value"
                    required
                />

                <x-forms.selectInput
                    name="presupuesto"
                    wire:model='presupuesto'
                    label="Presupuesto: "
                    placeholder="Seleccione su rango de presupuesto"
                    :options="$presupuestos"
                    attributeName="value"
                    required
                />

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>

            </form>
        </x-slot>
        
        <x-slot name='footer'>
            {{--<button wire:click="$set('display', false)" type="button" class="btn btn-secondary">Cerrar</button>--}}
        </x-slot>
    </x-dialog-modal>
</div>
