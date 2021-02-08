
@extends('layouts.index')

@section('center')

<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="search_box pull-left">
                    <form action="search" method="GET">
                        <input type="text" name="searchText" placeholder="Search"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="slider"><!--slider-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                </ol>
                
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-6">
                            <h1><span>Tech</span>Novelty</h1>
                            <h2>It is better to fail in originality than to succeed in imitation.</h2>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{asset('images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />

                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>Tech</span>Novelty</h1>
                            <h2>Communication is at the heart of our business and community.</h2>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{asset('images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />

                        </div>
                    </div>
                    
                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>Tech</span>Novelty</h1>
                            <h2>It is better to fail in originality than to succeed in imitation.</h2>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{asset('images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />

                        </div>
                    </div>
                    
                </div>
                
                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            
        </div>
    </div>
</div>
</section><!--/slider-->

<section>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#pc-parts">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    PC PARTS
                                </a>
                            </h4>
                        </div>
                        <div id="pc-parts" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="{{route('proccessorProducts')}}">PROCESSOR</a></li>
                                    <li><a href="{{route('ramProducts')}}">RAM</a></li>
                                    <li><a href="{{route('graphiccardProducts')}}">GRAPHIC CARD</a></li>
                                    <li><a href="{{route('motherboardProducts')}}">MOTHERBOARD</a></li>
                                    <li><a href="{{route('harddriveProducts')}}">HARD DRIVE</a></li>
                                    <li><a href="{{route('powersupplyProducts')}}">POWER SUPPLY</a></li>
                                    <li><a href="{{route('fansProducts')}}">FANS</a></li>
                                    <li><a href="{{route('caseProducts')}}">CASE</a></li>
                                    <li><a href="{{route('monitorProducts')}}">MONITOR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{route('pcprebuildedProducts')}}">PC ( pre-builded )</a></h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{route('laptopProducts')}}">LAPTOPS</a></h4>
                        </div>
                    </div>
                </div><!--/category-products-->
            
            </div>
        </div>
        
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Features Items</h2>
                @foreach ($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="" />
                                    <h2>{{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$product->price}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            <!--features_items-->

            {{ $products->links() }}
            
        
        </div>
    </div>
</div>
</section>
@endsection