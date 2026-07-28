<x-guest-layout>
        <div class="row align-items-center py-4">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider mb-3">
                    MarketPlace Listings
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3">
                    Find What You're Looking For <br>
                    <span class="text-warning">At Great Prices.</span>
                </h1>
                <p class="text-secondary mb-4 mx-auto" style="max-width: 55ch;">
                    Browse through thousands of approved listings from verified sellers across multiple categories.
                </p>

                <form action="/search" method="GET" class="w-100 mx-auto" style="max-width: 600px;">
                    <div class="input-group input-group-lg bg-white p-1 rounded-pill border border-light-subtle shadow-sm">
                        <input type="text" name="query" class="form-control border-0 bg-transparent text-dark ps-4 pe-2 shadow-none" placeholder="What are you looking for?">
                        <button class="btn btn-warning text-dark fw-semibold rounded-pill px-4" type="submit">
                            <i class="bi bi-search me-1"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Latest Approved Listings</h2>
                <p class="text-secondary small mb-0">Discover recent additions to our marketplace</p>
            </div>
        </div>

        <div class="row g-5">
            @forelse ($postAds as $ad)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="card h-100 bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden d-flex flex-column">
    
                        <div class="position-relative bg-light" style="height: 220px;">
                            <img src="{{ asset('storage/' . ($ad->images->first()?->postads_img )) }}" alt="{{ $ad->title }}" class="w-100 h-100 object-fit-cover">
                            <span class="position-absolute top-0 end-0 bg-warning text-dark fw-bold px-3 py-1 m-3 rounded-pill shadow-sm small">
                                LKR {{ ($ad->price ) }}.00
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-warning bg-opacity-10 text-dark border border-warning-subtle rounded-2 px-2 py-1 small fw-semibold">
                                    {{ $ad->category->name ?? 'General' }}
                                </span>
                            </div>

                            <h3 class="h5 fw-bold text-dark mb-2">
                                <a href="#" class="text-decoration-none text-dark hover-warning">
                                    {{ $ad->title }}
                                </a>
                            </h3>

                            <div class="d-flex align-items-center gap-3 text-secondary small mb-3">
                                <span><i class="bi bi-speedometer2 text-warning me-1"></i> {{ ($ad->mileage) }} km</span>
                                <span><i class="bi bi-calendar3 text-warning me-1"></i> {{ $ad->manufacture_year }}</span>
                            </div>

                            <div class="mt-auto pt-3 border-top border-light-subtle d-flex align-items-center justify-content-between text-muted small">
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bi bi-person-circle text-warning"></i> 
                                    {{ $ad->user->name ?? 'User' }}
                                </span>
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bi bi-clock text-warning"></i> 
                                    {{ $ad->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 bg-body-tertiary rounded-4 border border-light-subtle">
                        <i class="bi bi-inbox fs-1 text-secondary mb-3 d-block"></i>
                        <h4 class="fw-bold text-dark">No Ads Available</h4>
                        <p class="text-secondary small mb-0">There are no approved listings available at the moment. Please check back later!</p>
                    </div>
                </div>
            </form>
            @endforelse
        </div>
    </div>
</x-guest-layout>