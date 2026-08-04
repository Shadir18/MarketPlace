<x-admin-layout>
    <div class="d-flex align-items-center justify-content-center py-4" style="min-height: 80vh;">
        <div class="w-100" style="max-width: 480px;">
            
            <div class="text-center mb-4">
                <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider mb-3">
                    Get Started
                </span>
                <h1 class="h2 fw-bold text-dark mb-1">
                    Create Account
                </h1>
                <p class="text-secondary small mb-0">Fill in the details below to register a new user account.</p>
            </div>

            <div class="card bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden">
                <div class="card-body p-4 p-sm-5">

                    <div id="success-alert" class="alert alert-success rounded-3 d-none mb-4 small border-0 shadow-sm"></div>

                    <form id="registerForm">
                        @csrf

                        <x-form-field class="mb-3">
                            <x-form-label for="first_name" class="form-label text-dark fw-semibold small">First Name</x-form-label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="first_name" name="first_name" type="text" placeholder="Shadir" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            </div>
                            <span id="first_name-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <x-form-field class="mb-3">
                            <x-form-label for="last_name" class="form-label text-dark fw-semibold small">Last Name</x-form-label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="last_name" name="last_name" type="text" placeholder="Amjard" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </span>
                            </div>
                            <span id="last_name-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <x-form-field class="mb-3">
                            <x-form-label for="email" class="form-label text-dark fw-semibold small">Email Address</x-form-label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="email" name="email" type="email" placeholder="testuser@gmail.com" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            </div>
                            <span id="email-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <x-form-field class="mb-3">
                            <x-form-label for="password" class="form-label text-dark fw-semibold small">Password</x-form-label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="password" name="password" type="password" placeholder="••••••••" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            </div>
                            <span id="password-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <x-form-field class="mb-4">
                            <x-form-label for="password_confirmation" class="form-label text-dark fw-semibold small">Confirm Password</x-form-label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </span>
                            </div>
                            <span id="password_confirmation-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                            <a href="/users" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
                            <x-form-button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4 shadow-sm d-flex align-items-center gap-2">
                                <i class="bi bi-person-plus-fill fs-5"></i> Register
                            </x-form-button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-admin-layout>

<script type="module">
    $(document).ready(function(){
        $('#registerForm').on('submit', function(e){
            e.preventDefault();
            const formData = Object.fromEntries(new FormData(this));
            axios.post('/register', formData)
            .then(function(response){
                if (response.data && response.data.redirect_url){
                    window.location.href = response.data.redirect_url;
                } else {
                    window.location.href = '/users';
                }
            })
            .catch(function(error){
                console.error(error);
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;
                } else {
                    alert ('something went wrong, try again later');
                }
            });
        });
    });
</script>
