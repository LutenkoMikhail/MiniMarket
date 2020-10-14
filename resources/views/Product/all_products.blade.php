@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="col-md-8">
            <div class="text-center">
                <div class="card-header">All Products.</div>
            </div>
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
        </div>
    </div>
</div>
@endsection

