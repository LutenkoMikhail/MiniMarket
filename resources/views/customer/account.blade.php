@extends('layouts.app')
@section('title','Account User.')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    @auth
                        <div class="card-header">Account User.</div>
                        <div class="card-body">
                            <h2 class="card-title">Name : {{__( Auth::user()->name) }}</h2>
                            <hr>
                            <h2 class="card-title">Email : {{__( Auth::user()->email) }}</h2>
                            <hr>
                            <h2 class="card-title">Orders count: {{__(  Auth::user()->order()->count()) }}</h2>
                            <hr>
                        </div>
                        <div class="text-center">
                            <div class="btn-group">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-info">{{ __('Back') }}</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
