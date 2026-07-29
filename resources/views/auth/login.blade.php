<x-guest-layout>
    <div class="d-flex align-items-center justify-content-center py-5" style="min-height: 80vh;">
        <div class="w-100" style="max-width: 440px;">
            
            <div class="text-center mb-4">
                <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider mb-3">
                    Welcome Back
                </span>
                <h1 class="h2 fw-bold text-dark mb-1">
                    <a href="{{ route('home') }}" class="text-decoration-none text-dark hover-warning">
                        {{ config('app.name', 'MarketPlace') }}
                    </a>
                </h1>
                <p class="text-secondary small mb-0">Enter your credentials to access your account</p>
            </div>

            <div class="card bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden">
                <div class="card-body p-4 p-sm-5">

                    <form id="loginForm" method="POST" action="/login">
                        @csrf
                        
                        <div id="general-error" class="alert alert-danger rounded-3 d-none mb-4 small border-0 shadow-sm"></div>

                        <x-form-field class="mb-3">
                            <label for="email" class="form-label text-dark fw-semibold small">Email Address</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="email" name="email" type="email" placeholder="testuser@gmail.com" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" value="admin@example.com" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            </div>
                            <span id="email-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <x-form-field class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label text-dark fw-semibold small mb-0">Password</label>
                                <a href="/forgot-password" class="text-decoration-none text-secondary hover-warning small">Forgot password?</a>
                            </div>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="password" name="password" type="password" placeholder="••••••••" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" value="123456" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            </div>
                            <span id="password-error" class="text-danger small mt-1 d-none"></span>
                        </x-form-field>

                        <div class="form-check mb-4">
                            <input class="form-check-input focus-ring focus-ring-warning" type="checkbox" id="remember" name="remember_me">
                            <label class="form-check-label small user-select-none text-secondary" for="remember">
                                Remember me on this device
                            </label>
                        </div>

                        <div class="d-grid mb-3">
                            <x-form-button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill py-2-5 shadow-sm d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-box-arrow-in-right fs-5"></i> Sign In
                            </x-form-button>
                        </div>
                    </form>

                    <div class="text-center pt-3 mt-3 border-top border-light-subtle">
                        <p class="mb-0 small text-secondary">
                            Don't have an account? 
                            <a href="/register" class="text-dark fw-bold text-decoration-none hover-warning">Register now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script type="module">
    $(document).ready(function(){
        $('#loginForm').on('submit', function(e){
            e.preventDefault();
            const email = $('#email').val();
            const password = $('#password').val();
            axios.post('/login', {
                email: email,
                password: password
            })
            .then(function(response){
                if (response.data.token){
                    localStorage.setItem('token', response.data.token);
                }
                window.location.href = '/dashboard';
                console.log(response.data);
            })
            .catch(function(error){
                console.error(error);
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.error;
                    if (errors.email) {
                        $('#email-error').removeClass('d-none').text(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#password-error').removeClass('d-none').text(errors.password[0]);
                    }
                } else if (error.response && error.response.data && error.response.data.message) {
                    $('#general-error').removeClass('d-none').text(error.response.data.message);
                } else {
                    $('#general-error').removeClass('d-none').text('Please try again later.');
                }
            });
        });
    });
</script>