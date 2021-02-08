@extends('layouts.admin')

@section('body')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>{!! print_r($errors->all()) !!}</li>
            </ul>
        </div>
    @endif

    <div class="table-responsive">
    <h4>Current Image:</h4>

    <div>
        <img src="{{asset('storage')}}/product_images/{{$product['image']}}" style="max-height: 220px">
    </div>
    <form action="/admin/updateProductImage/{{$product->id}}" method="POST" enctype="multipart/form-data">
        {{@csrf_field()}}

        <div class="form-group">
            <label for="description">Update Image</label><br/>
            <input type="file" class="" name="image" id="image" placeholder="image" value="{{$product->image}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
    </div>

@endsection