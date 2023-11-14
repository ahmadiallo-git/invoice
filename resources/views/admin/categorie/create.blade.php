@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
        <a class="btn btn-primary btn-sm text-white float-right" href="{{url('admin/categorie/create')}}">Back</a>
            </div>
                <div class="card-body">
                     <form action="{{url('admin/categorie')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control"/>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control"> </textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" class="form-control"/>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="float-right btn btn-primary" autofocus>Save </button>
                            </div>
                        </div>
                     </form>
                </div>            
        </div>
    </div>
</div>

@endSection('content')