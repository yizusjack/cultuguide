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

    public $reportMessages = [];

    public function reportComment($commentId)
    {
        $user = auth()->user();
        $comment = Comentario::findOrFail($commentId);

        if (!$user->reportedComments->contains($comment)) {
            $user->reportedComments()->attach($comment);
            $this->reportMessages[$commentId] = 'Comment reported successfully.';
            
            $reportsCount = $comment->reports()->count();
            if ($reportsCount >= 3) {
                $comment->delete();
                // Notificacion
            }
        } else {
            $this->reportMessages[$commentId] = 'You have already reported this comment.';
        }
    }

    public function render()
    {
        return view('livewire.comentarios');
    }
}
