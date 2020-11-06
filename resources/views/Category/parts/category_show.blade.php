<a href="{{route('categories.product.show',$category->id)}}"
   class="btn btn-primary btn-lg btn-block">{{__ ($category->name)}} </a>
@auth
@if (Auth::user()->isAdmin())
            <a href="{{ route('admin.categories.edit', $category->id) }}"
               class="btn btn-danger">{{ __('EDIT') }}</a>
            <a href="{{ route('admin.categories.delete', $category->id) }}"
               class="btn btn-dark">{{ __('DELETE') }}</a>
            <a href="{{ route('admin.categories.create', $category->id) }}"
               class="btn btn-success">{{ __('NEW') }}</a>
@endif
@endauth
