@extends('frontend.master')
@section('content')
<?php

use Carbon\Carbon;
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>single product</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product wrapper start-->
<div class="product_details">
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="product_tab fix">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="{{url('assets/img/product/'.$product_image[0]->image_name.'')}}" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="{{url('assets/img/product/'.$product_image[1]->image_name.'')}}" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="{{url('assets/img/product/'.$product_image[2]->image_name.'')}}" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{url('assets/img/product/'.$product_image[0]->image_name.'')}}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{url('assets\img\cart\span-new.png')}}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{{url('assets/img/product/'.$product_image[0]->image_name.'')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{url('assets/img/product/'.$product_image[1]->image_name.'')}}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{url('assets\img\cart\span-new.png')}}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{{url('assets/img/product/'.$product_image[1]->image_name.'')}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{url('assets/img/product/'.$product_image[2]->image_name.'')}}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{url('assets\img\cart\span-new.png')}}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{{url('assets/img/product/'.$product_image[2]->image_name.'')}}"> <i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="product_d_right">
                <h1>{{$singleProduct->name}}</h1>
                <div class="product_ratting mb-10">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"> Write a review </a></li>
                    </ul>
                </div>
                <div class="product_desc">
                    <p>{{$singleProduct->description}}</p>
                </div>

                <div class="content_price mb-15">
                    <!-- hiển thị giá khuyến mãi -->
                    <?php
                    if ($singleProduct->sale > 0) {
                        $rate = (100 - $singleProduct->sale) / 100;
                        $lastPrice = $rate * $singleProduct->price;
                    ?>
                        <span>{{number_format($lastPrice)}} VNĐ</span>
                        <span class="old-price">{{number_format($singleProduct->price)}} VNĐ</span>
                    <?php
                    } else {
                    ?>
                        <span>{{number_format($singleProduct->price)}} VNĐ</span>
                    <?php
                    }
                    ?>
                </div>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                    {{csrf_field() }}
                    <div class="box_quantity mb-20">

                        <label>quantity</label>
                        <input name="qty" min="0" max="100" value="1" type="number">
                        <input name="productid_hidden" value="{{$singleProduct->id}}" type="hidden">

                        <button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </div>
                </form>
                <div class="product_d_size mb-20">
                    <label for="group_1">size</label>
                    <select name="size" id="group_1">
                        <option value="1">{{$singleProduct->size}}</option>
                    </select>
                </div>

                <div class="sidebar_widget color">
                    <h2>Choose Color</h2>
                    <div class="widget_color">
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li> <a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="product_stock mb-20">
                    <p>299 items</p>
                    <span> In stock </span>
                </div>
                <div class="wishlist-share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!--product details end-->


<!--product info start-->
<div class="product_d_info">
    <div class="row">
        <div class="col-12">
            <div class="product_d_inner">
                <div class="product_info_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                        <div class="product_d_table">
                            <form action="#">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>

                        <!-- in ra danh gia san pham -->
                        @foreach ($ratings as $value)

                        <div class="product_info_inner">
                            <div class="product_ratting mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                             
                                <p>
                                    <?php
                                    $date = $value->created_at;
                                    $i = substr($date, 0, -9);

                                    $newformat = date('d/m/Y', strtotime($i));
                                    echo $newformat;
                                    ?>
                                </p>
                            </div>
                            <div class="product_demo">
                                <strong>{{$value->rating_name}}</strong>
                                <p>{{$value->rating_comment}}</p>
                            </div>
                        </div>
                        @endforeach

                        <div class="product_review_form">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--new product area start-->

<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3> Related Products</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="product_active owl-carousel">

            <!--get product from database-->
            @foreach($productByCategory as $value)
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

@endsection
