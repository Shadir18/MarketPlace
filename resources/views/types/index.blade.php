<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center p-2 pe-2 mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Types</h2>
            <a href="#" data-bs-toggle="modal" data-bs-target="#typemodel" class="btn btn-primary btn-sm fw-bold"><i class="bi bi-diagram-3 pe-2"></i>Add New</a>
        </div>

            <div class="table-responsive">
                <table id="TypeTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
            {{-- edit model --}}
            <div class="modal" id="typeEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Type Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="edittypeform">
                                    @csrf
                                    <input type="hidden" id="typeID" name="id">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Type Name</label>
                                        <input type="text" id="typename" name="name" class="form-control" required>
                                        <div class="invalid-feedback" id="error-name"></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="slug" class="form-label fw-bold">Slug</label>
                                        <input id="typeslug" name="slug" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-slug"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label fw-bold">Type</label>
                                        <input id="typeis_active" name="is_active" placeholder="Type active or deactive" type="text" class="form-control" required>
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
            {{-- create model --}}
            <div class="modal" id="typemodel" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="h4 mb-1 font-weight-bold">Add New Type</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form id="createTypeForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">Type Name</label>
                                    <input id="name" name="name" placeholder="Name" class="form-control" required>
                                    <div class="invalid-feedback" id="error-name"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label fw-bold">Slug</label>
                                    <input id="slug" name="slug" placeholder="Slug" class="form-control">
                                    <div class="invalid-feedback" id="error-slug"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="is_active" class="form-label fw-bold">Active</label>
                                    <input id="is_active" name="is_active" placeholder="Type active or deactive" placeholder="Yes or No" class="form-control">
                                    <div class="invalid-feedback" id="error-is_active"></div>
                                </div>

                                <div class="border-top pt-3 d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="createTypeForm" class="btn btn-primary px-4 fw-bold">Create</button>
                                </div>
                            </form>
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
                    data: response.data,
                    columns: [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'slug' },
                        { data: 'is_active' },
                        { data: null,
                            render: function (data, type, row){
                                return `
                                    <a data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#typeEdit" class="btn btn-sm btn-primary fw-bold view-edit-btn">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button data-id="${row.id}" class="btn btn-sm btn-danger fw-bold delete-btn">
                                        <i class="bi bi-trash3"></i>
                                    </button>`;
                            },
                        },
                    ],
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
    // create
    $('#createTypeForm').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData($('#createTypeForm')[0]);
        axios.post('/types' ,formData)
        .then(function (response){
            window.location.href = `/types`;
            console.log(response.data);
        })
        .catch(error => {
            console.error(error.response.data);
        });
    });
    //view
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