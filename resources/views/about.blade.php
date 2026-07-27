<x-guest-layout>

<section class="bg-body-tertiary text-dark rounded-4 min-vh-75 d-flex flex-column justify-content-between p-4 p-md-5 mb-4 border border-light-subtle shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider">
            About Us
        </span>
        <span class="text-muted small d-none d-sm-inline">Safe & Direct Vehicle Marketplace</span>
    </div>

    <div class="my-auto py-2">
        <div class="row g-4 align-items-center">
            
            <div class="col-lg-5">
                <h1 class="display-5 fw-bold mb-3 text-dark">
                    Driven by trust, <br>
                    <span class="text-warning">built for simplicity.</span>
                </h1>
                <p class="text-secondary mb-4" style="max-width: 45ch;">
                    {{ env('APP_NAME', 'Our marketplace') }} was created to take the friction out of buying and selling vehicles. No hidden middleman fees, no automated spam—just verified buyers and sellers dealing directly with one another.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <x-button href="/post_ads" class="btn btn-warning text-dark fw-semibold px-4 py-2 shadow-sm">
                        <i class="bi bi-plus-circle me-2"></i>Post an Ad Now
                    </x-button>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="d-flex flex-column gap-3">
                    
                    <div class="d-flex align-items-start gap-3 p-3 rounded-4 bg-white border border-light-subtle shadow-sm">
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-shield-check fs-3"></i>
                        </div>
                        <div>
                            <h3 class="h6 fw-bold text-dark mb-1">Human-Reviewed Listings</h3>
                            <p class="small text-muted mb-0">Every listing undergoes manual moderation before going live to ensure real photos, accurate pricing, and honest vehicle details.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 p-3 rounded-4 bg-white border border-light-subtle shadow-sm">
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-chat-dots-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="h6 fw-bold text-dark mb-1">Direct Peer-to-Peer Deals</h3>
                            <p class="small text-muted mb-0">Communicate directly with vehicle owners or buyers. Negotiate terms, arrange test drives, and close the deal on your timeline.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 p-3 rounded-4 bg-white border border-light-subtle shadow-sm">
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3 d-flex align-items-center justify-content-center flex-shrink-0">
                            <i class="bi bi-speedometer2 fs-3"></i>
                        </div>
                        <div>
                            <h3 class="h6 fw-bold text-dark mb-1">Quick & Simple Posting</h3>
                            <p class="small text-muted mb-0">List your car, bike, or truck in under three minutes with our streamlined submission process.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="pt-4 border-top border-light-subtle mt-4">
        <div class="row text-center text-md-start text-muted">
            <div class="col-md-4 mb-2 mb-md-0">
                <small><i class="bi bi-check-circle-fill text-warning me-1"></i> Verified Seller Profiles</small>
            </div>
            <div class="col-md-4 mb-2 mb-md-0 text-md-center">
                <small><i class="bi bi-tag-fill text-warning me-1"></i> No Hidden Platform Fees</small>
            </div>
            <div class="col-md-4 text-md-end">
                <small><i class="bi bi-star-fill text-warning me-1"></i> Trusted Community</small>
            </div>
        </div>
    </div>

</section>

</x-guest-layout>