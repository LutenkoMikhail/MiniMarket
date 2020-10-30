@extends('layouts.app')

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
                <h3 class="text-center"> {{ __ ('Create Product.') }} </h3>
            </div>
            <form action="{{route ('admin.product.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" minlength="5" maxlength="50"  required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description"
                           class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                    <div class="col-md-6">
                        <p><textarea rows="10" cols="45" name="description" id="description" cols="40" rows="5"
                                     class="form-control @error('description') is-invalid @enderror"
                                     minlength="5" maxlength="50"  required placeholder="description"
                                     autofocus>{{ old('description') }}</textarea></p>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>
                    <div class="col-md-6">
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror"
                               name="price" value="{{ old('price') }}" step="any" min="1" required autocomplete="price"
                               autofocus>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                               name="image" value="{{ old('image') }}" accept="image/jpeg,image/png" required
                               autocomplete="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <p>
                    <label for="selectcategory"
                           class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                    <select id="selectcategory" name="selectcategory" size="3" required>
                        @foreach($categories as $category)
                            <option value={{$category->id}} >{{$category->name}}</option>
                        @endforeach
                    </select>
                </p>
                @error('selectcategory')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <button type="submit" class="btn btn-primary">Create Product.</button>
            {{--        </div>--}}

        </div>

        </form>
@endsection













