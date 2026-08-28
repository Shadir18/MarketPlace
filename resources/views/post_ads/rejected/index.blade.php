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
                </table>
            </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function () {
        axios.get('/post_ads/rejected')
            .then(function (response) {
                $('#rejecttable').DataTable({
                    data: response.data.postAds,
                    columns: [
                        { data: 'id' },
                        { data: 'title' },
                        { data: 'category.name' },
                        { data: 'type.name' },
                        { data: 'model.name' },
                        { data: 'manufacture_year' },
                        { data: 'mileage' },
                        { data: 'price' },
                        { data: 'user.last_name' },
                        { data: null,
                            render: function(data, type, row) {
                                console.log(row)
                                let actionbtn = `
                                    @can('post-approve')
                                    <button type="button" class="btn btn-success btn-sm fw-bold btn-approve" data-id="${row.id}">
                                        <i class="bi bi-bag-check"></i>
                                    </button>
                                    @endcan`;
                                return actionbtn;
                            },
                        },
                    ],
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