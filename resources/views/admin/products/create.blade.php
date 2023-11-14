@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>All Products</h3>

                <a href="{{url('admin/products')}}" class="btn btn-primary float-md-right">Back</a>
            </div>
            <div class="card-body">
                Je suis un produits
            </div>
        </div>
    </div>
</div>
@endSection