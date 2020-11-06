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
            <p class="card-text">Description : {{__($product->description) }}</p>
            <hr>
            <p class="card-text">Price : {{__($product->price) }}</p>
            <div class="d-flex flex-column justify-content-center align-items-start">
                <small class="text-muted">Categories: </small>

                @if(!empty($product->category()->get()))
                    @each('category.parts.category_show', $product->category()->get(), 'category')
                @endif
            </div>

            @auth
                @if (!Auth::user()->isAdmin())
                    <hr>
                    <div>
                        <form action="{{route('customer.cart.add',$product)}}" method="post" form class="form-inline">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-lg btn-block">Add to Cart</button>
                        </form>
                    </div>
                @elseif (Auth::user()->isAdmin())
                    <hr>
                    <div class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('admin.product.edit', $product->id) }}"
                               class="btn btn-danger">{{ __('EDIT') }}</a>
                            <a href="{{ route('admin.product.delete', $product->id) }}"
                               class="btn btn-dark">{{ __('DELETE') }}</a>
                            <a href="{{ route('admin.product.create') }}"
                               class="btn btn-success">{{ __('NEW') }}</a>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>


