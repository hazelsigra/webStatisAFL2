<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand mb-2" href="/"><i class="fa-solid fa-mug-hot fa-2x"></i> KAWOKU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'menu-active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('menu') ? 'menu-active' : '' }}" href="/menu">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('aboutus') ? 'menu-active' : '' }}" href="/aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('contactus') ? 'menu-active' : '' }}" href="/contactus">Contact Us</a>
          </li>
        </ul>
        <div class="d-flex">
          @guest
            @if(request()->is('login'))
            <div><button class="btn btn-outline-primary"><a class="text-decoration-none text-reset" href="/register">Register</a></button></div>
            @else
            <div><button class="btn btn-outline-primary"><a class="text-decoration-none text-reset" href="/login">Login</a></button></div>
            @endif
          @endguest
          @auth
            <div>
              <button class="btn btn-outline-primary mx-2">
                <a class="text-decoration-none text-reset" href="/cart">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  Your Cart
                </a>
              </button>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-outline-secondary" type="submit">Logout</button>
            </form>
          @endauth
        </div>
      </div>
    </div>
  </nav>
</header>
