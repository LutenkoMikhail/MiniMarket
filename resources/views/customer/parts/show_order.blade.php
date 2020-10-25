<div class="container">
    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            <h5 class="card-title">Oreder № {{__($order->id) }}</h5>
            <hr>
            Status: <span class="text-muted">{{ $order->getStatus()}}</span>
            <hr>
            Date: <span class="text-muted">{{ $order->updated_at}}</span>
        </div>
    </div>
</div>
