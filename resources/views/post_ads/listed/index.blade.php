<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 fw-bold">Listed Vehicle Advertisements</h2>
            <a href="{{ route('listed.create') }}" class="btn btn-primary btn-sm fw-bold">Create New Ad</a>
        </div>

        <div class="card shadow-sm border-0 bg-white p-2 sticky-top">
            <div class="table-responsive" style="height: 750px;">
                <table id="listtable" class="table table-striped table-hover align-middle mb-0 w-100 border">
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
                            <th class="text-center">Approve</th>
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
                                    Approve
                                </button>
                                <button type="button" class="btn btn-danger btn-sm fw-bold btn-reject" data-id="{{ $ad->id }}">
                                    Reject
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
        </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function () {
        axios.get('/post_ads')
            .then(function (response) {
                $('#listtable').DataTable({
                    "dom": "<'row mb-3 align-items-center'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row mt-3 align-items-center'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
            });
        });
        //approve 
        $('#listtable').on('click', '.btn-approve', function (e){
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
        //rejected
        $('#listtable').on('click', '.btn-reject', function (e){
            e.preventDefault();
            const id = $(this).data('id');
            if (confirm('Are you sure you want to approve this product?')){
                axios.patch(`/post_ads/${id}/reject`)
                .then(function (response){
                    window.location.href = '/post_ads/rejected';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.error(error.response.data);
                });
            }
        });
    });
</script>