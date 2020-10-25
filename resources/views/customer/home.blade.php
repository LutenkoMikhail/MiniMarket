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
                <div class="card">
                    <div class="text-center">
                        <div class="card-header">User Orders.</div>
                        <div class="card-body">
                            @if (count($orders) > 0)
                                <div class="card-body">
                                    <div class="album py-5 bg-light">
                                        <div class="row ">
                                            @each('customer.parts.show_order',$orders,'order')
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    {{$orders->links()}}
                                </div>
                            @else
                                <div class="text-center">
                                    <h2>
                                        <p>Not Orders!</p>
                                    </h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
