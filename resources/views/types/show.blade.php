<x-admin-layout>
    <x-slot:heading>View Type Properties</x-slot:heading>
    <div class="container my-4">
        <div class="card bg-white rounded-4 border border-light-subtle shadow-sm mx-auto" style="max-width: 480px;">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <span class="badge text-bg-warning text-dark text-uppercase px-3 py-1 rounded-pill fw-bold small">Type Details</span>
                    <h2 class="h4 fw-bold text-dark mt-2 mb-0">{{ $type->name }}</h2>
                </div>

                <div class="mb-3">
                    <div class="text-secondary fw-semibold small mb-1">Slug URL</div>
                    <div class="p-2 bg-light border border-light-subtle rounded-3 text-dark fw-medium">
                        {{ $type->slug }}
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-secondary fw-semibold small mb-1">System Status</div>
                    <div class="p-2 bg-light border border-light-subtle rounded-3 text-dark fw-medium">
                        <span>
                            {{ $type->is_active ? 'Active Configuration' : 'Disabled Configuration' }}
                        </span>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                    <a href="/types" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                        Back to Types
                    </a>
                    <a href="/types/{{ $type->id }}/edit" class="btn btn-warning text-dark btn-sm fw-bold rounded-pill px-4 shadow-sm">
                        Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>