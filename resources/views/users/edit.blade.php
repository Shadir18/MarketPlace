<x-admin-layout>
    <x-slot:heading>Editing : {{ $users->last_name }}</x-slot:heading>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">Modify </h4>
            </div>
            
            <div class="card-body p-4">
                <form id="editUserForm" method="POST" action="/users/{{ $users->id }}" >
                    @csrf
                    
                    <div class="mb-3">
                        <label for="first_name" class="form-label fw-bold">First Name</label>
                        <input id="first_name" name="first_name" type="text" class="form-control" value="{{ $users->first_name }}" required>
                        <div class="invalid-feedback" id="error-first_name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label fw-bold">Last Name</label>
                        <input id="last_name" name="last_name" type="text" class="form-control" value="{{ $users->last_name }}" required>
                        <div class="invalid-feedback" id="error-last_name"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Mail</label>
                        <input id="email" name="email" type="text" class="form-control" value="{{ $users->email }}" required>
                        <div class="invalid-feedback" id="error-email"></div>
                    </div>

                    <div id="div1" class="mb-3">
                        <label for="password" class="form-label fw-bold">New Password</label>
                        <input id="password" name="password" type="text" class="form-control" placeholder="New Password" autocomplete="new-password" onfocus="this.type='password'">
                        <div class="invalid-feedback" id="error-password"></div>
                    </div>

                    <div id="div2" class="mb-3 ">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="text" class="form-control" placeholder="Confirm New Password" autocomplete="new-password" onfocus="this.type='password'">
                        <div class="invalid-feedback" id="error-password_confirmation"></div>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <button id="chngpassbtn" type="button" class="btn btn-primary me-auto">Change password</button>
                        <a href="/users" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 fw-bold">Update Context</button>
                    </div>
                </form>
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