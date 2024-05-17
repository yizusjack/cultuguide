<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Notification;

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

        if (!$user->reportedComments->contains($comment)) 
        {
            $user->reportedComments()->attach($comment);
            $this->reportMessages[$commentId] = 'Comentario reportado exitosamente.';
            
            $reportsCount = $comment->reports()->count();
            if ($reportsCount >= 3) {

                $notification = new Notification();
                $notification->titulo = 'Comentario eliminado';
                $notification->contenido = 'Tu comentario fue eliminado debido a numerosos reportes.';
                $notification->user_id = $comment->user_id;
                $notification->icon = "emoji-dizzy-fill";
                $notification->color = "danger";
                $notification->redirect_to = "lugar.show";
                $notification->redirect_parameter = $comment->lugares_id;
    
                $notification->save();

                $comment->delete();
            }
        } else 
        {
            $this->reportMessages[$commentId] = 'Ya habías reportado este comentario.';
        }
    }

    public function render()
    {
        return view('livewire.comentarios');
    }
}
