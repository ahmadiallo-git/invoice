@foreach ($orders as $order)
    <tr data-entry-id="{{$order->id}}">
        <td>
            {{order->id ?? ''}}
        </td>
        <td>
            {{$order->customer_name ?? ''}}
        </td>
        <td>
            {{$order->customer_email ?? ''}}
        </td>
        <td>
            <ul>
                @foreach ($order->products as $item)

                <li>{{ $item->name }} ( {{$item->pivot->quantity}} * ${{$item->price}})</li>                    
                @endforeach
            </ul>
        </td>
    </tr>    
@endforeach