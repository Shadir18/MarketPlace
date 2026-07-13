<x-admin-layout>
    <x-slot:heading>Edit Type: {{ $model->name }}</x-slot:heading>

    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">Modify </h4>
            </div>
            
            <div class="card-body p-4">
                <form id="editEditForm" method="POST" action="/models/{{ $model->id }}" >
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Model Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $model->name }}" required>
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $model->title }}" required>
                        <div class="invalid-feedback" id="error-title"></div>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Type</label>
                        <input id="type" name="type" type="text" class="form-control" value="{{ $model->type }}" required>
                        <div class="invalid-feedback" id="error-type"></div>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <a href="/models" class="btn btn-light border px-4">Cancel</a>
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