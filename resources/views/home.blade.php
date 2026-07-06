<x-layout>
    @guest
        <x-header />
    @endguest

    <div class="bg-dark text-white py-5 mb-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 text-uppercase font-weight-bold tracking-wider">Next-Gen Marketplace</span>
            <h1 class="display-4 font-weight-bold mb-3">Find Everything You Need, <br><span class="text-warning">All in One Place</span></h1>
            <p class="lead text-white-50 max-w-2xl mx-auto mb-4">
                Discover top-tier products from verified businesses. Fast, secure, and built specifically for modern trade.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/products" class="btn btn-warning btn-lg px-4 font-weight-bold shadow-sm">
                    <i class="bi bi-bag-fill mr-2"></i> Explore Products
                </a>
                @guest
                    <a href="/register" class="btn btn-outline-light btn-lg px-4">
                        Become a Seller
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <div class="container my-5 py-4">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold text-dark">Why Shop With Us?</h2>
            <p class="text-muted">We provide an optimized B2B and B2C commerce experience.</p>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                    <div class="text-primary mb-3" style="font-size: 2.5rem;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="font-weight-bold mb-2">Verified Sellers</h4>
                    <p class="text-muted small mb-0">Every product listing comes from authenticated, registered market companies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                    <div class="text-warning mb-3" style="font-size: 2.5rem;">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h4 class="font-weight-bold mb-2">Lightning Fast UI</h4>
                    <p class="text-muted small mb-0">Powered by modern reactive single-endpoint Axios hooks for real-time changes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-3">
                    <div class="text-success mb-3" style="font-size: 2.5rem;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h4 class="font-weight-bold mb-2">Transparent Pricing</h4>
                    <p class="text-muted small mb-0">Direct company pricing with no hidden developer or intermediary overhead fees.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>