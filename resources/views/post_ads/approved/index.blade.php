<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 fw-bold">Approved Vehicle Advertisements</h2>
        </div>

            <div class="table-responsive">
                <table id="approvetable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                    <thead class="table-light">
                        <tr>
                            <th>#id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Mileage</th>
                            <th>Price (LKR)</th>
                            <th>Posted By</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    @foreach ($postAds as $ad)
                        <tr id="row-{{ $ad->id }}">
                            <td> {{ $ad->id }} </td>
                            <td> {{ $ad->title }} </td>
                            <td> {{$ad->category->name }} </td>
                            <td> {{$ad->type->name }} </td>
                            <td> {{$ad->model->name }} </td>
                            <td> {{ $ad->manufacture_year }} </td>
                            <td style="width: 7%;"> {{ $ad->mileage }} </td>
                            <td> {{ $ad->price }} </td>
                            <td> {{ $ad->user->last_name }}</td>
                            <td class="text-center">
                                @if (auth()->check() && auth()->user()->email == App\Models\User::$ADMIN_EMAIL)
                                <button type="button" data-id="{{ $ad->id }}" data-bs-toggle="modal" data-bs-target="#editpostad" class="btn btn-sm btn-primary fw-bold view-edit-btn">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                @endif
                                @if($ad->status == 'soldout')
                                <button type="button" class="btn btn-secondary btn-sm fw-bold w-50" data-id="{{ $ad->id }}" disabled>
                                    <i class="bi bi-box2-fill"></i>
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-sm fw-bold btn-sold w-60" data-id="{{ $ad->id }}">
                                    <i class="bi bi-dropbox"></i>
                                </button>
                                @endif
                                <button type="button" class="btn btn-danger btn-sm fw-bold btn-reject " data-id="{{ $ad->id }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="modal" id="editpostad" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Type Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="postAdeditForm">
                                    @csrf
                                    <input type="hidden" id="postadID" name="id">

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
                                                <x-form-input type="text" name="mileage" id="mileage" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" min="0" required />
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
                                        <x-form-input type="file" name="postads_img[]" id="postads_img" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" multiple accept="image/*"  />
                                        <x-form-error name="postads_img" />
                                        <div class="invalid-feedback d-block small" id="error-postads_img"></div>
                                    </x-form-field>

                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="postAdeditForm" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="editpostad" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Type Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="card-body p-4">
                                <form id="postAdeditForm">
                                    @csrf
                                    <input type="hidden" id="postadID" name="id">

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
                                                <x-form-input type="text" name="mileage" id="mileage" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" min="0" required />
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
                                        <x-form-input type="file" name="postads_img[]" id="postads_img" class="form-control bg-light border border-light-subtle rounded-3 text-dark shadow-none" multiple accept="image/*"  />
                                        <x-form-error name="postads_img" />
                                        <div class="invalid-feedback d-block small" id="error-postads_img"></div>
                                    </x-form-field>

                                </form>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="postAdeditForm" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

</x-admin-layout>
<script type="module">
    $(document).ready(function () {
        axios.get('/post_ads/approved')
            .then(function (response) {
                $('#approvetable').DataTable({
                    layout:{
                        bottomEnd: {
                            paging: {
                                firstLast: false
                            }
                        }
                    },
                    pageLength: 25,
                    scrollY: 600,
                    scroller: true,
            });
        });

        $('#postAdeditForm').on('submit', function (e){
        e.preventDefault();
        const id = $('#postadID').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        axios.post(`/post_ads/approved/${id}`, formData)
        .then(function (response){
            window.location.href = `/post_ads/approved`;
        })
        .catch(function (error){
            console.error(error.response.data);
        })
    });

    $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const postadID = $(this).data('id');
        axios.get(`/post_ads/approved/${postadID}`)
            .then(function (response) {
                const data = response.data;
                $('#postadID').val(data.id);
                $('#title').val(data.title);
                $('#category_id').val(data.category_id);
                $('#model_id').val(data.model_id);
                $('#type_id').val(data.type_id);
                $('#manufacture_year').val(data.manufacture_year);
                $('#mileage').val(data.mileage);
                $('#price').val(data.price);
                $('#postads_img').val(data.postads_img);
            })
    })

        //MARK AS SOLD 
        $('#approvetable').on('click', '.btn-sold', function (e){
            e.preventDefault();
            const $button = $(this);
            const id = $button.data('id');
            if (confirm('Are you sure you want changed this product as Sold?')){
                axios.patch(`/post_ads/${id}/sold`)
                .then(function (response){
                    $button.html('<i class="bi bi-box2-fill"></i>');
                    $button.removeClass('btn-success');
                    $button.addClass('btn-secondary');
                    $button.prop('disabled', true);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });

        //rejected
        $('#approvetable').on('click', '.btn-reject', function (e){
            e.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure you want to reject this product?')){
                axios.patch(`/post_ads/${id}/reject`)
                .then(function (response){
                    window.location.href = '/post_ads/approved';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>