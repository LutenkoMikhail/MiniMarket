<div class="container">
    <div class="card mb-4 shadow-sm">
        @if( Storage::has ($product->image))
            <img src="{{ Storage::url($product->image) }}" height="250" width="350" class="card-img-top"
                 style="max-width: 45%; margin: 0 auto; display: block;">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{__($product->name) }}</h5>
            <hr>
            <p class="card-text">{{__($product->description) }}</p>
            <hr>
            <p class="card-text">{{__($product->price) }}</p>
            <div class="d-flex flex-column justify-content-center align-items-start">
                <small class="text-muted">Categories: </small>
                <div class="btn-group align-self-end">
                    @if(!empty($product->category->get()))
                        @each('category.parts.category_show', $product->category->get(), 'category')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
