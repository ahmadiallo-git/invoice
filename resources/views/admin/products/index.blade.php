@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ajouter Products</h3>

                <a href="{{url('admin/products/create')}}" class="btn btn-primary float-md-right">Add product</a>
            </div>
            <div class="card-body">
                creation des produits 
            </div>
        </div>
    </div>
</div>
@endSection