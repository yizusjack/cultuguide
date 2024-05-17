<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('lugar.index')}}">
            <i class="fa-solid fa-building-columns"></i>
          <span>Lugares</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('evento.index')}}">
            <i class="fa-regular fa-calendar"></i>
          <span>Eventos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('exhibicion.index')}}">
            <i class="fa-solid fa-palette"></i>
          <span>Exhibiciones</span>
        </a>
      </li>

      @auth
          @if (Auth::user()->hasRole('admin'))

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('user.index')}}">
                  <i class="ri-account-circle-fill"></i>
                <span>Usuarios</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('rutas.index')}}">
                  <i class="ri-map-2-line"></i>
                <span>Rutas</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('reclamo.index')}}">
                  <i class="ri-alert-fill"></i>
                <span>Reclamos</span>
              </a>
            </li>
              
          @endif
      @endauth

    </ul>

  </aside>