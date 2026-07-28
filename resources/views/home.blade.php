<x-guest-layout>
    <section class="bg-body-tertiary text-dark rounded-4 min-vh-50 d-flex flex-column justify-content-center p-4 p-md-5 mb-5 border border-light-subtle shadow-sm position-relative overflow-hidden">
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
    </section>
</x-guest-layout>