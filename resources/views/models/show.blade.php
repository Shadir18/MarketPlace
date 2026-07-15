<x-admin-layout>
    <x-slot:heading>View Model Properties</x-slot:heading>
    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h2 class="h4 mb-0 font-weight-bold">{{ $model->name }}</h2>
            </div>
            
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted fw-bold">Slug</div>
                    <div class="col-sm-8 text-dark"><code class="bg-light px-2 py-1 rounded small">{{ $model->slug }}</code></div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted fw-bold">Active Status</div>
                    <div class="col-sm-8 text-dark"><code class="bg-light px-2 py-1 rounded small">{{ $model->is_active }}</code></div>
                </div>

                <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                    <a href="/models" class="btn btn-outline-secondary btn-sm fw-bold">
                        Back to Types
                    </a>
                    <a href="/models/{{ $model->id }}/edit" class="btn btn-warning btn-sm fw-bold">
                        Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>