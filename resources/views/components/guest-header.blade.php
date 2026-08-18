<nav class="navbar navbar-expand-md bg-white border-bottom border-light-subtle sticky-top py-3">
  <div class="container fluid">
    <a href="/" class="navbar-brand text-dark ms-5 fw-bold">
      <span class="brand-text">
        {{ env('APP_NAME')}}
      </span>
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav w-100 d-flex align-items-center">
        <div class="ms-auto d-flex align-items-center gap-3">
            @auth
                <x-nav-link href="/post_ads" :active="true" class="btn btn-warning text-dark fw-bold rounded-pill px-3">Post Ads</x-nav-link>
                <x-nav-link href="/" :active="request()->is('/')" class="nav-link text-dark fw-medium">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" class="nav-link text-dark fw-medium">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link text-dark fw-medium">Contact</x-nav-link>
                <x-nav-link href="/dashboard" :active="request()->is('/dashboard')" class="nav-link text-dark fw-medium">Dashboard</x-nav-link>                
            @endauth
            @guest
                <x-nav-link href="/login" :active="true" class="btn btn-warning text-dark fw-bold rounded-pill px-3">Post Ads</x-nav-link>
                <x-nav-link href="/" :active="request()->is('/')" class="nav-link fw-bold">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" class="nav-link fw-bold">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link fw-bold">Contact</x-nav-link>
                <x-nav-link href="/login" :active="request()->is('login')" class="nav-link fw-bold">Login</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')" class="btn btn-outline-warning fw-semibold rounded-pill px-3">Register</x-nav-link>
            @endguest
        </div>
      </div>
    </div>
  </div>
</nav>