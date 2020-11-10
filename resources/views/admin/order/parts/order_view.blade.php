<div class="container">
    <div class="card mb-4 shadow-sm">
        <div class="card text-center">
            <div class="card-header">
                <h3> Number Order:{{__($order->id) }} </h3>
            </div>
        </div>
        <div class="card-body">
            <h3>
                User:{{$order->user()->value('name')}}
            </h3>
            <hr>
            Status: <span class="text-muted">{{ $order->getStatus()}}</span>
            <hr>
            Date: <span class="text-muted">{{ $order->updated_at}}</span>
            <hr>
            <h5>
                Total price: {{ $order->totalPrice()}}$
            </h5>
            <hr>

            <div class="d-flex flex-column justify-content-center align-items-start">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('admin.order.show', $order->id) }}"
                           class="btn btn-primary">{{ __('Show') }}</a>
                    </div>
                    @auth
                        @if (Auth::user()->isAdmin())
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('admin.order.edit', $order->id) }}"
                                       class="btn btn-danger">{{ __('EDIT') }}</a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.order.delete', $order->id) }}"
                                           class="btn btn-dark">{{ __('DELETE') }}</a>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
