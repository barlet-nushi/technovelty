@extends('layouts.index')

@section('center')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($cartItems->items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" width="100" height="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item['data']['name']}}</a></h4>
                            <p>id: {{$item['data']['id']}}</p>
                            <p>{{$item['data']['description']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$item['data']['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$item['totalSinglePrice']}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('DeleteItemFromCart',['id' => $item['data']['id'] ]) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Check Out</h3>
        </div>
        <div class="row">
            <div class="col-sm-6">
                
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Quantity <span>{{$cartItems->totalQuantity}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total Price <span>{{$cartItems->totalPrice}} den</span></li>
                    </ul>
                        <a class="btn btn-default check_out" href="{{route('createOrder')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection