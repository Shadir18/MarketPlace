<x-admin-layout>
    <x-slot:heading>View User Details</x-slot:heading>

    <div class="d-flex align-items-center justify-content-center py-4" style="min-height: 80vh;">
        <div class="w-100" style="max-width: 480px;">
            
            <div class="text-center mb-4">
                <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider mb-3">
                    User Profile
                </span>
                <h1 class="h2 fw-bold text-dark mb-1">
                    {{ $users->first_name }} {{ $users->last_name }}
                </h1>
                <p class="text-secondary small mb-0">Detailed view of the user's account information.</p>
            </div>

            <div class="card bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden">
                <div class="card-body p-4 p-sm-5">

                    <div class="mb-3">
                        <label class="form-label text-dark fw-semibold small">First Name</label>
                        <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                            <input type="text" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" value="{{ $users->first_name }}" readonly>
                            <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                <i class="bi bi-person-fill"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-semibold small">Last Name</label>
                        <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                            <input type="text" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" value="{{ $users->last_name }}" readonly>
                            <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                <i class="bi bi-person-vcard-fill"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-dark fw-semibold small">Email Address</label>
                        <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                            <input type="email" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" value="{{ $users->email }}" readonly>
                            <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                        <a href="/users" class="btn btn-outline-secondary px-4 rounded-pill">
                            Back
                        </a>
                        <a href="/users/{{ $users->id }}/edit" class="btn btn-warning text-dark fw-bold rounded-pill px-4 shadow-sm d-flex align-items-center gap-2">
                            <i class="bi bi-pencil-square"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>