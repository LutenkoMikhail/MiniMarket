@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-4 shadow-sm">
                @if( Storage::has ($product->image))
                    <img src="{{ Storage::url($product->image) }}" height="250" width="350" class="card-img-top"
                         style="max-width: 45%; margin: 0 auto; display: block;">
                @endif

                <div class="card-body">
                    <h2 class="card-title">Name : {{__($product->name) }}</h2>
                    <hr>
                    <p class="card-text">Description : {{__($product->description) }}</p>
                    <hr>
                    <p class="card-text">Price : {{__($product->price) }}</p>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <small class="text-muted">Category: </small>
                        @if(!empty($product->category()->get()))
                            @each('category.parts.category_show', $product->category()->get(), 'category')
                        @endif
                    </div>
                    @auth
                        @if (!Auth::user()->isAdmin())
                            <hr>
                            <div>
                                <form action="{{route('customer.cart.add',$product)}}" method="post"
                                      class="form-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block">Add to Cart
                                    </button>
                                </form>
                            </div>
                        @elseif (Auth::user()->isAdmin())
                            <hr>
                            <div class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('admin.product.update', $product->id) }}"
                                       class="btn btn-danger">{{ __('EDIT') }}</a>
                                    <a href="{{ route('admin.product.update', $product->id) }}"
                                       class="btn btn-dark">{{ __('DELETE') }}</a>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <hr>
                    <div class="text-center">
                        <div class="btn-group">
                            <a href="{{ url()->previous() }}"
                               class="btn btn-info">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
