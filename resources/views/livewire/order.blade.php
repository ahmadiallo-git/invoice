<div class="col-lg-12">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
               
                {{-- <form method="POST" action="{{route('orders.store')}}">
                    @csrf --}}
                    <div class="card-body">
                        <div class="my-2">
                            <form wire:submit.prevent="InsertToCart">
                            <input type="text" name="" wire:model="product_name" id="" class="form-control" placeholder="Enter product name"/>
                        </form>
                        </div>
                        {{ $productInCart }}
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Dis(%)</th>
                                    <th>Total</th>
                                    <th><a href="#" class="btn btn-sm-success add_more"><i class="fa fa-plus-circle"></i>+</a></th>
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct" >
                                <tr>
                                    <td>
                                    <select name="product_id[]" id="product_id" class="form-control">
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}">
                                                {{$product->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    </td>
                                   <td>
                                    <input type="number" name="quantity[]" id="quantity" class="form-control">
                                   </td>
                                   <td>
                                    <input type="number" name="price[]" id="price" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="discount[]" id="discount" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="total[]" id="total" class="form-control">
                                </td>
                                <td><a href="#" class="btn btn-sm-success delete "><i class="fa fa-plus-circle"></i>-</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>