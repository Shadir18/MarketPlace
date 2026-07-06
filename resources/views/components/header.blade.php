<nav class="navbar navbar-expand-md bg-body-secondary fixed-top" data-bs-theme="dark">
  <div class="container fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav w-100 d-flex justify-content-between">
        @guest
          <div class="navbar-nav w-100 d-flex align-items-center gap-3">
            <a href="/products" class="navbar-brand text-light fw-bold me-auto">
              <span class="brand-text fw-bold">MarketPlace</span>
            </a>
            <x-nav-link href="/home" :active="request()->is('home')" class="nav-link">Home</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">contact</x-nav-link>
            <x-nav-link href="/login" :active="request()->is('login')" class="nav-link">Login</x-nav-link>
          </div>
        @endguest

        @auth
          <div class="ms-auto d-flex align-items-center gap-2">
            <span class="navbar-text text-light small mx-2">
              Welcome, {{ auth()->user()->first_name }}
            </span>
            <form method="POST" action="/logout" class="form-inline mx-2">
              @csrf
              <button type="submit" onclick="handleLogout()" class="btn btn-danger btn-sm px-3 font-weight-bold">Log Out</button>
            </form>
          </div>
        @endauth
      </div>
    </div>
  </div>
</nav>