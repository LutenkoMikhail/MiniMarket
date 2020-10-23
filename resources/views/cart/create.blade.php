@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        @if(Cart::instance('cart')->count()>0)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h2>
                            <div class="text-center">{{ __('Creat Order.') }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('customer.cart.store.order')}}">
                            @csrf

                            <div class="row justify-content-center">

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="customername"
                                               class="col-md-4 col-form-label text-md-right">{{ __('customer Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="customername" type="text"
                                                   class="form-control @error('customername') is-invalid @enderror"
                                                   name="customername" value={{$customerName}} required
                                                   autofocus>

                                            @error('customername')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="customersurname"
                                               class="col-md-4 col-form-label text-md-right">{{ __('customer Surname') }}</label>
                                        <div class="col-md-6">
                                            <input id="customersurname" type="text"
                                                   class="form-control @error('customersurname') is-invalid @enderror"
                                                   name="customersurname" value={{$customerName}} required
                                                   autofocus>

                                            @error('customersurname')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="" required autocomplete="phone" autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <table class="table table-striped table-dark">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Count</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @each('cart.parts.product_view_order',Cart::instance('cart')->content() , 'row')
                                        </tbody>

                                        <table class="table table-dark" style="width: 50%;float: right;">
                                            <tbody>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Subtotal</td>
                                                <td>{{Cart::subtotal()}} $</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Tax</td>
                                                <td>{{Cart::tax()}} $</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Total</td>
                                                <td>{{Cart::total()}} $</td>
                                            </tr>
                                            </tbody>


                                        </table>

                                </div>
                                @else
                                    <h3 class="text-center">
                                        There are no products in cart !
                                    </h3>
                                @endif
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-info">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-success">
                                    {{ __('Store order') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
