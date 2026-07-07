<nav class="navbar navbar-expand-md bg-body-secondary shadow fixed-top" data-bs-theme="dark">
  <div class="container fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav w-100 d-flex justify-content-start  align-items-center">
        @if(Auth::check() && request()->is('/'))  
        <a href="/products" class="navbar-brand text-light fw-bold">
          <span class="brand-text fw-bold">MarketPlace</span>
        </a>  
        @else
          <a href="/products" class="navbar-brand text-light fw-bold ms-5">
            <span class="brand-text fw-bold ">MarketPlace</span>
          </a>
        @endif
        <div class="navbar-nav w-100 d-flex align-items-center">
            <div class="ms-auto d-flex align-items-center gap-3">
              @guest
                <x-nav-link href="/" :active="request()->is('/')" class="nav-link">Home</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">Contact</x-nav-link>
                <x-nav-link href="/login" :active="request()->is('login')" class="nav-link">Login</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')" class="nav-link">Register</x-nav-link>
              @endguest
              @auth
                @if(!request()->is('/'))
                <span class="navbar-text text-light small mx-2">
                  Welcome, {{ auth()->user()->first_name }}
                </span>
                <form method="POST" action="/logout" class="form-inline mx-2">
                  @csrf
                  <button type="submit" onclick="handleLogout()" class="btn btn-danger btn-sm px-3 font-weight-bold">Log Out</button>
                </form>
                  @else
                  <x-nav-link href="/products" :active="request()->is('/products')" class="nav-link">Home</x-nav-link>
                  <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">Contact</x-nav-link>
                  <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                  @endif
              @endauth
            </div>
          </div>
      </div>
    </div>
  </div>
</nav>

