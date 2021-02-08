<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function index(){

        $products = Product::paginate(15);

        return view('allproducts', compact('products'));
    }


    //queries controllers
    public function proccessorProducts(){
        $products = DB::table('products')->where('type',"proccessor")->get();
        return view('proccessorProducts', compact('products'));
    }
    public function ramProducts(){
        $products = DB::table('products')->where('type',"ram")->get();
        return view('ramProducts', compact('products'));
    }
    public function graphiccardProducts(){
        $products = DB::table('products')->where('type',"graphiccard")->get();
        return view('graphiccardProducts', compact('products'));
    }
    public function motherboardProducts(){
        $products = DB::table('products')->where('type',"motherboard")->get();
        return view('motherboardProducts', compact('products'));
    }
    public function harddriveProducts(){
        $products = DB::table('products')->where('type',"harddrive")->get();
        return view('harddriveProducts', compact('products'));
    }
    public function powersupplyProducts(){
        $products = DB::table('products')->where('type',"powersupply")->get();
        return view('powersupplyProducts', compact('products'));
    }
    public function fansProducts(){
        $products = DB::table('products')->where('type',"fans")->get();
        return view('fansProducts', compact('products'));
    }
    public function caseProducts(){
        $products = DB::table('products')->where('type',"caseProducts")->get();
        return view('caseProducts', compact('products'));
    }
    public function monitorProducts(){
        $products = DB::table('products')->where('type',"monitor")->get();
        return view('monitorProducts', compact('products'));
    }

    public function pcprebuildedProducts(){
        $products = DB::table('products')->where('type',"pcprebuilded")->get();
        return view('pcprebuildedProducts', compact('products'));
    }
    public function laptopProducts(){
        $products = DB::table('products')->where('type',"laptop")->get();
        return view('laptopProducts', compact('products'));
    }


    //search query function
    public function search(Request $request){
        $searchText = $request->get('searchText');
        $products = Product::where('name', "Like",$searchText."%")->paginate(10);
        return view('allproducts', compact('products'));
    }

    public function addProductToCart(Request $request, $id){
        
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);

        $request->session()->put('cart', $cart);

        //dump($cart);

        return redirect()->route("AllProducts");
    }

    public function showCart(){
        $cart = Session::get('cart');

        //card is not empty
        if ($cart) {
            //dump($cart);
            return view('cartproducts',['cartItems' => $cart]);
        }
        //card is empty
        else{
            //echo "cart is empty";
            return redirect()->route('AllProducts');
        }
    }

    public function deleteItemFromCart(Request $request, $id)
    {   
        $cart = $request->session()->get("cart");

        if (array_key_exists($id, $cart->items)) {
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get("cart");
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put("cart",$updatedCart);

        return redirect()->route('cartProducts');
    }

    public function createOrder()
    {
        $cart = Session::get('cart');

        if($cart){
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status"=>"on_hold","date"=>$date,"del_date"=>$date, "price"=>$cart->totalPrice);
            $created_order = DB::table("orders")->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();

            foreach ($cart->items as $cart_item) {

                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $newItemsInCurrentOrder = array("item_id"=>$item_id, "order_id"=>$order_id, "item_name"=>$item_name, "item_price"=>$item_price);
                $created_order_items = DB::table("order_items")->insert($newItemsInCurrentOrder);

            }

            Session::forget("cart");
            Session::flush();
            return redirect()->route("AllProducts")->withsuccess("Thank You for choosing us, The ORDER is in the way!!!");
        }
        else {
            return redirect()->route("AllProducts");
        }
    }
}
