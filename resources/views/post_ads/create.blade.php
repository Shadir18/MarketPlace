<x-guest-layout>
    <div class="container my-4">
        <div class="card bg-white rounded-4 border border-light-subtle shadow-sm mx-auto" style="max-width: 680px;">
            <div class="card-body p-4">
                <div class="card-header text-center mb-4">
                    <span class="badge text-bg-warning text-dark text-uppercase px-3 py-1 rounded-pill fw-bold small">Vehicle Listing</span>
                    <h2 class="h4 fw-bold text-dark mt-2 mb-1">Post a Vehicle Advertisement</h2>
                    <p class="text-secondary small mb-0">Fill out the details below to list your vehicle for sale.</p>
                </div>

                <div id="alert-success" class="alert alert-success d-none alert-dismissible fade show rounded-3 small">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div id="alert-danger" class="alert alert-danger d-none alert-dismissible fade show rounded-3 small" role="alert">
                    <span id="danger-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form id="postAdForm" action="/post_ads" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <x-form-field class="mb-3">
                        <x-form-label for="title" class="form-label text-dark fw-semibold small mb-1">Ad Title</x-form-label>
                        <x-form-input type="text" name="title" id="title" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" required />
                        <x-form-error name="title" />
                        <div class="invalid-feedback d-block small" id="error-title"></div>
                    </x-form-field>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <x-form-field>
                                <x-form-label for="category_id" class="form-label text-dark fw-semibold small mb-1">Category</x-form-label>
                                <select name="category_id" id="category_id" class="form-select bg-light border border-light-subtle rounded-3 text-dark shadow-none" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-form-error name="category_id" />
                                <div class="invalid-feedback d-block small" id="error-category_id"></div>
                            </x-form-field>
                        </div>

                        <div class="col-md-4">
                            <x-form-field>
                                <x-form-label for="model_id" class="form-label text-dark fw-semibold small mb-1">Model / Make</x-form-label>
                                <select name="model_id" id="model_id" class="form-select bg-light border border-light-subtle rounded-3 text-dark shadow-none" required>
                                    <option value="" disabled selected>Select Model</option>
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                <x-form-error name="model_id" />
                                <div class="invalid-feedback d-block small" id="error-model_id"></div>
                            </x-form-field>
                        </div>

                        <div class="col-md-4">
                            <x-form-field>
                                <x-form-label for="type_id" class="form-label text-dark fw-semibold small mb-1">Vehicle Type</x-form-label>
                                <select name="type_id" id="type_id" class="form-select bg-light border border-light-subtle rounded-3 text-dark shadow-none" required>
                                    <option value="" disabled selected>Select Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                <x-form-error name="type_id" />
                                <div class="invalid-feedback d-block small" id="error-type_id"></div>
                            </x-form-field>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="manufacture_year" class="form-label text-dark fw-semibold small mb-1">Year of Manufacture</x-form-label>
                                <x-form-input type="number" name="manufacture_year" id="manufacture_year" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" min="1900" required />
                                <x-form-error name="manufacture_year" />
                                <div class="invalid-feedback d-block small" id="error-manufacture_year"></div>
                            </x-form-field>
                        </div>

                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="mileage" class="form-label text-dark fw-semibold small mb-1">Mileage (km)</x-form-label>
                                <x-form-input type="number" name="mileage" id="mileage" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" min="0" required />
                                <x-form-error name="mileage" />
                                <div class="invalid-feedback d-block small" id="error-mileage"></div>
                            </x-form-field>
                        </div>
                    </div>

                    <x-form-field class="mb-3">
                        <x-form-label for="price" class="form-label text-dark fw-semibold small mb-1">Price (LKR)</x-form-label>
                        <x-form-input type="number" name="price" id="price" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" placeholder="0.00" step="1" required />
                        <x-form-error name="price" />
                        <div class="invalid-feedback d-block small" id="error-price"></div>
                    </x-form-field>

                    <x-form-field class="mb-4">
                        <x-form-label for="postads_img" class="form-label text-dark fw-semibold small mb-1">Insert Vehicle Images</x-form-label>
                        <x-form-input type="file" name="postads_img[]" id="postads_img" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" multiple accept="image/*" required />
                        <x-form-error name="postads_img" />
                        <div class="invalid-feedback d-block small" id="error-postads_img"></div>
                    </x-form-field>

                    <div class="d-flex align-items-center justify-content-between pt-3 border-top border-light-subtle gap-2">
                        <a href="/" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Cancel</a>
                        <x-form-button type="submit" id="submitBtn" class="btn btn-warning text-dark btn-sm fw-bold rounded-pill px-4 shadow-sm">Publish Vehicle Ad</x-form-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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