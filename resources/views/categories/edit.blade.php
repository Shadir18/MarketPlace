<x-admin-layout>
    <x-slot:heading>Edit Category: {{ $category->name }}</x-slot:heading>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">Modify</h4>
            </div>
            
            <div class="card-body p-4">
                <form id="editCategoryForm" method="POST" action="/categories/{{ $category->id }}" >
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Category Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $category->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Title</label>
                        <input id="slug" name="slug" type="text" class="form-control" value="{{ $category->slug }}" required>
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-3">
                        <label for="is_active" class="form-label fw-bold">Type</label>
                        <input id="is_active" name="is_active" type="text" class="form-control" value="{{ $category->is_active }}" required>
                        <div class="invalid-feedback" id="error-is_active"></div>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <a href="/categories" class="btn btn-light border px-4">Cancel</a>
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
        $('#editCategoryForm').on('submit', function(e){
            e.preventDefault();
            const id = "{{ $category->id }}";
            const formData = new FormData($('#editCategoryForm')[0]);
            formData.append('_method', 'PUT');
            axios.post(`/categories/${id}`, formData)
            .then(function(response){
                window.location.href = `/categories/${id}`;
                console.log(response.data)
            })
            .catch(function (error) {
                console.error(error.response.data);
            })
        })
    })
</script>