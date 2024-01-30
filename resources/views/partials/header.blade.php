<header class="header-area">
    <!-- search box start -->
    <div class="header-search-box">
      <img src="{{ asset('assets/images/icons/search.svg') }}" alt="S" class="img-fluid search">
      <input type="text" class="form-control" placeholder="Search">
    </div>
    <!-- search box end -->

    <!-- header icons start -->
    <div class="header-icons-box">
      <ul class="main">
        <li class="head-item">
          <a href="#" class="head-link notify-box-area" id="notifyButton">
            <span class="dot"></span>
            <img src="{{ asset('assets/images/icons/bell.svg') }}" alt="B" class="img-fluid">

            <!-- notify-list start -->
            <div class="notify-list-box custom-scroll-bar" id="notifyList">
              <!-- item -->
              <div class="media">
                <img src="{{ asset('assets/images/icons/primary.svg') }}" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Project Added</h5>
                  <div class="d_flex">
                    <p>New project added successfully</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="{{ asset('assets/images/icons/primary.svg') }}" alt="I" class="fluid">
                <div class="media-body">
                  <h5>Marketing Service Added</h5>
                  <div class="d_flex">
                    <p>New marketing service added</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/secondary.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Task Added</h5>
                  <div class="d_flex">
                    <p>XYZ Tech posted new job for ui ux designer</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/danger.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Job Alert</h5>
                  <div class="d_flex">
                    <p>New task added successfully</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/danger.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Job Alert</h5>
                  <div class="d_flex">
                    <p>Marketing Service Updated</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/secondary.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Project Added</h5>
                  <div class="d_flex">
                    <p>New project added successfully</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/danger.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Job Alert</h5>
                  <div class="d_flex">
                    <p>Marketing Service Updated</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
              <!-- item -->
              <div class="media">
                <img src="./assets/images/icons/secondary.svg" alt="I" class="fluid">
                <div class="media-body">
                  <h5>New Project Added</h5>
                  <div class="d_flex">
                    <p>New project added successfully</p>
                    <span>11 Oct, 2023</span>
                  </div>

                </div>
              </div>
              <!-- item -->
            </div>
            <!-- notify-list end -->

          </a>
        </li>
        <li class="head-item">
          <div class="dropdown p-0 header-dropdown">
            <a class="p-0 user head-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('uploads/users/avatar-2.png') }}" alt="A" class="img-fluid">
            </a>

            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ url('account/profile') }}">
                  Profile
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('account/settings') }}">
                  Profile Setting
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
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