<x-admin-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0 fw-bold">User Request Messages</h2>
    </div>

    <div class="card shadow-sm border-0 bg-white p-2">
        <div class="table-responsive">
            <table id="ctcTable" class="table table-striped table-hover align-middle mb-0 w-100 border">
                <thead class="table-light">
                    <tr>
                        <th>#id</th>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                @foreach ($contactMessages as $ctcmsg)
                    <tr id="row-{{ $ctcmsg->id }}">
                        <td> {{ $ctcmsg->id }} </td>
                        <td>
                            <a href="{{ route('contactmessages.show', $ctcmsg->id) }}" type="button" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye me-1"></i> View
                            </a>
                        </td>
                        <td> {{ $ctcmsg->name}} </td>
                        <td> {{ $ctcmsg->email }} </td>
                        <td> {{ $ctcmsg->subject }} </td>
                        <td> {{ $ctcmsg->message }} </td>
                    </tr>
                @endforeach
            </table>
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
    });
</script>