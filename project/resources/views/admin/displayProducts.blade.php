@extends('layouts.admin')

@section('body')
    
<div class="table-responsive">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h1 class="h2">Dashboard</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Edit Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>
                        <img src="{{asset('storage')}}/product_images/{{$product['image']}}" alt="" width="150" height="150" style="max-height: 220px">
                    </td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['description']}}</td>
                    <td>{{$product['price']}}</td>
                    <td>{{$product['type']}}</td>
                    <td>
                        <a href="{{ route('adminEditPrductImageForm',['id' => $product['id'] ]) }}" class="btn btn-primary">Edit Image</a>
                    </td>
                    <td>
                        <a href="{{ route('adminEditPrductForm',['id' => $product['id'] ]) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('adminDeleteProduct',['id' => $product['id'] ]) }}" class="btn btn-danger">Remove</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{$products->links()}}

</div>


@endsection