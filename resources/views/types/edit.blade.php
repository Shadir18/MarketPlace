<x-admin-layout>
    <x-slot:heading>Edit Type: {{ $type->name }}</x-slot:heading>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">Modify </h4>
            </div>
            
            <div class="card-body p-4">
                <form id="editTypeForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Type Name</label>
                        <input type="text" id="name" class="form-control" value="{{ $type->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug URL</label>
                        <input type="text" id="slug" class="form-control" value="{{ $type->slug }}" required>
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" id="is_active" class="form-check-input" {{ $type->is_active ? 'checked' : '' }}>
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
    document.getElementById('editTypeForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        axios.put('/types/{{ $type->id }}', {
            name: document.getElementById('name').value,
            slug: document.getElementById('slug').value,
            is_active: document.getElementById('is_active').checked ? 1 : 0
        })
        .then(function(response) {
            window.location.href = response.data.redirect_url || '/types';
        })
        .catch(function(error) {
            if (error.response && error.response.status === 422) {
                const errors = error.response.data.errors;
                Object.keys(errors).forEach(key => {
                    const input = document.getElementById(key);
                    if (input) input.classList.add('is-invalid');
                });
            } else {
                alert('Could not complete modification update.');
            }
        });
    });
</script>