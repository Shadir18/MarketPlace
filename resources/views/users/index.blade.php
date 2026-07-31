<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Models</h2>
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm fw-bold">Add New</a>
        </div>

        <div class="card shadow-sm border-0 bg-white p-2">
            <div class="table-responsive" style="height: 750px;">
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
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning fw-bold me-1">Edit</a>
                                    <button data-id="{{ $user->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        $('#UserTable').DataTable({
            "dom": "<'row mb-3 align-items-center'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
               "<'row'<'col-md-12'tr>>" +
              "<'row mt-3 align-items-center'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
        columnDefs: [
            {
                targets: 4,
                orderable: false
            }
        ]
    });

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