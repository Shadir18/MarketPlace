<nav class="container-fluid navbar navbar-expand-md bg-body-secondary shadow" data-bs-theme="dark">
  <div class="container fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
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