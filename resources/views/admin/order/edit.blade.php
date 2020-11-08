@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{route ('admin.order.update',$order->id)}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="text-center"> Order creator:{{$order->user()->value('name')}} </h1>
                    <hr>
                    <h1 class="text-center"> Number Order:{{__($order->id) }} </h1>
                    <hr>
                    <h1 class="text-center"> Name:{{$order->name}} </h1>
                    <h1 class="text-center"> SurName:{{$order->surname}} </h1>
                    <h1 class="text-center"> Phone:{{$order->phone}} </h1>
                    <h1 class="text-center"> Email:{{$order->email}} </h1>
                    <hr>
                    <h1 class="text-center"> Status:{{$order->getStatus()}} </h1>
                    <hr>
                    <h1 class="text-center"> Total price: {{ $order->totalPrice()}}$ </h1>
                    <h5 class="text-center">
                        <fieldset>
                            <legend>Please select order status:</legend>
                            <div>
                                @foreach ($orderStatus as $status)
                                    <div class="container">
                                        <input type="radio" id="statusChoice{{$status->id}}"
                                               name="status" value="{{$status->name}}"
                                               @if($order->getStatus()===$status->name) checked @endif >
                                        <label for="statusChoice{{$status->id}}">{{$status->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
        </form>
    </div>
@endsection


