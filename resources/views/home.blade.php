<x-guest-layout>
    <div class="position-absolute top-0 start-0 w-100 vh-100 z-n1 overflow-hidden">
        <img src="{{ asset('storage/homepage.avif') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="HomePage UI">
        
        <div class="position-relative d-flex flex-column align-items-center justify-content-center h-75 text-white text-center">
            <h1 class="display-4 fw-bold mb-4 shadow-sm shine-effect">Welcome To MarketPlace</h1>
            
            <form action="/search" method="GET" class="w-100" style="max-width: 650px;">
                <div class="glass input-group input-group-lg p-1 align-items-center hover-glow">
                    <input id="" type="text" name="" class="form-control border-0 shadow-none bg-transparent text-white ps-4 pe-2" style="--bs-secondary-color: #ffffff;" placeholder="What are you looking for?">
                    <button class=" glass btn btn-primary rounded-pill px-4 fw-semibold shadow-sm" type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>