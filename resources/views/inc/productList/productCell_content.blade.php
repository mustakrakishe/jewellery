<a href="{{ route('catalogue_showOneProduct', $product->id) }}">   
    <div class="row m-0 p-0">
        <div class="product-cell-content col text-center mx-auto px-5 bg-white shadow-sm">
            <div class="row my-3 image"><img src="{{ asset('storage/'.$product->imagePath) }}" class="mx-auto"></div>
            <div class="row text-center mb-2 title"><p class="mx-auto title">{{ $product->title }}</p></div>
            <div class="row text-center cost"><p class="mx-auto">{{ number_format($product->cost, 0, ',', ' ') }} грн.</p></div>
        </div>
    </div>
</a>