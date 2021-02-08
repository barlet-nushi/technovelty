<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('ProductsController@index');
// });

Route::get('/',["uses"=>"ProductsController@index", 'as'=>'AllProducts']);

Route::get('products',["uses"=>"ProductsController@index", 'as'=>'AllProducts']);



//Queries

Route::get('products/proccessor',["uses"=>"ProductsController@proccessorProducts", 'as'=>'proccessorProducts']);
Route::get('products/ram',["uses"=>"ProductsController@ramProducts", 'as'=>'ramProducts']);
Route::get('products/graphiccard',["uses"=>"ProductsController@graphiccardProducts", 'as'=>'graphiccardProducts']);
Route::get('products/motherboard',["uses"=>"ProductsController@motherboardProducts", 'as'=>'motherboardProducts']);
Route::get('products/harddrive',["uses"=>"ProductsController@harddriveProducts", 'as'=>'harddriveProducts']);
Route::get('products/powersupply',["uses"=>"ProductsController@powersupplyProducts", 'as'=>'powersupplyProducts']);
Route::get('products/fans',["uses"=>"ProductsController@fansProducts", 'as'=>'fansProducts']);
Route::get('products/case',["uses"=>"ProductsController@caseProducts", 'as'=>'caseProducts']);
Route::get('products/monitor',["uses"=>"ProductsController@monitorProducts", 'as'=>'monitorProducts']);

Route::get('products/pcprebuilded',["uses"=>"ProductsController@pcprebuildedProducts", 'as'=>'pcprebuildedProducts']);
Route::get('products/laptops',["uses"=>"ProductsController@laptopProducts", 'as'=>'laptopProducts']);

//query per search
Route::get('search',["uses"=>"ProductsController@search", 'as'=>'searchProducts']);





Route::get('product/addtocart/{id}', ["uses"=>"ProductsController@addProductToCart", 'as'=>'AddToCartProduct']);

//show cart items 
Route::get('cart',["uses"=>"ProductsController@showCart", 'as'=>'cartProducts']);

//delete item from cart
Route::get('product/deleteItemFromCart/{id}', ["uses"=>"ProductsController@deleteItemFromCart", 'as'=>'DeleteItemFromCart']);

//create an order
Route::get('product/createOrder/', ["uses"=>"ProductsController@createOrder", 'as'=>'createOrder']);


//user authentication
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//admin panel routes shqip
Route::get('admin/products',["uses"=>"Admin\AdminProductsController@index", 'as'=>'adminDisplayProducts'])->middleware('restrictToAdmin');

//gjeneron rrugen per display edit formen
Route::get('admin/editProductForm/{id}',["uses"=>"Admin\AdminProductsController@editProductForm", 'as'=>'adminEditPrductForm'])->middleware('restrictToAdmin');

//display edit product image form
Route::get('admin/editProductImageForm/{id}',["uses"=>"Admin\AdminProductsController@editProductImageForm", 'as'=>'adminEditPrductImageForm'])->middleware('restrictToAdmin');

//update product image
Route::post('admin/updateProductImage/{id}',["uses"=>"Admin\AdminProductsController@updateProductImage", 'as'=>'adminUpdatePrductImageForm'])->middleware('restrictToAdmin');

//update product data
Route::post('admin/updateProduct/{id}',["uses"=>"Admin\AdminProductsController@updateProduct", 'as'=>'adminUpdateProduct'])->middleware('restrictToAdmin');

//create product form 
Route::get('admin/createProductForm/',["uses"=>"Admin\AdminProductsController@createProductForm", 'as'=>'adminCreateProductForm'])->middleware('restrictToAdmin');

//new product data to database
Route::post('admin/sendCreateProductForm/',["uses"=>"Admin\AdminProductsController@sendCreateProductForm", 'as'=>'adminSendCreateProductForm'])->middleware('restrictToAdmin');

//delete product 
Route::get('admin/deleteProduct/{id}',["uses"=>"Admin\AdminProductsController@deleteProduct", 'as'=>'adminDeleteProduct'])->middleware('restrictToAdmin');

