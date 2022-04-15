<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}"href="/about">About</a>
            {{-- fungsi supaya yang active ada nyala di navbar --}}
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}"href="/posts">Blog</a>
            {{-- href nya itu manggil sesuai yang akan di panggil di web jadi bukan sesuai file
                tergantung kalo file nya sama route nya sama ya gpp --}}
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}"href="/categories">Categories</a>
            {{-- fungsi supaya yang active ada nyala di navbar --}}
          </li>
        </li>

        
       
      </ul>
        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
              {{-- ambil nama user yg login --}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>

                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                </form>
                {{-- <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</a> --}}
              </li>
            </ul>
          </li>
          @else
          <li class="navbar-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i>Login</a>
          </li>
          @endauth
      </ul>
            
        {{-- auth ini kaya login tampilin apa klo blm tampiin apa --}}
        {{-- kalo guest tampil apa dan guest apa contoh user admin --}}
        {{-- atau bisa digabungin kaya @auth else @guest --}}
      
      </div>
    </div>
  </nav>