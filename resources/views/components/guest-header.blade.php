<nav class="container-fluid navbar navbar-expand-md bg-body-secondary shadow" data-bs-theme="dark">
  <div class="container fluid">
    <a href="/" class="navbar-brand text-light ms-5">
      <span class="brand-text">
        {{ env('APP_NAME')}}
      </span>
    </a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav w-100 d-flex align-items-center">
        <div class="ms-auto d-flex align-items-center gap-3">
            @auth
                <x-nav-link href="/post_ads" :active="request()->is('/post_ads')" class="nav-link">Post Ads</x-nav-link>
                <x-nav-link href="/products" :active="request()->is('/')" class="nav-link">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" class="nav-link">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">Contact</x-nav-link>
                <x-nav-link href="/products" :active="request()->is('/products')" class="nav-link">Dashboard</x-nav-link>                
            @endauth
            @guest
                <x-nav-link href="/login" :active="request()->is('/post_ads')" class="nav-link">Post Ads</x-nav-link>
                <x-nav-link href="/" :active="request()->is('/')" class="nav-link">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" class="nav-link">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="nav-link">Contact</x-nav-link>
                <x-nav-link href="/login" :active="request()->is('login')" class="nav-link">Login</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')" class="nav-link">Register</x-nav-link>
            @endguest
        </div>
      </div>
    </div>
  </div>
</nav>