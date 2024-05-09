<div>
    <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">{{ $unreaded }}</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            Tienes {{ $unreaded }} {{ $unreaded == 1 ? 'notificacion nueva' : 'notificaciones nuevas' }}
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
          </li>

          @foreach ($notifications as $notification)
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="notification-item {{ $notification->readed_at == null ? 'notification-active' : '' }}" wire:click="goToNoti({{ $notification }})">
                {{$notification->time}}
                <i class="bi bi-{{ $notification->icon }} text-{{ $notification->color }}"></i>
                <div>
                <h4>{{ $notification->titulo }}</h4>
                <p>{{ $notification->contenido }}</p>
                <p>{{ $notification->created_at->diffForHumans()}}</p>
                </div>
            </li>
          @endforeach

          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
          </li>

        </ul><!-- End Notification Dropdown Items -->

    </li>
</div>
