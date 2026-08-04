<x-admin-layout>
    <div class="container my-4">
        <div class="card bg-white rounded-4 border border-light-subtle shadow-sm mx-auto" style="max-width: 480px;">
            <div class="card-body p-4">
                <div class="text-center mb-3">
                    <span class="badge text-bg-warning text-dark text-uppercase px-3 py-1 rounded-pill fw-bold small">Type Management</span>
                    <h2 class="h4 fw-bold text-dark mt-2 mb-0">Add New Type</h2>
                </div>
                <form id="createTypeForm">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark fw-semibold small mb-1">Name</label>
                        <input id="name" name="name" type="text" placeholder="i8" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label text-dark fw-semibold small mb-1">Slug</label>
                        <input id="slug" name="slug" type="text" placeholder="slug-url" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none">
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" checked value="1">
                        <label for="is_active" class="form-check-label text-dark fw-semibold small">Mark Status as Active</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                        <a href="/types" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Cancel</a>
                        <button type="submit" class="btn btn-warning text-dark btn-sm fw-bold rounded-pill px-4 shadow-sm">
                            Save Configuration
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function(){
        $('#createTypeForm').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData($('#createTypeForm')[0]);
            axios.post('/types' ,formData)
            .then(response => {
                $('#created successful');
                window.location.href = '/types';
            })
            .catch(error => {
                console.error(error.response.data);
            });
        });
    });
</script>