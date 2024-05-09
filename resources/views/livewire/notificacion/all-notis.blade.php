<div>
    <div class="card">
        <div class="card-body">

          <!-- List group With Icons -->
          <ul class="list-group">
            @foreach ($notifications as $notification)
                <li wire:click="goToNoti({{ $notification }})" class="list-group-item notification-element {{ $notification->readed_at == null ? 'notification-active' : ''}}">
                    <i class="bi bi-{{ $notification->icon }} me-1 text-{{ $notification->color }}"></i> {{ $notification->titulo }}
                    <div>{{ $notification->contenido }}</div>
                    <i>{{ $notification->created_at->diffForHumans()}}</i>
                </li>
            @endforeach
            
            
          </ul><!-- End List group With Icons -->

        </div>
      </div>
</div>
