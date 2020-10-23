@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="text-center">
                    <div class="card-header">All Products.In the category : {{$nameCategory}} .</div>
                </div>
                @if (count($products) > 0)
                    <div class="card-body">
                        <div class="album py-5 bg-light">
                            <div class="row ">
                                @each('product.show_products',$products,'product')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        {{$products->links()}}
                    </div>
                @else
                    <div class="text-center">
                        <h2>
                            <p>Not Products !</p>
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

