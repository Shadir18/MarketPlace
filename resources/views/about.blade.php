<x-guest-layout>

<section class="bg-dark text-light rounded-4 min-vh-75 d-flex flex-column justify-content-between p-4 p-md-5 mb-4 position-relative overflow-hidden" data-bs-theme="dark">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="badge text-bg-warning text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider">
            About {{ env('APP_NAME', 'The Marketplace') }}
        </span>
        <span class="text-secondary small d-none d-sm-inline">Verified Listings & Direct Chat</span>
    </div>

    <div class="my-auto py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h1 class="display-4 fw-extrabold mb-3 text-white lh-sm">
                    Buy & sell vehicles <br class="d-none d-md-inline">
                    <span class="text-warning">without the hassle.</span>
                </h1>
                <p class="lead text-secondary mb-4 style-max-width" style="max-width: 55ch;">
                    {{ env('APP_NAME', 'This marketplace') }} connects buyers and sellers directly. Post your listing in minutes, browse verified ads, and make deals with complete peace of mind.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <x-button href="/post_ads" class="btn btn-warning btn-lg fw-semibold px-4">
                        <i class="bi bi-plus-circle me-2"></i>Post an ad
                    </x-button>
                    <a href="#features" class="btn btn-outline-light btn-lg px-4">
                        How it works
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-body-tertiary p-4 rounded-4 border border-secondary border-opacity-25">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="bg-warning text-dark rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                            <i class="bi bi-shield-check fs-4"></i>
                        </div>
                        <div>
                            <h2 class="h6 mb-0 text-white fw-bold">100% Reviewed Ads</h2>
                            <small class="text-secondary">Every ad is checked before going live</small>
                        </div>
                    </div>
                    <hr class="border-secondary opacity-25 my-3">
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <div class="h5 mb-0 text-warning fw-bold">Fast</div>
                            <small class="text-secondary">Post in minutes</small>
                        </div>
                        <div class="border-start border-secondary opacity-25"></div>
                        <div>
                            <div class="h5 mb-0 text-warning fw-bold">Direct</div>
                            <small class="text-secondary">Buyer to seller</small>
                        </div>
                        <div class="border-start border-secondary opacity-25"></div>
                        <div>
                            <div class="h5 mb-0 text-warning fw-bold">Free</div>
                            <small class="text-secondary">No hidden fees</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="features" class="pt-4 border-top border-secondary border-opacity-25">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="d-flex align-items-start gap-3 p-2">
                    <i class="bi bi-tag-fill text-warning fs-4 mt-1"></i>
                    <div>
                        <h3 class="h6 fw-bold mb-1 text-white">1. Post</h3>
                        <p class="small text-secondary mb-0">Add photos, set details, and go live rapidly.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start gap-3 p-2">
                    <i class="bi bi-search text-warning fs-4 mt-1"></i>
                    <div>
                        <h3 class="h6 fw-bold mb-1 text-white">2. Discover</h3>
                        <p class="small text-secondary mb-0">Filter by category, model, and vehicle type.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-start gap-3 p-2">
                    <i class="bi bi-chat-dots-fill text-warning fs-4 mt-1"></i>
                    <div>
                        <h3 class="h6 fw-bold mb-1 text-white">3. Deal</h3>
                        <p class="small text-secondary mb-0">Chat directly and close the deal on your terms.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

</x-guest-layout>