<div>
    <div class="row">
        <div class="m-1 col-3">
            <a href="{{ route('rutas.edit', $id)}}">
                <button class="btn btn-secondary btn-sm"><i class="ri-edit-2-fill"></i> Editar</button>
            </a>
        </div>

        <div class="m-1 col-3">
            <form action="{{ route('rutas.destroy', $id)}}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Eliminar</button>
            </form>
        </div>
    </div>
</div>