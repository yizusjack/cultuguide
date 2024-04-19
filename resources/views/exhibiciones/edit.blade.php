<x-layout
    title="Crear lugares"
>
    <div class="m-3 p-3 space-y-12">
            <h1>Crear lugares</h1>

            <form action="{{route('exhibicion.update', $exhibicion)}}" method="POST">
                @csrf
                @method('PATCH')

                <x-forms.normalInput
                    name="nombre"
                    label="Nombre: "
                    placeholder="Ingrese el nombre de la exhibicion"
                    :value="$exhibicion->nombre"
                    required
                />

                <x-forms.textArea
                    name="descripcion"
                    label="Descripción: "
                    placeholder="Proporciona una descripción de la exhibicion"
                    :value="$exhibicion->descripcion"
                    required
                />

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <x-forms.normalInput
                            name="fecha_inicio"
                            label="Fecha de inicio: "
                            placeholder="Ingrese la fecha de inicio de la exhibición"
                            type="date"
                            :value="$exhibicion->fecha_inicio"
                            required
                        />
                    </div>
                    
                    <div>
                        <x-forms.normalInput
                            name="fecha_fin"
                            label="Fecha de fin: "
                            placeholder="Ingrese la fecha de fin de la exhibición"
                            :value="$exhibicion->fecha_fin"
                            type="date"
                        />
                    </div>

                    <div>
                        <x-forms.selectInput
                            name="lugares_id"
                            label="Lugar: "
                            placeholder="Seleccione el lugar donde se presentará"
                            :options="$lugares"
                            attributeName="nombre"
                            :selected="$exhibicion->lugares_id"
                            required
                        />
                    </div>

                </div>

                <div class="flex justify-center">
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Enviar</button>
                </div>
                
            </form>
        
        </div>

</x-layout>