<tr>
    <td>
        @if( Storage::has ($row->model->image))
            <img src="{{ Storage::url($row->model->image) }}" height="80" width="10"
                 class="card-img-top"
                 style="max-width: 45%; margin: 0 auto; display: block;">
        @endif
    </td>
    <td>
        <a href="{{route('product.show',$row->id)}}"><strong> {{$row->name}}</strong></a>
    </td>
    <td>{{$row->qty}}</td>
    <td>{{$row->price}}$</td>
    <td>{{$row->total}}$</td>
</tr>
