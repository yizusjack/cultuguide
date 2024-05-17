<div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Comentarios</h3>

    <div class="justify-content-between">
        @foreach($comments as $comentario)
        <div class="border-bottom border-gray-300 py-4 position-relative">
            <p class="text-gray-700">Comentario de <strong>{{$comentario->user->name}}</strong> - {{ $comentario->created_at }} &emsp;
                @if(auth()->id() != $comentario->user->id)
                    <button wire:click.prevent="reportComment({{ $comentario->id }})" type='button'><i class="fas fa-exclamation-circle text-danger"></i></button>
                    @if(isset($reportMessages[$comentario->id]))
                        <div class="alert alert-success mt-2">
                            {{ $reportMessages[$comentario->id] }}
                        </div>
                    @endif
                @endif
            </p>
            <p class="text-gray-700">{{ $comentario->content }}</p>
            <div class="mt-2 d-flex align-items-center position-relative">
                <div class="rating" id="{{ $comentario->id }}Rating">
                    @php
                        $rating = $comentario->rating;
                    @endphp
                    <input type="radio" id="{{ $comentario->id }}star5" name="{{ $comentario->id }}rating" value="5" disabled {{ $rating == 5 ? 'checked' : '' }} /><label for="{{ $comentario->id }}star5"></label>
                    <input type="radio" id="{{ $comentario->id }}star4" name="{{ $comentario->id }}rating" value="4" disabled {{ $rating == 4 ? 'checked' : '' }} /><label for="{{ $comentario->id }}star4"></label>
                    <input type="radio" id="{{ $comentario->id }}star3" name="{{ $comentario->id }}rating" value="3" disabled {{ $rating == 3 ? 'checked' : '' }} /><label for="{{ $comentario->id }}star3"></label>
                    <input type="radio" id="{{ $comentario->id }}star2" name="{{ $comentario->id }}rating" value="2" disabled {{ $rating == 2 ? 'checked' : '' }} /><label for="{{ $comentario->id }}star2"></label>
                    <input type="radio" id="{{ $comentario->id }}star1" name="{{ $comentario->id }}rating" value="1" disabled {{ $rating == 1 ? 'checked' : '' }} /><label for="{{ $comentario->id }}star1"></label>
                    <br>
                    <br>
                </div>
            </div>
            <div>
                @if (auth()->id() === $comentario->user->id)
                        <form wire:submit.prevent="delete({{ $comentario->id }})">
                            @csrf
                            <button class="text-danger" type="submit">Eliminar Comentario</button>
                        </form>
                @endif
            </div>
        </div>
        @endforeach
        
        @if(auth()->user())
        <div x-data="{ open: false }">
                <button x-on:click="open = ! open" class="btn btn-primary mt-3">Nuevo comentario</button>  
                <div x-show="open" x-transition>
                    <form wire:submit.prevent="store" id='commentForm'>
                        @csrf
                        <input type="hidden" name="lugares_id" value="{{ $lugares_id }}">
                        <div class="mt-2 d-flex align-items-center">
                            <label class="me-2 text-gray-600">Calificación:</label>
                            <div class="rating" id="rating">
                                <input type="radio" id="newCommentStar5" value="5" wire:model="rating"><label for="newCommentStar5"></label>
                                <input type="radio" id="newCommentStar4" value="4" wire:model="rating"><label for="newCommentStar4"></label>
                                <input type="radio" id="newCommentStar3" value="3" wire:model="rating"><label for="newCommentStar3"></label>
                                <input type="radio" id="newCommentStar2" value="2" wire:model="rating"><label for="newCommentStar2"></label>
                                <input type="radio" id="newCommentStar1" value="1" wire:model="rating"><label for="newCommentStar1"></label>
                            </div>
                        </div>
                        <br>
                        <div>
                            <textarea wire:model="content" class="form-control mb-2" rows="4" placeholder="Escribe tu comentario aquí" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Enviar Comentario</button>
                    </form>
                </div>
        </div>
        @endif
    </div>
    
</div>