@extends('layouts.app')
@section('title','All Categories.')
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
                    <div class="card-header">All Categories.</div>
                </div>
                @if (count($categories) > 0)
                    <div class="card-body">
                        <div class="album py-5 bg-light">
                            <div class="row ">
                                @each('category.parts.category_show',$categories,'category')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        {{$categories->links()}}
                    </div>
                @else
                    <div class="text-center">
                        <h2>
                            <p>Not Categories!</p>
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
