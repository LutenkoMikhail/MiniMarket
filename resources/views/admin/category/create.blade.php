@extends('layouts.app')
@section('title','Admin.Create Category.')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center"> {{ __ ('Create Category.') }} </h3>
            </div>
            <form action="{{route ('admin.categories.store')}}" method="post" multiple="multiple">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" minlength="5" maxlength="50" placeholder="name"
                               required
                               autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description"
                           class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                    <div class="col-md-6">
                        <p><textarea rows="10" cols="45" name="description" id="description" cols="40" rows="5"
                                     class="form-control @error('description') is-invalid @enderror"
                                     minlength="5" maxlength="100" required placeholder="description"
                                     autofocus>{{ old('description') }}</textarea></p>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <button type="submit" class="btn btn-primary">Create Category.</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection













