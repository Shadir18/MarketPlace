<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="h4 p-2 fw-bold">Rejected Vehicle Advertisements</h2>
        </div>

            <div class="table-responsive">
                <table id="rejecttable" class="table table-striped table-hover align-middle mb-0 w-100 border">
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
                            <td> {{ $ad->title}} </td>
                            <td> {{$ad->category->name }} </td>
                            <td> {{$ad->type->name }} </td>
                            <td> {{$ad->model->name }} </td>
                            <td> {{ $ad->manufacture_year }} </td>
                            <td> {{ $ad->mileage }} </td>
                            <td> {{ $ad->price }} </td>
                            <td> {{ $ad->user->last_name }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm fw-bold btn-approve" data-id="{{ $ad->id }}">
                                    <i class="bi bi-bag-check"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function () {
        axios.get('/post_ads/rejected')
            .then(function (response) {
                $('#rejecttable').DataTable({
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

        $('#rejecttable').on('click', '.btn-approve', function (e){
            e.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure you want to approve this product?')){
                axios.patch(`/post_ads/${id}/approve`)
                .then(function (response){
                    window.location.href = '/post_ads/listed';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>