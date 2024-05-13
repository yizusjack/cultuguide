<div>
    <div class="row">
        <div class="m-1">
            <form action="{{ route('user.modify', $id)}}" method="post">
                @csrf

                @if ($id->hasRole('admin'))
                    <button class="btn btn-danger btn-sm"><i class="bi bi-person-x-fill"></i> Quitar administrador</button>
                @else
                    <button class="btn btn-success btn-sm"><i class="bi bi-person-plus-fill"></i> Hacer administrador</button>
                @endif

            </form>
        </div>
    </div>
</div>