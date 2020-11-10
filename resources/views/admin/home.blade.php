@extends('layouts.app')
@section('title','Admin.Dashboard !')
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
                        <div class="card-header">Dashboard !</div>
                        <div class="card-body">
                            Total Users: <span class="text-muted">{{$users->count()}}</span>
                            <hr>
                            Total Orders: <span class="text-muted">{{$orders->count()}}</span>
                            <hr>
                            Total Products: <span class="text-muted">{{$countProducts}}</span>
                            <hr>
                            Total Categories: <span class="text-muted">{{  $countCategories}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
