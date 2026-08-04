<x-admin-layout>
    <x-slot:heading>Editing : {{ $users->last_name }}</x-slot:heading>

    <div class="d-flex align-items-center justify-content-center py-4" style="min-height: 80vh;">
        <div class="w-100" style="max-width: 480px;">
            
            <div class="text-center mb-4">
                <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider mb-3">
                    User Management
                </span>
                <h1 class="h2 fw-bold text-dark mb-1">
                    Edit User Profile
                </h1>
                <p class="text-secondary small mb-0">Update account details for {{ $users->first_name }} {{ $users->last_name }}</p>
            </div>

            <div class="card bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden">
                <div class="card-body p-4 p-sm-5">

                    <form id="editUserForm" method="POST" action="/users/{{ $users->id }}">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name" class="form-label text-dark fw-semibold small">First Name</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="first_name" name="first_name" type="text" value="{{ $users->first_name }}" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="error-first_name"></div>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label text-dark fw-semibold small">Last Name</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="last_name" name="last_name" type="text" value="{{ $users->last_name }}" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-person-vcard-fill"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="error-last_name"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-dark fw-semibold small">Email Address</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="email" name="email" type="email" value="{{ $users->email }}" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none" required>
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="error-email"></div>
                        </div>

                        <div id="div1" class="mb-3">
                            <label for="password" class="form-label text-dark fw-semibold small">New Password</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="password" name="password" type="text" placeholder="New Password" autocomplete="new-password" onfocus="this.type='password'" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none">
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="error-password"></div>
                        </div>

                        <div id="div2" class="mb-4">
                            <label for="password_confirmation" class="form-label text-dark fw-semibold small">Confirm New Password</label>
                            <div class="input-group bg-light border border-light-subtle rounded-3 overflow-hidden mb-2">
                                <input id="password_confirmation" name="password_confirmation" type="text" placeholder="Confirm New Password" autocomplete="new-password" onfocus="this.type='password'" class="form-control border-0 bg-transparent text-dark ps-3 pe-2 shadow-none">
                                <span class="input-group-text bg-transparent border-0 text-warning px-3">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback" id="error-password_confirmation"></div>
                        </div>

                        <div class="mb-4">
                            <button id="chngpassbtn" type="button" class="btn btn-outline-warning text-dark border-warning w-100 rounded-pill fw-bold py-2 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-key-fill"></i> Change Password
                            </button>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                            <a href="/users" class="btn btn-outline-secondary px-4 rounded-pill">Cancel</a>
                            <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4 shadow-sm d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill"></i> Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    //Edit Function
    $(document).ready(function(){
        $('#div1, #div2').hide();
        $('#chngpassbtn').on('click', function(){
        $('#div1, #div2').fadeToggle();
        })
        $('#editUserForm').on('submit', function(e){
            e.preventDefault();
            const id = "{{ $users->id }}";
            const formData = new FormData($('#editUserForm')[0]);
            formData.append('_method', 'PUT');
            axios.post(`/users/${id}`, formData)
            .then(function(response){
                window.location.href = `/users/${id}`;
                console.log(response.data)
            })
            .catch(function (error) {
                console.error(error.response.data);
            })
        })
    })
</script>