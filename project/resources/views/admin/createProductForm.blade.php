@extends('layouts.admin')

@section('body')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>{!! print_r($errors->all()) !!}</li>
            </ul>
        </div>
    @endif

        

    <form action="/admin/sendCreateProductForm" method="POST" enctype="multipart/form-data">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Create New Product</h1>
        </div>

        {{@csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Descriptiom" required>
        </div>
        <div class="form-group">
            <label for="name">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Image" required>
        </div>
        <div class="form-group">
            <label for="name">Type</label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type" required>
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection