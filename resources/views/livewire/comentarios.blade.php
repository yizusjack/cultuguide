<div>
    <h2>Comentarios</h2>
    @foreach($comments as $comentario)
        <table>
            <tbody>
                <tr>
                    <td>Usuario: {{$comentario->user->name}} | Rating: {{ $comentario->rating }}</td>
                </tr>
                <tr>
                    <td>{{ $comentario->content }}</td>
                </tr>
                <tr>
                    <td>{{ $comentario->created_at }}</td>
                    @if (auth()->id() === $comentario->user->id)
                        <td>
                            <form wire:submit.prevent="delete({{ $comentario->id }})">
                                @csrf
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    @endforeach
    
    @if(auth()->user())
    <h2>Nuevo Comentario</h2>
    <form wire:submit.prevent="store">
        @csrf
        <input type="hidden" name="lugares_id" value="{{ $lugares_id }}">
        <textarea wire:model="content" required></textarea><br>
        <input type="number" wire:model="rating" min="1" max="10" required><br>
        <button type="submit">Agregar Comentario</button>
    </form>
    @endif
</div>