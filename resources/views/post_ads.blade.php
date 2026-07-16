<x-guest-layout>
    <div class="row justify-content-center my-4">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="card-title mb-0 fw-bold">Post a Vehicle Advertisement</h4>
                    <br>
                    <p class="mb-0 small opacity-75 mt-1">Fill out the details below to list your vehicle for sale.</p>
                </div>

                <div class="card-body p-4">
                    <div id="alert-success" class="alert alert-success d-none alert-dismissible fade show">
                        <span id="success-message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div id="alert-danger" class="alert alert-danger d-none alert-dismissible fade show" role="alert">
                        <span id="danger-message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form id="postAdForm" action="/products" method="POST">
                        @csrf
                        
                        <x-form-field class="mb-3">
                            <x-form-label for="title" class="form-label fw-semibold">Ad Title</x-form-label>
                            <x-form-input type="text" name="title" id="title" class="form-control"  required />
                            <x-form-error name="title" />
                            <div class="invalid-feedback d-block" id="error-title"></div>
                        </x-form-field>

                        <div class="row">
                            <div class="col-md-6">
                                <x-form-field class="mb-3">
                                    <x-form-label for="company" class="form-label fw-semibold">Brand</x-form-label>
                                    <x-form-input type="text" name="company" id="company" class="form-control" required />
                                    <x-form-error name="company" />
                                    <div class="invalid-feedback d-block" id="error-company"></div>
                                </x-form-field>
                            </div>

                            <div class="col-md-6">
                                <x-form-field class="mb-3">
                                    <x-form-label for="model" class="form-label fw-semibold">Model</x-form-label>
                                    <x-form-input type="text" name="model" id="model" class="form-control" required />
                                    <x-form-error name="model" />
                                    <div class="invalid-feedback d-block" id="error-model"></div>
                                </x-form-field>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-form-field class="mb-3">
                                    <x-form-label for="year" class="form-label fw-semibold">Year of Manufacture</x-form-label>
                                    <x-form-input type="number" name="year" id="year" class="form-control" min="1900" required />
                                    <x-form-error name="year" />
                                    <div class="invalid-feedback d-block" id="error-year"></div>
                                </x-form-field>
                            </div>

                            <div class="col-md-6">
                                <x-form-field class="mb-3">
                                    <x-form-label for="mileage" class="form-label fw-semibold">Mileage (km)</x-form-label>
                                    <x-form-input type="number" name="mileage" id="mileage" class="form-control" min="0" required />
                                    <x-form-error name="mileage" />
                                    <div class="invalid-feedback d-block" id="error-mileage"></div>
                                </x-form-field>
                            </div>
                        </div>

                        <x-form-field class="mb-4">
                            <x-form-label for="price" class="form-label fw-semibold">Price (LKR)</x-form-label>
                            <x-form-input type="number" name="price" id="price" class="form-control" placeholder="0.00" step="1" required />
                            <x-form-error name="price" />
                            <div class="invalid-feedback d-block" id="error-price"></div>
                            <br>
                        </x-form-field>

                        <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                            <a href="/" class="btn btn-outline-secondary px-4">Cancel</a>
                            <x-form-button type="submit" id="submitBtn" class="btn btn-primary px-4 fw-bold">Publish Vehicle Ad</x-form-button>
                        </div>
                    </form>
                </div>
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
            toastify({
                text: "Product successfully added!",
                duration: 3000,
                gravity: "top", 
                position: "right", 
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)"
                }
            }).showToast();
            
            $('#postAdForm')[0].reset();
        }).catch (function (error){
            Toastify({
                text: "Error adding product. Please try again.",
                duration: 3000,
                gravity: "top",
                position: "right",
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)"
                }
            }).showToast();
            console.error(error);
        }).finally(function(){
            $submitBtn.prop('disabled', false).text('Add Product');
        });
    });
});
</script>