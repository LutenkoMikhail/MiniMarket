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
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            Users: <span class="text-muted">{{$users->count()}}</span>
                            <hr>
                            Orders: <span class="text-muted">{{$orders->count()}}</span>
                            <hr>
                            Products: <span class="text-muted">{{$products->count()}}</span>
                            <hr>
                            Categories: <span class="text-muted">{{$categories->count()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
