<x-guest-layout>
    <section class="bg-body-tertiary text-dark rounded-4 min-vh-75 d-flex flex-column justify-content-between p-4 p-md-5 mb-4 border border-light-subtle shadow-sm">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider">
                Post an Ad
            </span>
            <span class="text-muted small d-none d-sm-inline">Reach thousands of active buyers directly</span>
        </div>

        <div class="my-auto py-2">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-4 p-md-5 rounded-4 border border-light-subtle shadow-sm">
                        
                        <div class="mb-4 pb-3 border-bottom border-light-subtle">
                            <h1 class="h3 fw-bold text-dark mb-1">
                                Post a <span class="text-warning">Vehicle Advertisement</span>
                            </h1>
                            <p class="text-secondary small mb-0">Fill out the details below to list your vehicle for direct sale.</p>
                        </div>

                        <div id="alert-success" class="alert alert-success d-none alert-dismissible fade show mb-4 rounded-3" role="alert">
                            <span id="success-message"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div id="alert-danger" class="alert alert-danger d-none alert-dismissible fade show mb-4 rounded-3" role="alert">
                            <span id="danger-message"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <form id="postAdForm" action="/post_ads" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <x-form-field class="mb-3">
                                <x-form-label for="title" class="form-label small text-secondary fw-medium">Ad Title</x-form-label>
                                <x-form-input type="text" name="title" id="title" class="form-control bg-light border-light-subtle text-dark" placeholder="e.g. 2020 Toyota Prius - Excellent Condition" required />
                                <x-form-error name="title" />
                                <div class="invalid-feedback d-block" id="error-title"></div>
                            </x-form-field>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <x-form-field>
                                        <x-form-label for="category_id" class="form-label small text-secondary fw-medium">Category</x-form-label>
                                        <select name="category_id" id="category_id" class="form-select bg-light border-light-subtle text-dark" required>
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form-error name="category_id" />
                                        <div class="invalid-feedback d-block" id="error-category_id"></div>
                                    </x-form-field>
                                </div>

                                <div class="col-md-4">
                                    <x-form-field>
                                        <x-form-label for="model_id" class="form-label small text-secondary fw-medium">Model / Make</x-form-label>
                                        <select name="model_id" id="model_id" class="form-select bg-light border-light-subtle text-dark" required>
                                            <option value="" disabled selected>Select Model</option>
                                            @foreach($models as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form-error name="model_id" />
                                        <div class="invalid-feedback d-block" id="error-model_id"></div>
                                    </x-form-field>
                                </div>

                                <div class="col-md-4">
                                    <x-form-field>
                                        <x-form-label for="type_id" class="form-label small text-secondary fw-medium">Vehicle Type</x-form-label>
                                        <select name="type_id" id="type_id" class="form-select bg-light border-light-subtle text-dark" required>
                                            <option value="" disabled selected>Select Type</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-form-error name="type_id" />
                                        <div class="invalid-feedback d-block" id="error-type_id"></div>
                                    </x-form-field>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <x-form-field>
                                        <x-form-label for="manufacture_year" class="form-label small text-secondary fw-medium">Year of Manufacture</x-form-label>
                                        <x-form-input type="number" name="manufacture_year" id="manufacture_year" class="form-control bg-light border-light-subtle text-dark" min="1900" placeholder="e.g. 2018" required />
                                        <x-form-error name="manufacture_year" />
                                        <div class="invalid-feedback d-block" id="error-manufacture_year"></div>
                                    </x-form-field>
                                </div>

                                <div class="col-md-6">
                                    <x-form-field>
                                        <x-form-label for="mileage" class="form-label small text-secondary fw-medium">Mileage (km)</x-form-label>
                                        <x-form-input type="number" name="mileage" id="mileage" class="form-control bg-light border-light-subtle text-dark" min="0" placeholder="e.g. 45000" required />
                                        <x-form-error name="mileage" />
                                        <div class="invalid-feedback d-block" id="error-mileage"></div>
                                    </x-form-field>
                                </div>
                            </div>

                            <x-form-field class="mb-3">
                                <x-form-label for="price" class="form-label small text-secondary fw-medium">Price (LKR)</x-form-label>
                                <x-form-input type="number" name="price" id="price" class="form-control bg-light border-light-subtle text-dark" placeholder="0.00" step="1" required />
                                <x-form-error name="price" />
                                <div class="invalid-feedback d-block" id="error-price"></div>
                            </x-form-field>

                            <x-form-field class="mb-4">
                                <x-form-label for="postads_img" class="form-label small text-secondary fw-medium">Vehicle Images</x-form-label>
                                <x-form-input type="file" name="postads_img[]" id="postads_img" class="form-control bg-light border-light-subtle text-dark" multiple accept="image/*" required />
                                <x-form-error name="postads_img" />
                                <div class="invalid-feedback d-block" id="error-postads_img"></div>
                            </x-form-field>

                            <div class="d-flex align-items-center justify-content-end gap-3 pt-3 border-top border-light-subtle">
                                <a href="/" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-semibold">Cancel</a>
                                <button type="submit" id="submitBtn" class="btn btn-warning text-dark fw-semibold px-4 py-2 shadow-sm rounded-pill">
                                    <i class="bi bi-plus-circle me-2"></i>Publish Vehicle Ad
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 border-top border-light-subtle mt-4">
            <div class="row text-center text-md-start text-muted">
                <div class="col-md-4 mb-2 mb-md-0">
                    <small><i class="bi bi-shield-check text-warning me-1"></i> Human-Reviewed Listings</small>
                </div>
                <div class="col-md-4 mb-2 mb-md-0 text-md-center">
                    <small><i class="bi bi-tag-fill text-warning me-1"></i> No Hidden Platform Fees</small>
                </div>
                <div class="col-md-4 text-md-end">
                    <small><i class="bi bi-speedometer2 text-warning me-1"></i> Quick & Direct Deals</small>
                </div>
            </div>
        </div>

    </section>
</x-guest-layout>
<script type="module">
$(document).ready(function(){
    $('#postAdForm').on('submit', function(e){
        e.preventDefault();
        const $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true).text('Adding....');
        const formData = new FormData(this);
        axios.post('/post_ads' ,formData)
        .then(function(response){
            $('#postAdForm')[0].reset();
        }).catch (function (error){
            console.error(error.response.data);
        }).finally(function(){
            $submitBtn.prop('disabled', false).text('Add Product');
        });
    });
});
</script>