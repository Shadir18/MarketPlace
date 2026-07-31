<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Models</h2>
            <a href="{{ route('models.create') }}" class="btn btn-primary btn-sm fw-bold">Add New</a>
        </div>

            <div class="table-responsive">
                <table id="ModelTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Name</th>
                            <th>slug</th>
                            <th>Active Status</th>
                            <th class="text-end pe-3 no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr id="row-{{ $model->id }}">
                                <td class="ps-3 text-muted">{{ $model->id }}</td>
                                <td> <strong>{{ $model->name }}</strong> </td>
                                <td>{{ $model->slug }}</td>                                
                                <td>{{ $model->is_active }}</td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('models.edit', $model->id) }}" class="btn btn-sm btn-warning fw-bold me-1">Edit</a>
                                    <button data-id="{{ $model->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        $('#ModelTable').DataTable({
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
                axios.delete(`/models/${id}`)
                .then(function(response){
                    window.location.href = '/models';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>