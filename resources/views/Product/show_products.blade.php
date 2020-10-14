<div class="container">
    <div class="card mb-4 shadow-sm">
        <div class="thumbnail">
            @if( Storage::has ($product->image))
                <img src="{{ Storage::url($product->image) }}" height="280" width="250"
                     class="card-img-top"
                     style="max-width: 45%; margin: 0 auto; display: block;">
            @endif
        </div>
        <div class="card-body">
            <h2 class="card-title">Name : {{__($product->name) }}</h2>
            <hr>
            <p class="card-text">Description  : {{__($product->description) }}</p>
            <hr>
            <p class="card-text">Price  : {{__($product->price) }}</p>
            <div class="d-flex flex-column justify-content-center align-items-start">
                <small class="text-muted">Categories: </small>

                @if(!empty($product->category()->get()))
                    @each('Category.parts.category_show', $product->category()->get(), 'category')
                @endif
            </div>
        </div>
    </div>
</div>


