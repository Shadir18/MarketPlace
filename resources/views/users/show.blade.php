<x-admin-layout>
    <x-slot:heading>View Type Properties</x-slot:heading>
    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-dark text-white p-4">
                <h2 class="h4 mb-0 font-weight-bold">{{ $users->first_name }} {{ $users->last_name }}</h2>
            </div>
            
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-sm-4 text-muted fw-bold">First Name</div>
                    <div class="col-sm-8 text-dark">{{ $users->first_name }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4 text-muted fw-bold">Last Name</div>
                    <div class="col-sm-8 text-dark">{{ $users->last_name }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-4 text-muted fw-bold">Email</div>
                    <div class="col-sm-8 text-dark">{{ $users->email }}</div>
                </div>
                

                <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                    <a href="/users" class="btn btn-outline-secondary btn-sm fw-bold">
                        Back to Types
                    </a>
                    <a href="/users/{{ $users->id }}/edit" class="btn btn-warning btn-sm fw-bold">
                        Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>