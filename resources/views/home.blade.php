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

                <form action="{{ route('home') }}" method="GET" class="w-100 mx-auto" style="max-width: 600px;">
                    <div class="input-group input-group-lg bg-white p-1 rounded-pill border border-light-subtle shadow-sm">
                        <input type="text" name="query" value="{{ request('query') }}" class="form-control border-0 bg-transparent text-dark ps-4 pe-2 shadow-none" placeholder="What are you looking for?">
                        <button class="btn btn-warning text-dark fw-semibold rounded-pill px-4" type="submit">
                            <i class="bi bi-search me-1"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-5 mb-4 pb-3 border-bottom border-light-subtle">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-0">Latest Approved Listings</h2>
                    <p class="text-secondary small mb-0">Discover recent additions to our marketplace</p>
                </div>

                <form action="{{ route('home') }}" method="GET" class="d-flex align-items-center gap-2">
                    @if(request('query'))
                        <input type="hidden" name="query" value="{{ request('query') }}">
                    @endif
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <div class="d-flex align-items-center bg-white border border-light-subtle rounded-4 px-3 py-2 shadow-sm">
                        <span class="text-secondary small me-2">Show:</span>
                        <select name="perpage" class="form-select border-0 bg-transparent p-0 text-dark fw-bold small shadow-none cursor-pointer" style="width: 3cm;" onchange="this.form.submit()">
                            @foreach ([5, 10, 25, 50, 100] as $size)
                                <option value="{{ $size }}" @selected(($postAdsPerPage ?? request('perpage')) == $size)>
                                    {{ $size }} Entries
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex align-items-center bg-white border border-light-subtle rounded-4 px-3 py-2 shadow-sm">
                        <i class="bi bi-sort-down text-warning me-2 fs-5"></i>
                        <span class="text-secondary small me-2 d-none d-sm-inline">Sort by:</span>
                        <select name="sort" class="form-select border-0 bg-transparent p-0 text-dark fw-bold small shadow-none cursor-pointer" style="width: auto;" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Ads</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </div>

                    @if(request('category') || request('sort') || request('query'))
                        <a href="{{ route('home') }}" class="btn btn-outline-danger btn-sm rounded-4 px-3 py-2 shadow-sm fw-semibold d-flex align-items-center gap-1" title="Clear Filters">
                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="d-flex align-items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
                <a href="{{ route('home', array_merge(request()->except('category'))) }}" 
                class="btn btn-sm rounded-pill px-4 py-2 fw-semibold text-nowrap transition-all {{ !request('category') ? 'btn-dark shadow-sm' : 'btn-light border border-light-subtle text-secondary' }}">
                    <i class="bi bi-grid-fill me-1"></i> All Items
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('home', array_merge(request()->except('category'), ['category' => $category->id])) }}" 
                    class="btn btn-sm rounded-pill px-4 py-2 fw-semibold text-nowrap transition-all {{ request('category') == $category->id ? 'btn-warning text-dark shadow-sm' : 'btn-light border border-light-subtle text-dark hover-warning' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @forelse ($postAds as $ad)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="card post-card h-100 bg-white rounded-4 border border-light-subtle shadow-sm overflow-hidden d-flex flex-column cursor-pointer"
                    data-bs-toggle="modal"
                    data-bs-target="#adModal"
                    style="cursor: pointer;"
                    data-id="{{ $ad->id }}"
                    data-title="{{ $ad->title }}"
                    data-price="{{ number_format($ad->price, 2) }}"
                    data-image="{{ asset('storage/' . ($ad->images->first()?->postads_img ?? 'no-image.jpg')) }}"
                    data-category-name="{{ $ad->category->name }}"
                    data-model-name="{{ $ad->model->name }}"
                    data-type-name="{{ $ad->type->name }}"
                    data-mileage="{{ $ad->mileage }}"
                    data-manufacture_year="{{ $ad->manufacture_year }}"
                    data-seller="{{ $ad->user->first_name }} {{ $ad->user->last_name }}"
                    data-posted="{{ $ad->created_at->format('M d, Y') }}"
                    >
    
                        <div class="position-relative bg-light" style="height: 220px;">
                            <img src="{{ asset('storage/' . ($ad->images->first()?->postads_img ?? 'no-image.jpg' )) }}" alt="{{ $ad->title }}" class="w-100 h-100 object-fit-cover">
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
                                <a  class="text-decoration-none text-dark hover-warning">
                                    {{ $ad->title }}
                                </a>
                            </h3>

                            <div class="d-flex align-items-center gap-3 text-secondary small mb-3">
                                <span><i class="bi bi-speedometer2 text-warning me-1"></i> {{ ($ad->mileage) }} </span>
                                <span><i class="bi bi-calendar3 text-warning me-1"></i> {{ $ad->manufacture_year }}</span>
                            </div>

                            <div class="mt-auto pt-3 border-top border-light-subtle d-flex align-items-center justify-content-between text-muted small">
                                <span class="d-flex align-items-center gap-1">
                                    <i class="bi bi-person-circle text-warning"></i> 
                                    {{ $ad->user->last_name ?? 'User' }}
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
            <div>{{ $postAds->links() }}</div>
        </div>
        <div class="modal fade" id="adModal" tabindex="-1" aria-labelledby="adModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow">
                    <div class="modal-header border-bottom border-light-subtle">
                        <h5 class="modal-title fw-bold text-dark" id="adModalLabel">
                            {{-- lead tit --}}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="rounded-3 overflow-hidden border border-light-subtle">
                                    <img id="modal-img" src="" alt="" class="img-fluid w-100 object-fit-cover" style="max-height: 300px;">
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-between">
                                <div>
                                    <span id="modal-category" class="badge bg-warning text-dark fw-bold mb-2"></span>
                                    <h3 id="modal-price" class="text-warning fw-bold mb-3">LKR</h3>
                                    
                                    <ul class="list-group list-group-flush mb-3 small">
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Category: </strong>
                                            <span id="modal-category-name" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Model: </strong>
                                            <span id="modal-model-name" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Vehicle Type: </strong>
                                            <span id="modal-type-name" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Mileage:</strong>
                                            <span id="modal-mileage" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Manufacture Year:</strong>
                                            <span id="modal-manufacture_year" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Seller:</strong>
                                            <span id="modal-seller" class="fw-semibold"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between px-0">
                                            <strong class="text-secondary">Posted:</strong>
                                            <span id="modal-posted" class="fw-semibold"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light-subtle">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script type="module">
$(document).ready(function () {
    $(document).on('click', '.post-card', function () {
        var title = $(this).data('title');
        var price = $(this).data('price');
        var image = $(this).data('image');
        var categoryName = $(this).data('category-name');
        var modelName = $(this).data('model-name');
        var typeName = $(this).data('type-name');
        var mileage = $(this).data('mileage');
        var manufactureYear = $(this).data('manufacture_year');
        var seller = $(this).data('seller');
        var posted = $(this).data('posted');

        $('#adModalLabel').text(title);
        $('#modal-img').attr('src', image).attr('alt', title);
        $('#modal-category').text(categoryName);
        $('#modal-price').text('LKR ' + price);
        $('#modal-category-name').text(categoryName);
        $('#modal-model-name').text(modelName);
        $('#modal-type-name').text(typeName);
        $('#modal-mileage').text(mileage);
        $('#modal-manufacture_year').text(manufactureYear);
        $('#modal-seller').text(seller);
        $('#modal-posted').text(posted);
    });
});
</script>