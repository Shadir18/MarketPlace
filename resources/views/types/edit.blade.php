<x-admin-layout>
    <x-slot:heading>Edit Type: {{ $type->name }}</x-slot:heading>
    <div class="container my-4">
        <div class="card bg-white rounded-4 border border-light-subtle shadow-sm mx-auto" style="max-width: 480px;">
            <div class="card-body p-4">

                <div class="text-center mb-3">
                    <span class="badge text-bg-warning text-dark text-uppercase px-3 py-1 rounded-pill fw-bold small">Type Management</span>
                    <h2 class="h4 fw-bold text-dark mt-2 mb-0">Edit Type</h2>
                </div>

                <form id="editTypeForm" method="POST" action="/types/{{ $type->id }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark fw-semibold small mb-1">Type Name</label>
                        <input id="name" name="name" type="text" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" value="{{ $type->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label text-dark fw-semibold small mb-1">Slug URL</label>
                        <input id="slug" name="slug" type="text" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" value="{{ $type->slug }}" required>
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ $type->is_active ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label text-dark fw-semibold small">Mark Status as Active</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                        <a href="/types" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Cancel</a>
                        <button type="submit" class="btn btn-warning text-dark btn-sm fw-bold rounded-pill px-4 shadow-sm">
                            Update Context
                        </button>
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