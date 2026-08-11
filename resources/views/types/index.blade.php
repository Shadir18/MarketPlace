<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Types</h2>
            <a href="{{ route('types.create') }}" class="btn btn-primary btn-sm fw-bold">Add New</a>
        </div>

            <div class="table-responsive">
                <table id="TypeTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end pe-3 no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr id="row-{{ $type->id }}">
                                <td class="ps-3 text-muted">{{ $type->id }}</td>
                                <td><strong>{{ $type->name }}</strong></td>
                                <td><code class="text-secondary bg-light px-2 py-1 rounded small">{{ $type->slug }}</code></td>
                                <td>
                                    <span class="badge {{ $type->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $type->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <a data-id="{{ $type->id }}" data-bs-toggle="modal" data-bs-target="#typeEdit" class="btn btn-sm btn-warning fw-bold view-edit-btn">Edit</a>
                                    <button data-id="{{ $type->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal" id="typeEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="edittypeform">
                                    @csrf
                                    <input type="hidden" id="typeID" name="id">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Category Name</label>
                                        <input type="text" id="typename" name="name" class="form-control" required>
                                        <div class="invalid-feedback" id="error-name"></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="slug" class="form-label fw-bold">Title</label>
                                        <input id="typeslug" name="slug" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-slug"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label fw-bold">Type</label>
                                        <input id="typeis_active" name="is_active" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-is_active"></div>
                                    </div>
                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="edittypeform" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        axios.get('/types')
            .then(function (response) {
                $('#TypeTable').DataTable({
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
        })

    $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const typeID = $(this).data('id');
         axios.get(`/types/${typeID}`)
            .then(function (response) {
                const data = response.data;
                $('#typeID').val(data.id);
                $('#typename').val(data.name);
                $('#typeslug').val(data.slug);
                $('#typeis_active').val(data.is_active);
                $('#typeEdit').modal('show');
            })
    })

    $('#edittypeform').on('submit', function (e){
        e.preventDefault();
        const id = $('#typeID').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        axios.post(`/types/${id}`, formData)
        .then(function (response){
            window.location.href = `/types`;
        })
        .catch(function (error){
            console.error(error.response.data);
        })
    });

        //Delete Function
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this product?')) {
                axios.delete(`/types/${id}`)
                .then(function(response){
                    window.location.href = '/types';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>