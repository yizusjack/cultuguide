<x-layout
    title="Crear lugares"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Crear lugares</h1>

            <form action="{{route('exhibicion.store')}}" method="POST">
                @csrf

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre de la exhibicion"
                    required
                />

                <x-forms.textarea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción de la exhibicion"
                    required
                />

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="fecha_inicio"
                            label="Fecha de inicio: "
                            placeholder="Ingrese la fecha de inicio de la exhibición"
                            type="date"
                            required
                        />
                    </div>
                    
                    <div>
                        <x-forms.normalInput
                            name="fecha_fin"
                            label="Fecha de fin: "
                            placeholder="Ingrese la fecha de fin de la exhibición"
                            type="date"
                        />
                    </div>

                    <div>
                        <x-forms.select
                            name="lugares_id"
                            label="Lugar: "
                            placeholder="Seleccione el lugar donde se presentará"
                            :options="$lugares"
                            attributeName="nombre"
                            required
                        />
                    </div>

                </div>

                <div class="flex justify-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                
            </form>
        
        </div>

</x-layout>