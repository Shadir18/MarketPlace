<x-admin-layout>
    <x-slot:heading>Edit Type: {{ $type->name }}</x-slot:heading>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">Modify </h4>
            </div>
            
            <div class="card-body p-4">
                <form id="editTypeForm" method="POST" action="/types/{{ $type->id }}" >
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Type Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $type->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug URL</label>
                        <input id="slug" name="slug" type="text" class="form-control" value="{{ $type->slug }}" required>
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ $type->is_active ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label fw-bold">Mark Status as Active</label>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <a href="/types" class="btn btn-light border px-4">Cancel</a>
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
        $('#editTypeForm').on('submit', function(e){
            e.preventDefault();
            const id = "{{ $type->id }}";
            const formData = new FormData($('#editTypeForm')[0]);
            formData.append('_method', 'PUT');
            axios.post(`/types/${id}`, formData)
            .then(function(response){
                window.location.href = `/types/${id}`;
                console.log(response.data)
            })
            .catch(function (error) {
                console.error(error.response.data);
            })
        })
    })
</script>