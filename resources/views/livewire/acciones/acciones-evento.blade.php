<div>
    @can('create', App\Models\Evento::class)
        <div class="row">
            <div class="m-1 col-5">
                <a href="{{ route('evento.edit', $id)}}">
                    <button class="btn btn-secondary btn-sm"><i class="ri-edit-2-fill"></i> Editar</button>
                </a>
            </div>

            <div class="m-1 col-5">
                <form action="{{ route('evento.destroy', $id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Eliminar</button>
                </form>
            </div>
        </div>
    @endcan
</div>