<x-admin-layout>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Message Details</h2>
    </div>

    <div class="card border shadow-sm">
        <div class="card-body p-4">
            
            <div class="row g-3 mb-4 pb-3 border-bottom">
                <div class="col-md-4">
                    <small class="text-muted d-block">From</small>
                    <strong>{{ $contactMessages->name }}</strong>
                </div>
                <div class="col-md-4">
                    <small class="text-muted d-block">Email</small>
                    <a href="mailto:{{ $contactMessages->email }}">{{ $contactMessages->email }}</a>
                </div>
                <div class="col-md-4">
                    <small class="text-muted d-block">Date Received</small>
                    <span>{{ $contactMessages->created_at ? $contactMessages->created_at->format('M d, Y h:i A') : 'N/A' }}</span>
                </div>
            </div>

            <div class="mb-3">
                <small class="text-muted d-block">Subject</small>
                <h5 class="fw-bold text-dark">{{ $contactMessages->subject }}</h5>
            </div>

            <div class="mb-4">
                <small class="text-muted d-block mb-1">Message</small>
                <div class="p-3 bg-light rounded border text-dark" style="white-space: pre-line;">
                    {{ $contactMessages->message }}
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-2">
                <a href="{{ route('contactmessages.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> Go Back
                </a>

                <a href="" class="btn btn-primary">
                    <i class="bi bi-reply-fill me-1"></i> Reply via Email
                </a>
            </div>

        </div>
    </div>
</x-admin-layout>