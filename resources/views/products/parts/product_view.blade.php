<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="{{ $product->thumbnailUrl }}" height="300" class="card-img-top"
             style="max-width: 100%; margin: 0 auto; display: block;">
        <div class="card-body">
            <p class="card-title">{{ __($product->title) }}</p>
            <hr>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('products.show', $product) }}"
                       class="btn btn-outline-dark">
                        {{ __('Show') }}
                    </a>
                    @include('products.parts.buy_product', ['product' => $product, 'showQuantity' => false, 'btnText' => 'Buy'])
                </div>
                <div class="text-muted">
                    @if ($product->price !== $product->end_price)
                        <span class="text-muted old-price">{{ $product->price }}$</span>
                    @endif
                    <span class="text-muted">{{ $product->end_price }}$</span>
                </div>
            </div>
        </div>
    </div>
</div>
