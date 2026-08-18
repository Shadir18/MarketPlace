<x-admin-layout>
    <x-slot:heading>Application Settings</x-slot:heading>

    <div class="container my-4">
        <div class="card shadow-sm mx-auto" style="max-width: 700px;">
            <div class="card-header bg-dark text-white p-4">
                <h4 class="mb-0 fw-bold">General Settings</h4>
                <p class="text-light opacity-75 small mb-0">Configure basic application and contact information.</p>
            </div>

            <div class="card-body p-4">
                <div id="alert-success" class="alert alert-success d-none"></div>
                <div id="alert-danger" class="alert alert-danger d-none"></div>

                <form id="settingsForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="application_name" class="form-label fw-bold">Application Name</label>
                            <input id="application_name" name="application_name" type="text" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-bold">Company / Owner Name</label>
                            <input id="name" name="name" type="text" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="currency" class="form-label fw-bold">Currency Symbol/Code</label>
                            <input id="currency" name="currency" type="text" class="form-control"  placeholder="LKR, USD, etc." required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="contacting_hours" class="form-label fw-bold">Contacting Hours</label>
                            <input id="contacting_hours" name="contacting_hours" type="text" class="form-control" placeholder="Mon-Fri 9:00 AM - 5:00 PM">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Contact Email</label>
                            <input id="email" name="email" type="email" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label fw-bold">Contact Phone</label>
                            <input id="phone" name="phone" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="border-top pt-3 d-flex justify-content-end gap-2">
                        <button type="submit" id="submitBtn" class="btn btn-success px-4 fw-bold">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function(){
        const settingsID = "{{ $setting->id }}";
        axios.get(`/settings/${settingsID}`)
        .then(function(response){
            const data = response.data;
            $('#settingsID').val(data.id);
            $('#application_name').val(data.application_name);
            $('#name').val(data.name);
            $('#currency').val(data.currency);
            $('#email').val(data.email);
            $('#phone').val(data.phone);
            $('#address').val(data.address);
            $('#contacting_hours').val(data.contacting_hours);
        })

        $('#settingsForm').on('submit', function(e){
            e.preventDefault();
            const $btn = $('#submitBtn');
            $btn.prop('diabled', true).text('saving...');
            const formData = new FormData(this);
            axios.post('/settings', formData)
                .then(function(response){
                    window.location.href = '/settings';
                    console.log(response.data);
                })
                .catch(function(error){
                    console.error(error);
                    alert('please try again later');
                });
        });
    });
</script>