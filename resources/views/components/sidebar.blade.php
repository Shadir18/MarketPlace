<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/products" class="brand-link">
            <span class="brand-text fw-light">Dashboard</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">

                <li class="nav-item">
                    <x-nav-link href="/products" :active="request()->is('products')">
                        <i class="nav-icon bi bi-grid"></i>
                        <p>Dashboard</p>
                    </x-nav-link>
                </li>

                <li class="nav-item {{ request()->is('posts*') ? 'menu-open' : '' }}">
                    <x-nav-link href="#" class="nav-link {{ request()->is('posts*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                        <p>
                            Posts
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </x-nav-link>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-nav-link href="/posts/listed" :active="request()->is('posts/listed')">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>List</p>
                            </x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/posts/approved" :active="request()->is('posts/approved')">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Approved</p>
                            </x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/posts/rejected" :active="request()->is('posts/rejected')">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Rejected</p>
                            </x-nav-link>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <x-nav-link href="/users" :active="request()->is('users*')">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Manage Users</p>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link href="/categories" :active="request()->is('categories*')">
                        <i class="nav-icon bi bi-tags-fill"></i>
                        <p>Manage Categories</p>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link href="/models" :active="request()->is('models*')">
                        <i class="nav-icon bi bi-cpu-fill"></i>
                        <p>Manage Models</p>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link href="/types" :active="request()->is('types*')">
                        <i class="nav-icon bi bi-grid-fill"></i>
                        <p>Manage Types</p>
                    </x-nav-link>
                </li>

                <li class="nav-item">
                    <x-nav-link href="/settings" :active="request()->is('settings*')">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p>Settings</p>
                    </x-nav-link>
                </li>
            </ul>
        </nav>
    </div>
</aside>