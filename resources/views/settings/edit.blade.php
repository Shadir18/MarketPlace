<x-admin-layout>
    <x-slot:heading>Application Settings</x-slot:heading>

    <div class="container my-4">
        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mx-auto" style="max-width: 700px;">      
            <div class="card-header bg-warning text-dark p-4 border-0">
                <h4 class="mb-1 fw-bold">General Settings</h4>
                <p class="text-dark opacity-75 small mb-0">Configure basic application and contact information.</p>
            </div>

            <div class="card-body p-4 p-md-5 bg-white">                
                <div id="alert-success" class="alert alert-success d-none alert-dismissible fade show rounded-3" role="alert">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div id="alert-danger" class="alert alert-danger d-none alert-dismissible fade show rounded-3" role="alert">
                    <span id="danger-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form id="settingsForm" method="POST" action="/admin/settings">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="application_name" class="form-label fw-semibold text-dark">Application Name</x-form-label>
                                <x-form-input id="application_name" name="application_name" type="text" class="form-control bg-light border-light-subtle text-dark" value="{{ old('application_name', $setting->application_name ?? '') }}" required />
                                <x-form-error name="application_name" />
                            </x-form-field>
                        </div>

                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="name" class="form-label fw-semibold text-dark">Company / Owner Name</x-form-label>
                                <x-form-input id="name" name="name" type="text" class="form-control bg-light border-light-subtle text-dark" value="{{ old('name', $setting->name ?? '') }}" />
                                <x-form-error name="name" />
                            </x-form-field>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="currency" class="form-label fw-semibold text-dark">Currency Symbol/Code</x-form-label>
                                <x-form-input id="currency" name="currency" type="text" class="form-control bg-light border-light-subtle text-dark" value="{{ old('currency', $setting->currency ?? '') }}" placeholder="LKR, USD, etc." required />
                                <x-form-error name="currency" />
                            </x-form-field>
                        </div>

                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="contacting_hours" class="form-label fw-semibold text-dark">Contacting Hours</x-form-label>
                                <x-form-input id="contacting_hours" name="contacting_hours" type="text" class="form-control bg-light border-light-subtle text-dark" value="{{ old('contacting_hours', $setting->contacting_hours ?? '') }}" placeholder="Mon-Fri 9:00 AM - 5:00 PM" />
                                <x-form-error name="contacting_hours" />
                            </x-form-field>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="email" class="form-label fw-semibold text-dark">Contact Email</x-form-label>
                                <x-form-input id="email" name="email" type="email" class="form-control bg-light border-light-subtle text-dark" value="{{ old('email', $setting->email ?? '') }}" />
                                <x-form-error name="email" />
                            </x-form-field>
                        </div>

                        <div class="col-md-6">
                            <x-form-field>
                                <x-form-label for="phone" class="form-label fw-semibold text-dark">Contact Phone</x-form-label>
                                <x-form-input id="phone" name="phone" type="text" class="form-control bg-light border-light-subtle text-dark" value="{{ old('phone', $setting->phone ?? '') }}" />
                                <x-form-error name="phone" />
                            </x-form-field>
                        </div>
                    </div>

                    <x-form-field class="mb-4">
                        <x-form-label for="address" class="form-label fw-semibold text-dark">Address</x-form-label>
                        <textarea id="address" name="address" class="form-control bg-light border-light-subtle text-dark" rows="3">{{ old('address', $setting->address ?? '') }}</textarea>
                        <x-form-error name="address" />
                    </x-form-field>

                    <div class="border-top border-light-subtle pt-3 d-flex justify-content-end gap-2">
                        <x-form-button type="submit" id="submitBtn" class="btn btn-warning text-dark px-4 fw-bold rounded-pill shadow-sm">
                            Save Settings
                        </x-form-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-admin-layout>
<script type="module">
    $(document).ready(function(){
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