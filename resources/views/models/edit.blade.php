<x-admin-layout>
    <x-slot:heading>Edit Type: {{ $model->name }}</x-slot:heading>

    <div class="container my-4">
        <div class="card bg-white rounded-4 border border-light-subtle shadow-sm mx-auto" style="max-width: 480px;">
            <div class="card-body p-4">

                <div class="text-center mb-3">
                    <span class="badge text-bg-warning text-dark text-uppercase px-3 py-1 rounded-pill fw-bold small">Model Management</span>
                    <h2 class="h4 fw-bold text-dark mt-2 mb-0">Edit Model</h2>
                </div>

                <form id="editEditForm" method="POST" action="/models/{{ $model->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-dark fw-semibold small mb-1">Model Name</label>
                        <input id="name" name="name" type="text" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" value="{{ $model->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label text-dark fw-semibold small mb-1">Title</label>
                        <input id="slug" name="slug" type="text" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" value="{{ $model->slug }}" required>
                        <div class="invalid-feedback" id="error-slug"></div>
                    </div>

                    <div class="mb-4">
                        <label for="is_active" class="form-label text-dark fw-semibold small mb-1">Type</label>
                        <input id="is_active" name="is_active" type="text" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" value="{{ $model->is_active }}" required>
                        <div class="invalid-feedback" id="error-is_active"></div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                        <a href="/models" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Cancel</a>
                        <button type="submit" class="btn btn-warning text-dark btn-sm fw-bold rounded-pill px-4 shadow-sm">Update Context</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    //Edit Function
    $(document).ready(function(){
        $('#editEditForm').on('submit', function(e){
            e.preventDefault();
            const id = "{{ $model->id }}";
            const formData = new FormData($('#editEditForm')[0]);
            formData.append('_method', 'PUT');
            axios.post(`/models/${id}`, formData)
            .then(function(response){
                window.location.href = `/models/${id}`;
                console.log(response.data)
            })
            .catch(function (error) {
                console.error(error.response.data);
            })
        })
    })
</script>