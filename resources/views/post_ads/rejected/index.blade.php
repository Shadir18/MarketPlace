<x-admin-layout>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 fw-bold">Approved Vehicle Advertisements</h2>
        </div>

        <div class="card shadow-sm border-0 bg-white p-2 sticky-top">
            <div class="table-responsive" style="height: 750px;">
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
                    "dom": "<'row mb-3 align-items-center'<'col-md-6'l><'col-md-6 d-flex justify-content-end'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row mt-3 align-items-center'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",
            });
        });
    });
</script>