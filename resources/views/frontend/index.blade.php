@extends('frontend.master')
@section('content')

<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-8 col-12">
            <!--sidebar banner-->
            <div class="sidebar_widget banner mb-35">
                <div class="banner_img mb-35">
                    <a href="#"><img src="{{url('assets\img\banner\banner5.jpg')}}" alt=""></a>
                </div>
                <div class="banner_img">
                    <a href="#"><img src="{{url('assets\img\banner\banner6.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--sidebar banner end-->

            <!--categorie menu start-->

            <div class="category_item">
                <h3>CATEGORIES</h3>

                <ul>

                    <!-- hiển thị danh sách loại sản phẩm -->
                    @foreach ($protype as $value)
                    <li>
                        <a href="{{route('productbycategory',['id'=>$value->id])}}"> {{$value->type_name}}</a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <!--categorie menu end-->

            <!--popular tags area-->
            <div class="sidebar_widget tags mb-35 popular-tags">
                <div class="block_title">
                    <h3>popular tags</h3>
                </div>
                <div class="block_tags">
                    <a href="#">ipod</a>
                    <a href="#">sam sung</a>
                    <a href="#">apple</a>
                    <a href="#">iphone 5s</a>
                    <a href="#">superdrive</a>
                    <a href="#">shuffle</a>
                    <a href="#">nano</a>
                    <a href="#">iphone 4s</a>
                    <a href="#">canon</a>
                </div>
            </div>
            <!--popular tags end-->

            <!--newsletter block start-->
            <div class="sidebar_widget newsletter mb-35">
                <div class="block_title">
                    <h3>newsletter</h3>
                </div>
                <form action="#">
                    <p>Sign up for your newsletter</p>
                    <input placeholder="Your email address" type="text">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <!--newsletter block end-->

            <!--sidebar banner-->
            <div class="sidebar_widget bottom ">
                <div class="banner_img">
                    <a href="#"><img src="{{url('assets\img\banner\banner9.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--sidebar banner end-->



        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider slider_1">
                <div class="slider_active owl-carousel">
                    <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>Women's Fashion</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>New Collection</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.png)">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1>Best Collection</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--banner slider start-->

            <!--new product area start-->
            <div class="new_product_area">
                <div class="block_title">
                    <h3>New Products</h3>
                </div>
                <div class="row">
                    <div class="product_active owl-carousel">

                        <!--get product from database-->
                        @foreach($Product_Female as $value)



                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">

                                    <a href="{{route('Product_Detail', ['id'=>$value->id])}}"><img src="{{url('assets/img/product/'.$value->image.'')}}" alt=""></a>

                                    <div class="img_icone">
                                        <img src="{{url('assets\img\cart\span-new.png')}}" alt="">
                                    </div>
                                    <div class="product_action">
                                        <form action="{{URL::to('/save-cart')}}" method="POST">
                                            {{csrf_field() }}
                                            <input type="hidden" name="qty" value="1">
                                            <input name="productid_hidden" value="{{$value->id}}" type="hidden">

                                            <button class="btn-add-product" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            <!-- <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                        </form>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">{{number_format($value->price)}} VNĐ</span>

                                    <h3 class="product_title"><a href="{{route('Product_Detail', ['id'=>$value->id])}}">{{$value->name}}</a></h3>

                                </div>
                                <div class="product_info">
                                    <ul>
                                        <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- sản phẩm mẫu -->

                    </div>
                </div>
            </div>
            <!--new product area start-->

            <!--featured product start-->
            <div class="featured_product">
                <div class="block_title">
                    <h3>Featured Products</h3>
                </div>
                <div class="row">
                    <div class="product_active owl-carousel">
                        @foreach ($product as $value)
                        <div class="col-lg-3">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a href="{{route('Product_Detail', ['id'=>$value->id])}}"><img src="{{url('assets/img/product/'.$value->image.'')}}" alt=""></a>
                                    <div class="hot_img">
                                        <img src="{{url('assets\img\cart\span-hot.png')}}" alt="">
                                    </div>
                                    <div class="product_action">

                                        <form action="{{URL::to('/save-cart')}}" method="POST">
                                            {{csrf_field() }}
                                            <input type="hidden" name="qty" value="1">
                                            <input name="productid_hidden" value="{{$value->id}}" type="hidden">
                                            <!-- <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a> -->
                                            <button class="btn-add-product" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </form>

                                    </div>
                                </div>
                                <div class="product_content">
                                    <span class="product_price">{{number_format($value->price)}} VNĐ</span>
                                    <h3 class="product_title"><a href="{{route('Product_Detail', ['id'=>$value->id])}}">{{$value->name}}</a></h3>
                                </div>
                                <div class="product_info">
                                    <ul>
                                        <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!--featured product end-->

            <!--banner area start-->
            <div class="banner_area mb-60">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <a href="#"><img src="{{url('assets\img\banner\banner7.jpg')}}" alt=""></a>
                            <div class="banner_title">
                                <p>Up to <span> 40%</span> off</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_banner">
                            <a href="#"><img src="{{url('assets\img\banner\banner8.jpg')}}" alt=""></a>
                            <div class="banner_title title_2">
                                <p>sale off <span> 30%</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--banner area end-->

            <!--brand logo strat-->
            <div class="brand_logo mb-60">
                <div class="block_title">
                    <h3>Brands</h3>
                </div>
                <div class="row">
                    <div class="brand_active owl-carousel">
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand1.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand2.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand3.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand4.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand5.jpg')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="single_brand">
                                <a href="#"><img src="{{url('assets\img\brand\brand6.jpg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--brand logo end-->
        </div>
    </div>
</div>
<!--pos home section end-->
@endsection
