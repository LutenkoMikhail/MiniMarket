@extends('layouts.app')
@section('title','Admin.Edit Product.')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card-header">
                <h3 class="text-center"> {{ __ ('Edit Product.') }} </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <form action="{{route ('admin.product.update',$product->id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $product->name }}" minlength="5" maxlength="50" required
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
                           class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>
                    <div class="col-md-6">
                        <p><textarea rows="10" cols="45" name="description" id="description" cols="40" rows="5"
                                     class="form-control @error('description') is-invalid @enderror"
                                     minlength="5" maxlength="50" required placeholder="description"
                                     autofocus>{{ old('description') }}{{$product->description}}</textarea></p>
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
                               name="price" value="{{ $product->price }}" step="any" min="1" required
                               autocomplete="price"
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
                               name="image" value="{{ old('image') }}" accept="image/jpg,image/jpeg,image/png" required
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
                            <option value={{$category->id}}
                            @if($category->id===$product->category_id)

                                selected
                                @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </p>
                @error('selectcategory')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <button type="submit" class="btn btn-primary">Edit Product.</button>
        </div>
    </div>
    </form>
@endsection













