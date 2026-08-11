<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Models</h2>
            <a href="#" data-bs-toggle="modal" data-bs-target="#createusermodal" class="btn btn-primary btn-sm fw-bold">Add New</a>
        </div>

            <div class="table-responsive">
                <table id="UserTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th class="text-end pe-3 no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr id="row-{{ $user->id }}">
                                <td class="ps-3 text-muted">{{ $user->id }}</td>
                                <td> <strong>{{ $user->first_name }}</strong> </td>
                                <td>{{ $user->last_name }}</td>                                
                                <td>{{ $user->email }}</td>
                                <td class="text-end pe-3">
                                    <a data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#userEdit" class="btn btn-sm btn-warning fw-bold view-edit-btn">Edit</a>
                                    <button data-id="{{ $user->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- edit modal --}}
            <div class="modal" id="userEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="editUserForm" method="POST" >
                                    @csrf
                                    <input type="hidden" id="userID" name="id">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label fw-bold">First Name</label>
                                        <input id="first_name" name="first_name" type="text" class="form-control">
                                        <div class="invalid-feedback" id="error-first_name"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label fw-bold">Last Name</label>
                                        <input id="last_name" name="last_name" type="text" class="form-control">
                                        <div class="invalid-feedback" id="error-last_name"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold">Mail</label>
                                        <input id="useremail" name="email" type="text" class="form-control">
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
                                </form>
                            </div>
                        <div class="modal-footer">
                            <button id="chngpassbtn" type="button" class="btn btn-primary me-auto">Change password</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="editUserForm" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- create modal --}}
            <div class="modal" id="createusermodal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="h4 mb-1 font-weight-bold">Add New User</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form id="createuserform" >
                                @csrf
                                
                                <x-form-field class="mb-3">
                                    <x-form-label for="first_name" class="fw-bold mb-1">First Name</x-form-label>
                                    <div class="input-group ">
                                        <input  id="first_name" name="first_name" placeholder="Shadir" class="form-control mb-2" required>
                                        <div class="input-group-text bg-light border-start-0 text-muted">
                                            <span class="bi bi-person"></span>
                                        </div>
                                    </div>
                                    <span id="first_name-error" class="text-danger small mt-1 d-none d-block"></span>
                                </x-form-field>

                                <x-form-field class="mb-3">
                                    <x-form-label for="last_name" class="fw-bold mb-1">Last Name</x-form-label>
                                    <div class="input-group">
                                        <input id="last_name" name="last_name" placeholder="Amjard" class="form-control mb-2" required />
                                        <div class="input-group-text bg-light border-start-0 text-muted">
                                            <span class="bi bi-person-vcard"></span>
                                        </div>
                                    </div>
                                    <span id="last_name-error" class="text-danger small mt-1 d-none d-block"></span>
                                </x-form-field>

                                <x-form-field class="mb-3">
                                    <x-form-label for="email" class="fw-bold mb-1">Email Address</x-form-label>
                                    <div class="input-group">
                                        <input id="email" name="email" type="email" placeholder="testuser@gmail.com" class="form-control mb-2" required />
                                        <div class="input-group-text bg-light border-start-0 text-muted">
                                            <span class="bi bi-envelope"></span>
                                        </div>
                                    </div>
                                    <span id="email-error" class="text-danger small mt-1 d-none d-block"></span>
                                </x-form-field>

                                <x-form-field class="mb-3">
                                    <x-form-label for="password" class="fw-bold mb-1">Password</x-form-label>
                                    <div class="input-group">
                                        <input id="password" name="password" type="password" placeholder="••••••••" class="form-control mb-2" required />
                                        <div class="input-group-text bg-light border-start-0 text-muted">
                                            <span class="bi bi-lock-fill"></span>
                                        </div>
                                    </div>
                                    <span id="password-error" class="text-danger small mt-1 d-none d-block"></span>
                                </x-form-field>

                                <x-form-field class="mb-4">
                                    <x-form-label for="password_confirmation" class="fw-bold mb-1">Confirm Password</x-form-label>
                                    <div class="input-group">
                                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="form-control mb-2" required />
                                        <div class="input-group-text bg-light border-start-0 text-muted">
                                            <span class="bi bi-shield-lock"></span>
                                        </div>
                                    </div>
                                    <span id="password_confirmation-error" class="text-danger small mt-1 d-none d-block"></span>
                                </x-form-field>

                                <div class="border-top pt-3 d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="createuserform" class="btn btn-primary px-4 fw-bold">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        $('#UserTable').DataTable({
        layout:{
            bottomEnd: {
                paging: {
                    firstLast: false
                }
            }
        },
        pageLength: 25,
        scrollY: 600,
        scroller: true,
    });
    //create
    $('#createuserform').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData($('#createuserform')[0]);
        axios.post('/users' ,formData)
        .then(function (response){
            window.location.href = `/users`;
            console.log(response.data);
        })
        .catch(error => {
            console.error(error.response.data);
        });
    });
    //view
    $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const userID = $(this).data('id');
         axios.get(`/users/${userID}`)
            .then(function (response) {
                const data = response.data;
                $('#userID').val(data.id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#useremail').val(data.email);
            })
    })
    
    $('#editUserForm').on('submit', function (e){
        e.preventDefault();
        const id = $('#userID').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        axios.post(`/users/${id}`, formData)
        .then(function (response){
            window.location.href = `/users`;
        })
        .catch(function (error){
            console.error(error.response.data);
        })
    });
    
    $(document).ready(function(){
        $('#div1, #div2').hide();
        $('#chngpassbtn').on('click', function(){
        $('#div1, #div2').fadeToggle();
        })
        $('#editUserForm').on('submit', function(e){
            e.preventDefault();
            const userID = $(this).data('id');
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

        //Delete Function
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this model?')) {
                axios.delete(`/users/${id}`)
                .then(function(response){
                    window.location.href = '/users';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>