<div>
    <button class="btn {{$evento->users()->where('user_id', Auth::user()->id)->count() == 0 ? 'btn-success' : 'btn-danger'}}" wire:click="notificar({{Auth::user()->id}})">
        @if ($evento->users()->where('user_id', Auth::user()->id)->count() == 0)
            <i class="bi bi-bookmark-plus-fill"></i> Quiero participar
        @else
            <i class="bi bi-bookmark-x-fill"></i> Ya no quiero participar
        @endif

    </button>

    <div class="row">
        <div class="text-center" wire:loading> 
            Espere un momento...
        </div>
    </div>
    
</div>
