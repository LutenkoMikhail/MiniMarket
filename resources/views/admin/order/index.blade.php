@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('All Orders.') }} </h3>
            </div>
            @if (count($orders) > 0)
                <div class="col-md-12">
                    <div class="album py-12 bg-light">
                        <div class="container">
                            <div class="row ">
                                @each('admin.order.parts.order_view',$orders,'order')

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-8">
            {{$orders->links()}}
        </div>
        @else
            <div class="text-center">
                <h2>
                    <p>Not Orders !</p>
                </h2>
            </div>
        @endif
    </div>
@endsection

