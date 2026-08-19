<x-admin-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0 fw-bold">User Request Messages</h2>
    </div>

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
                            <a data-id="{{ $ctcmsg->id }}" data-bs-toggle="modal" data-bs-target="#ctcmsg" class="btn btn-sm btn-primary fw-bold view-edit-btn">
                                <i class="bi bi-pencil"></i>
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

        {{-- msg view --}}
        <div class="modal" id="ctcmsg" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card border shadow-sm">
                    <div class="card-body p-4">
                        <input type="hidden" id="ctcmsgID" name="ctcmsgID">
                        <div class="row g-3 mb-4 pb-3 border-bottom">
                            <div class="col-md-4">
                                <small class="text-muted d-block">From</small>
                                <strong id="name" name="name"></strong>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">Email</small>
                                <span id="email" name="email"></span>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">Date Received</small>
                                <span id="date" name="date"></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">Subject</small>
                            <h5 class="fw-bold text-dark" id="subject" name="subject"></h5>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted d-block mb-1">Message</small>
                            <div class="p-3 bg-light rounded border text-dark" style="white-space: pre-line;" id="message" name="message"></div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="" class="btn btn-primary">
                                <i class="bi bi-reply-fill me-1"></i> Reply via Email
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function () {
        axios.get('/post_ads/approved')
            .then(function (response) {
                $('#ctcTable').DataTable({
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

        $(document).on('click', '.view-edit-btn', function (e)  {
        e.preventDefault();
        const ctcmsgID = $(this).data('id');
        axios.get(`/contactmessages/${ctcmsgID}`)
        .then(function (response) {
            const data = response.data;
            $('#ctcmsgID').text(data.id);
            $('#name').text(data.name);
            $('#email').text(data.email);
            $('#date').text(data.created_at);
            $('#subject').text(data.subject);
            $('#message').text(data.message);
            });
    });
    });
</script>