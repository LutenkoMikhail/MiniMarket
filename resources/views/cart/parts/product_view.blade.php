<tr>
    <td>
        @if( Storage::has ($row->model->image))
            <img src="{{ Storage::url($row->model->image) }}" height="160" width="60"
                 class="card-img-top"
                 style="max-width: 45%; margin: 0 auto; display: block;">
        @endif
    </td>
    <td>
        <a href="{{route('product.show',$row->id)}}"><strong> {{$row->name}}</strong></a>

        <p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
    </td>
    <td>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="rowId" min="1" value="{{ $row->rowId}}">
            <input type="number" name="product_count" min="1" value="{{ $row->qty}}">
            <input type="submit" value="Update count" formaction="{{route('customer.cart.count.update',$row->id)}}">
            <input type="submit" value="Delete product" formaction="{{route('customer.cart.delete.product',$row->id)}}">
        </form>
    </td>
    <td>{{$row->price}} $</td>
    <td>{{$row->total}} $</td>
</tr>
