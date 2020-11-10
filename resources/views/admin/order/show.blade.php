@extends('layouts.app')
@section('title','Admin.Order.')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="card-header">
            <h1 class="text-center"> Number Order:{{__($order->id) }} </h1>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h1 class="text-center"> Order creator:{{$order->user()->value('name')}} </h1>
                <hr>
                <h1 class="text-center"> Name:{{$order->name}} </h1>
                <h1 class="text-center"> SurName:{{$order->surname}} </h1>
                <h1 class="text-center"> Phone:{{$order->phone}} </h1>
                <h1 class="text-center"> Email:{{$order->email}} </h1>
                <hr>
                <h1 class="text-center"> Status:{{$order->getStatus()}} </h1>
                <hr>
                <h1 class="text-center"> Total price: {{ $order->totalPrice()}}$ </h1>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ url()->previous() }}"
                       class="btn btn-sm btn-outline-dark">{{ __('Back') }}</a>
                </div>
            </div>
        </div>

    </div>
@endsection
