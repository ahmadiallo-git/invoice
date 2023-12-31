<form action="{{route("admin.orders.store")}}" method="POST">
    @csrf
    {{-- customer_name and email fields --}}

    <div class="card">
        <div class="card-header">
            Products
        </div>

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="product0">
                        <td>
                            <select name="products[]" class="form-control" >
                                <option value="">-- choose product --</option>
                                @foreach ($products as $product)
                                   <option value="{{$product->id}}">
                                    {{$product->name}} (${{number_format($product->price, 2)}})
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" value="1"/>
                        </td>
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <div id="add_row" class="pull-left btn btn-default">-Add Row</div>
                    <div id="delete_row" class="pull-right btn btn-danger">- Delete Row</div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <input type="submit" class="btn btn-danger" value="{{ trans(global.save) }}">
    </div>

</form>