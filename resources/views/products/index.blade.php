<x-layout>
    <x-slot:heading>
        <span>Product Details</span>
    </x-slot:heading>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="d-flex flex-column gap-3">
                @foreach ($products as $product)
                    <a href="/products/{{ $product['id'] }}" class="text-decoration-none p-0 border border-secondary-subtle rounded-3 bg-white list-group-item-action overflow-hidden d-flex flex-column flex-sm-row">
                        
                        <div class="bg-light border-end d-flex align-items-center justify-content-center flex-shrink-0" style="width: 120px; height: 120px;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $product->title }}">
                            @else
                                <div class="text-muted text-center">
                                    <i class="bi bi-image" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="p-4 flex-grow-1">
                            <div class="fw-bold text-primary small mb-2">
                                {{ $product->seller?->name ?? 'Unassigned Product' }}
                            </div>

                            <div class="text-dark">
                                <strong class="text-primary">{{ $product['title'] }}:</strong> 
                                Price - {{ $product['price'] }}
                            </div>
                        </div>

                    </a>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>