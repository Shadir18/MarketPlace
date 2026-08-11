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