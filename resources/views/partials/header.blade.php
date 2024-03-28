<header class="header-area">
    <!-- search box start -->

    <div class="header-search-box">

        <div class="{{ !Request::is('customers','projects') ? "d-none" : '' }}">
            <img src="{{ asset('assets/images/icons/search.svg') }}" alt="S" class="img-fluid search">
            <form action="">
                <input type="text" name="q" class="form-control" placeholder="Search">
            </form>
        </div>
    </div>
    <!-- search box end -->

    <!-- header icons start -->
    <div class="header-icons-box">
      <ul class="main">
        <li class="head-item">
          <div class="head-link notify-box-area" role="button" id="notifyButton">
            <span class="dot"></span>
            <img src="{{ asset('assets/images/icons/bell.svg') }}" alt="B" class="img-fluid">

            <!-- notify-list start -->
            @include('partials.notifications')
            <!-- notify-list end -->

          </div>
        </li>
        <li class="head-item">
          <div class="dropdown p-0 header-dropdown">
            <a class="p-0 user head-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('uploads/users/avatar-9.png') }}" alt="A" class="img-fluid">
            </a>

            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ url('account/profile') }}">
                  Profile
                  @if (Request::is('account/profile'))
                      <i class="fas fa-check"></i>
                  @endif
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('account/settings') }}">
                  Profile Setting
                  @if (Request::is('account/settings'))
                      <i class="fas fa-check"></i>
                  @endif
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('/logout') }}">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="head-item">
          <a href="#" class="d-lg-none head-link" id="menuToggle">
            <i class="fas fa-bars"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- header icons end -->
  </header>
