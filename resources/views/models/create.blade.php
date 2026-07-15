<x-admin-layout>
    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h2 class="h4 mb-1 font-weight-bold">Add New Model</h2>
                <p class="text-light opacity-75 small mb-0">Configure a new filter type category for the marketplace application.</p>
            </div>
            
            <div class="card-body p-4">
                <form id="createModelForm">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="model-1" id="name" name="name" placeholder="Name" class="form-control" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label fw-bold">Slug </label>
                        <input type="model-2" id="slug" name="slug" placeholder="Slug" class="form-control">
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-3">
                        <label for="is_active" class="form-label fw-bold">Active</label>
                        <input is_active="model-3" id="is_active" name="is_active" placeholder="Yes or No" class="form-control">
                        <div class="invalid-feedback" id="error-is_active"></div>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <a href="/models" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function(){
        $('#createModelForm').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData($('#createModelForm')[0]);
            axios.post('/models' ,formData)
            .then(response => {
                $('#created successful');
                window.location.href = '/models';
            })
            .catch(error => {
                console.error(error.response.data);
            });
        });
    });
</script>