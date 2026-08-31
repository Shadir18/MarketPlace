<nav class="app-header navbar navbar-expand-md bg-body-secondary shadow" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="btn btn-link nav-link text-light me-2" type="button" data-lte-toggle="sidebar" role="button">
      <i class="bi bi-list fs-4"></i>
    </button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list fs-4"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <div class="navbar-nav w-100 d-flex align-items-center">
        <div class="ms-auto d-flex align-items-center gap-3">

          <span class="navbar-text text-light small mx-2">
            Welcome, {{ auth()->user()->first_name }}
          </span>

          <button type="button" onclick="handleLogout()" class="btn btn-danger btn-sm px-3 font-weight-bold">
            Log Out
          </button>

        </div>
      </div>
    </div>
  </div>
</nav>