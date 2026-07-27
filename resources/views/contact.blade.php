<x-guest-layout>

<section class="bg-body-tertiary text-dark rounded-4 min-vh-75 d-flex flex-column justify-content-between p-4 p-md-5 mb-4 border border-light-subtle shadow-sm">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="badge text-bg-warning text-dark text-uppercase px-3 py-2 rounded-pill fw-bold tracking-wider">
            Contact Support
        </span>
        <span class="text-muted small d-none d-sm-inline">We typically reply within 24 hours</span>
    </div>

    <div class="my-auto py-2">
        <div class="row g-4 align-items-center">
            
            <div class="col-lg-5">
                <h1 class="display-5 fw-bold mb-3 text-dark">
                    Get in touch <br>
                    <span class="text-warning">with our team.</span>
                </h1>
                <p class="text-secondary mb-4" style="max-width: 45ch;">
                    Have questions about a listing, need help posting an ad, or want to report an issue? We're here to help you out.
                </p>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-white border border-light-subtle shadow-sm">
                        <div class="bg-warning bg-opacity-10 text-warning p-2 rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </div>
                        <div>
                            <div class="small text-muted">Email Us</div>
                            <div class="fw-semibold text-dark">supportmarketplace@gmail.com</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-white border border-light-subtle shadow-sm">
                        <div class="bg-warning bg-opacity-10 text-warning p-2 rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-clock-fill fs-4"></i>
                        </div>
                        <div>
                            <div class="small text-muted">Support Hours</div>
                            <div class="fw-semibold text-dark">Mon - Fri: 9:00 AM - 6:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded-4 border border-light-subtle shadow-sm">
                    <form id="inquiriesForm" action="/contactmessages" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label small text-secondary fw-medium">Your Name</label>
                                <input type="text" class="form-control bg-light border-light-subtle text-dark" id="name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label small text-secondary fw-medium">Email Address</label>
                                <input type="email" class="form-control bg-light border-light-subtle text-dark" id="email" name="email" required placeholder="name@example.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label small text-secondary fw-medium">Subject</label>
                            <input type="text" class="form-control bg-light border-light-subtle text-dark" id="subject" name="subject" required placeholder="e.g. Question about my listing">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label small text-secondary fw-medium">Message</label>
                            <textarea class="form-control bg-light border-light-subtle text-dark" id="message" name="message" rows="4" required placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning text-dark fw-semibold px-4 py-2 w-100 shadow-sm">
                            <i class="bi bi-send-fill me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="pt-4 border-top border-light-subtle mt-4">
        <div class="row text-center text-md-start text-muted">
            <div class="col-md-4 mb-2 mb-md-0">
                <small><i class="bi bi-shield-lock text-warning me-1"></i> Safe & secure communication</small>
            </div>
            <div class="col-md-4 mb-2 mb-md-0 text-md-center">
                <small><i class="bi bi-patch-check text-warning me-1"></i> Verified response times</small>
            </div>
            <div class="col-md-4 text-md-end">
                <small><i class="bi bi-question-circle text-warning me-1"></i> Check out our FAQs</small>
            </div>
        </div>
    </div>

</section>
</x-guest-layout>
<script type="module">
$(document).ready(function(){
    $('#inquiriesForm').on('submit', function(e){
        e.preventDefault();
        const $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true).text('Adding....');
        const formData = new FormData(this);
        axios.post('/contact' ,formData)
        .then(function(response){
            $('#inquiriesForm')[0].reset();
        }).catch (function (error){
            console.error(error.response.data);
        }).finally(function(){
            $submitBtn.prop('disabled', false).text('Add Product');
        });
    });
});
</script>