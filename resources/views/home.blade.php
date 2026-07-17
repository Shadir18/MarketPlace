<x-guest-layout>
    <div class="position-absolute top-0 start-0 w-100 vh-100 z-n1 overflow-hidden">
        <img src="{{ asset('storage/homepage.avif') }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="HomePage UI">
        
        <div class="position-relative d-flex flex-column align-items-center justify-content-center h-75 text-white text-center">
            <h1 class="display-4 fw-bold mb-4 shadow-sm">Welcome To MarketPlace</h1>
            
            <form action="/search" method="GET" class="w-100" style="max-width: 650px;">
                <div class="input-group input-group-lg bg-white rounded-pill p-1 shadow-lg align-items-center">
                    <input type="text" name="query" class="form-control border-0 shadow-none bg-transparent text-dark ps-4 pe-2" placeholder="What are you looking for?" required>
                    <button class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm" type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>