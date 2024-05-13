  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('lugar.index')}}" class="logo d-flex align-items-center">
        {{--<img src="{{asset('assets/template/img/logo.png')}}" alt="">--}}
        <span class="d-none d-lg-block">Cultuguide</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        @auth

        @if (! @isset(Auth::user()->email_verified_at))
            <div class="p-3">Email no verificado</div>
        @else
            <div class="p-3">
              <i class='bi bi-patch-check-fill text-primary'></i>
            </div>
        @endif  
        <div></div>

        <livewire:notificacion.show-noti/>

          {{--<li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item notification-active">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li>--}}<!-- End Notification Nav -->

            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                {{--<img src="{{asset('assets/template/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">--}}
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                <h6>{{ Auth::user()->name }}</h6>
                <span>{{Auth::user()->email}}</span>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('profile.show')}}">
                    <i class="bi bi-person"></i>
                    <span>Mi perfil</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <form method="POST" action="{{ route('logout') }}"x-data>
                    @csrf
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar sesión</span>
                    </a>
    
                </form>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        @endauth

        @guest
            <li class="nav-item pe-3">
                <a href="{{ route('login') }}">
                    <button class="btn btn-outline-primary rounded">
                        Iniciar sesión
                    </button>
                </a>
            </li>

            <li class="nav-item pe-3">
                <a href="{{ route('register') }}">
                    <button class="btn btn-info rounded">
                        Registrarse
                    </button>
                </a>
            </li>
        @endguest

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->