<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Models</h2>
            <a href="#" data-bs-toggle="modal" data-bs-target="#createmodel" class="btn btn-primary btn-sm fw-bold"><i class="bi bi-car-front"></i> Add New</a>
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
                                <td>
                                    <span class="badge {{ $model->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $model->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <a data-id="{{ $model->id }}" data-bs-toggle="modal" data-bs-target="#modeledit" class="btn btn-sm btn-primary fw-bold view-edit-btn">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button data-id="{{ $model->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- edit model --}}
            <div class="modal" id="modeledit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="editmodelform">
                                    @csrf
                                    <input type="hidden" id="modelID" name="id">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Category Name</label>
                                        <input type="text" id="modelname" name="name" class="form-control" required>
                                        <div class="invalid-feedback" id="error-name"></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="slug" class="form-label fw-bold">Title</label>
                                        <input id="modelslug" name="slug" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-slug"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label fw-bold">Type</label>
                                        <input id="modelis_active" name="is_active" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-is_active"></div>
                                    </div>
                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="editmodelform" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- create model --}}
            <div class="modal" id="createmodel" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="h4 mb-1 font-weight-bold">Add New Model</h2>
                            <p class="text-light opacity-75 small mb-0">Configure a new filter type model for the marketplace application.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form id="createModelForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Name</label>
                                    <input id="name" name="name" placeholder="Name" class="form-control" required>
                                    <div class="invalid-feedback" id="error-name"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label fw-bold">Slug </label>
                                    <input id="slug" name="slug" placeholder="Slug" class="form-control">
                                    <div class="invalid-feedback" id="error-slug"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="is_active" class="form-label fw-bold">Active</label>
                                    <input id="is_active" name="is_active" placeholder="Yes or No" class="form-control">
                                    <div class="invalid-feedback" id="error-is_active"></div>
                                </div>

                                <div class="border-top pt-3 d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="createModelForm" class="btn btn-primary px-4 fw-bold">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        $('#ModelTable').DataTable({
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
    // create
    $('#createModelForm').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData($('#createModelForm')[0]);
        axios.post('/models' ,formData)
        .then(function (response){
            window.location.href = `/models`;
            console.log(response.data);
        })
        .catch(error => {
            console.error(error.response.data);
        });
    });
    //view
    $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const modelID = $(this).data('id');
         axios.get(`/models/${modelID}`)
            .then(function (response) {
                const data = response.data;
                $('#modelID').val(data.id);
                $('#modelname').val(data.name);
                $('#modelslug').val(data.slug);
                $('#modelis_active').val(data.is_active);
            })
    })
    //edit
    $('#editmodelform').on('submit', function (e){
        e.preventDefault();
        const id = $('#modelID').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        axios.post(`/models/${id}`, formData)
        .then(function (response){
            window.location.href = `/models`;
        })
        .catch(function (error){
            console.error(error.response.data);
        })
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