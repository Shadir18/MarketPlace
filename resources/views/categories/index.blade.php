<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 font-weight-bold">Categories</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm fw-bold">Add New</a>
        </div>

            <div class="table-responsive p-0">
                <table id="CategoryTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
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
                        @foreach ($categories as $category)
                            <tr id="row-{{ $category->id }}">
                                <td class="ps-3 text-muted">{{ $category->id }}</td>
                                <td> <strong>{{ $category->name }}</strong> </td>
                                <td>{{ $category->slug }}</td>                                
                                <td>
                                    <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <a data-id="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#categoryEdit" class="btn btn-sm btn-warning fw-bold view-edit-btn">Edit</a>
                                    <button data-id="{{ $category->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal" id="categoryEdit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="editCategoryForm">
                                    @csrf
                                    <input type="hidden" id="categoryID" name="id">
                                    
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-bold">Category Name</label>
                                        <input type="text" id="categoryname" name="name" class="form-control" required>
                                        <div class="invalid-feedback" id="error-name"></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="slug" class="form-label fw-bold">Title</label>
                                        <input id="categoryslug" name="slug" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-slug"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label fw-bold">Type</label>
                                        <input id="categoryis_active" name="is_active" type="text" class="form-control" required>
                                        <div class="invalid-feedback" id="error-is_active"></div>
                                    </div>
                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="editCategoryForm" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

</x-admin-layout>
<script type="module">
    $(document).ready(function (){
        $('#CategoryTable').DataTable({
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

    $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const categoryID = $(this).data('id');
         axios.get(`/categories/${categoryID}`)
            .then(function (response) {
                const data = response.data;
                $('.invalid-feedback').text('');
                $('.form-control').removeClass('is-invalid');
                $('#categoryID').val(data.id);
                $('#categoryname').val(data.name);
                $('#categoryslug').val(data.slug);
                $('#categoryis_active').val(data.is_active);
            })
    })

    $('#editCategoryForm').on('submit', function (e){
        e.preventDefault();
        const id = $('#categoryID').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        axios.post(`/categories/${id}`, formData)
        .then(function (response){
            window.location.href = `/categories`;
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
                axios.delete(`/categories/${id}`)
                .then(function(response){
                    window.location.href = '/categories';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>