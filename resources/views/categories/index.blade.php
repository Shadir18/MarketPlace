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
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning fw-bold me-1">Edit</a>
                                    <button data-id="{{ $category->id }}" class="btn btn-sm btn-danger fw-bold delete-btn">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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