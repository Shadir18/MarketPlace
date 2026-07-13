<x-admin-layout>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h2 class="h4 mb-1 font-weight-bold">Add New Type</h2>
                <p class="text-light opacity-75 small mb-0">Configure a new filter type category for the marketplace application.</p>
            </div>
            
            <div class="card-body p-4">
                <form id="createTypeForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" id="name" name="name" placeholder="i8" class="form-control" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug </label>
                        <input type="text" id="slug" name="slug" placeholder="https://www.bmwusa.com/build-your-own" class="form-control">
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4 form-check form-switch">
                        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" checked value="1">
                        <label for="is_active" class="form-check-label fw-bold">Mark Status as Active</label>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <a href="/types" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Save Configuration</button>
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