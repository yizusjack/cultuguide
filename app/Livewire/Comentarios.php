<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;

class Comentarios extends Component
{
    public $content;
    public $lugares_id;
    public $rating;
    public $comments;

    public function mount($lugares_id)
    {
        $this->lugares_id = $lugares_id;
        $this->comments = Comentario::where('lugares_id', $lugares_id)->get();
    }

    public function store()
    {
        $this->validate([
            'content' => 'required',
            'rating' => 'required',
        ]);

        Comentario::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
            'lugares_id' => $this->lugares_id,
            'rating' => $this->rating,
        ]);

        $this->reset([
            'content',
            'rating',
        ]);
        
        $this->comments = Comentario::where('lugares_id', $this->lugares_id)->get();
    }

    public function delete($comentarioId)
    {
        $comment = Comentario::findOrFail($comentarioId);
        $comment->delete();
        $this->comments = Comentario::where('lugares_id', $this->lugares_id)->get();
    }

    public function render()
    {
        return view('livewire.comentarios');
    }
}
