<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron - Fashion eCommerce Bootstrap4 Template</title>
    <style>
        .update-button {
            background: #00bba6;
            color: #fff;
            margin-left: 10px;
            border: none;
            padding: 7px;
            transition: all 0.3s ease-out 0s;
        }
        .update-button:hover {
            background: #ea3a3c;
        }
    </style>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets\img\favicon.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{url('assets\css\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets\css\plugin.css')}}">
    <link rel="stylesheet" href="{{url('assets\css\bundle.css')}}">
    <link rel="stylesheet" href="{{url('assets\css\style.css')}}">
    <link rel="stylesheet" href="{{url('assets\css\responsive.css')}}">
    <link rel="stylesheet" href="{{url('assets\css\mystyle.css')}}">
    <script src="{{url('assets\js\vendor\modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
                <div class="header_area">
                    <!--header top-->
                    <div class="header_top">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="switcher">
                                    <ul>
                                        <li class="languages"><a href="#"><img src="{{url('assets\img\logo\fontlogo.jpg')}}" alt=""> English <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown_languages">
                                                <li><a href="#"><img src="{{url('assets\img\logo\fontlogo.jpg')}}" alt=""> English</a></li>
                                                <li><a href="#"><img src="{{url('assets\img\logo\fontlogo2.jpg')}}" alt=""> French </a></li>
                                            </ul>
                                        </li>

                                        <li class="currency"><a href="#"> Currency : $ <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown_currency">
                                                <li><a href="#"> Dollar (USD)</a></li>
                                                <li><a href="#"> Euro (EUR) </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="header_links">
                                    <ul>
                                        <li><a href="contact.html" title="Contact">Contact</a></li>
                                        <li><a href="wishlist.html" title="wishlist">My wishlist</a></li>
                                        <li><a href="my-account.html" title="My account">My account</a></li>
                                        <li><a href="cart.html" title="My cart">My cart</a></li>
                                        <li><a href="{{ url('/home') }}" title="Login">Login</a></li>
                                        <!--Logout-->
                                        <li> <a class="" href="{{ url('/app')}}">Login & logout</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header top end-->

                    <!--header middel-->
                    <div class="header_middel">
                        <div class="row align-items-center">
                            <!--logo start-->
                            <div class="col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.html"><img src="{{url('assets\img\logo\logo.jpg.png')}}" alt=""></a>
                                </div>
                            </div>
                            <!--logo end-->
                            <div class="col-lg-9 col-md-9">
                                <div class="header_right_info">
                                    <div class="search_bar">
                                        <form action="#">
                                            <input placeholder="Search..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="shopping_cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> 2Items - $209.44 <i class="fa fa-angle-down"></i></a>

                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{url('assets\img\cart\cart.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">lorem ipsum dolor</a>
                                                    <span class="cart_price">$115.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{url('assets\img\cart\cart2.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Quisque ornare dui</a>
                                                    <span class="cart_price">$105.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="shipping_price">
                                                <span> Shipping </span>
                                                <span> $7.00 </span>
                                            </div>
                                            <div class="total_price">
                                                <span> total </span>
                                                <span class="prices"> $227.00 </span>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html"> Check out</a>
                                            </div>
                                        </div>
                                        <!--mini cart end-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header middel end-->
                    <div class="header_bottom">
                        <div class="row">
                            <div class="col-12">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block">
                                        <nav>
                                            <ul>
                                                <!-- Item HOME -->
                                                <li class="active"><a href="{{url('/index')}}">Home</a></li>

                                                <!-- Item WOMEN -->
                                                <li><a href="#">Women</a>
                                                    <div class="mega_menu">
                                                        <div class="mega_top fix">

                                                            <!--hiển thị hãng sản xuất trên thanh menu-->
                                                            @foreach($manufacture as $value)
                                                            <div class="mega_items">
                                                                <h3><a href="{{route('productbymanufacture',['id'=>$value->id])}}">{{$value->manu_name}}</a></h3>
                                                                <ul>
                                                                    <!--hiển thị loại sản phẩm trên thanh menu-->
                                                                    @foreach ($protype as $protype_item)
                                                                    <li><a href="{{route('productbycategory',['id'=>$protype_item->id])}}">{{$protype_item->type_name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="mega_bottom fix">
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner1.jpg')}}" alt=""></a>
                                                            </div>
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner2.jpg')}}" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Item MEN -->
                                                <li><a href="#">Men</a>
                                                    <div class="mega_menu">
                                                        <div class="mega_top fix">
                                                            <!--hiển thị hãng sản xuất trên thanh menu-->
                                                            @foreach($manufacture as $value)
                                                            <div class="mega_items">
                                                                <h3><a href="{{route('productbymanufacture',['id'=>$value->id])}}">{{$value->manu_name}}</a></h3>
                                                                <ul>
                                                                    <!--hiển thị loại sản phẩm trên thanh menu-->
                                                                    @foreach ($protype as $protype_item)
                                                                    <li><a href="{{route('productbycategory',['id'=>$protype_item->id])}}">{{$protype_item->type_name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="mega_bottom fix">
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner1.jpg')}}" alt=""></a>
                                                            </div>
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner2.jpg')}}" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- item SALE -->
                                                <li><a href="#">Sale</a>
                                                    <div class="mega_menu">
                                                        <div class="mega_top fix">
                                                            <div class="mega_items">
                                                                <h3><a href="#">Men's Sale</a></h3>
                                                                <ul>
                                                                    <!--hiển thị loại sản phẩm trên thanh menu-->
                                                                    @foreach ($protype as $protype_item)
                                                                    <li><a href="/{{$protype_item->id}}">{{$protype_item->type_name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="mega_items">
                                                                <h3><a href="#">Women's Sale</a></h3>
                                                                <ul>
                                                                    <!--hiển thị loại sản phẩm trên thanh menu-->
                                                                    @foreach ($protype as $protype_item)
                                                                    <li><a href="/{{$protype_item->id}}">{{$protype_item->type_name}}</a></li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="mega_bottom fix">
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner1.jpg')}}" alt=""></a>
                                                            </div>
                                                            <div class="mega_thumb">
                                                                <a href="#"><img src="{{url('assets\img\banner\banner2.jpg')}}" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <!-- Item CONTACT US -->
                                                <li><a href="contact.html">contact us</a></li>

                                            </ul>
                                        </nav>
                                    </div>


                                    <!-- giao diện cho mobile -->
                                    <!-- <div class="mobile-menu d-lg-none">
                                        <nav>
                                            <ul>
                                                <li><a href="index.html">Home</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="index.html">Home 1</a></li>
                                                                <li><a href="index-2.html">Home 2</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="shop.html">shop</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="shop-list.html">shop list</a></li>
                                                                <li><a href="shop-fullwidth.html">shop Full Width Grid</a></li>
                                                                <li><a href="shop-fullwidth-list.html">shop Full Width list</a></li>
                                                                <li><a href="shop-sidebar.html">shop Right Sidebar</a></li>
                                                                <li><a href="shop-sidebar-list.html">shop list Right Sidebar</a></li>
                                                                <li><a href="single-product.html">Product Details</a></li>
                                                                <li><a href="single-product-sidebar.html">Product sidebar</a></li>
                                                                <li><a href="single-product-video.html">Product Details video</a></li>
                                                                <li><a href="single-product-gallery.html">Product Details Gallery</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="#">women</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Accessories</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Cocktai</a></li>
                                                                    <li><a href="#">day</a></li>
                                                                    <li><a href="#">Evening</a></li>
                                                                    <li><a href="#">Sundresses</a></li>
                                                                    <li><a href="#">Belts</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">HandBags</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Accessories</a></li>
                                                                    <li><a href="#">Hats and Gloves</a></li>
                                                                    <li><a href="#">Lifestyle</a></li>
                                                                    <li><a href="#">Bras</a></li>
                                                                    <li><a href="#">Scarves</a></li>
                                                                    <li><a href="#">Small Leathers</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Tops</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Evening</a></li>
                                                                    <li><a href="#">Long Sleeved</a></li>
                                                                    <li><a href="#">Shrot Sleeved</a></li>
                                                                    <li><a href="#">Tanks and Camis</a></li>
                                                                    <li><a href="#">Sleeveless</a></li>
                                                                    <li><a href="#">Sleeveless</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <a href="#"><img src="{{url('assets\img\banner\banner1.jpg')}}" alt=""></a>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="{{url('assets\img\banner\banner2.jpg')}}" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="#">men</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Rings</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Platinum Rings</a></li>
                                                                    <li><a href="#">Gold Ring</a></li>
                                                                    <li><a href="#">Silver Ring</a></li>
                                                                    <li><a href="#">Tungsten Ring</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Bands</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Platinum Bands</a></li>
                                                                    <li><a href="#">Gold Bands</a></li>
                                                                    <li><a href="#">Silver Bands</a></li>
                                                                    <li><a href="#">Silver Bands</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="{{url('assets\img\banner\banner3.jpg')}}" alt=""></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li><a href="#">pages</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Column1</a></h3>
                                                                <ul>
                                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                                    <li><a href="portfolio-details.html">single portfolio </a></li>
                                                                    <li><a href="about.html">About Us </a></li>
                                                                    <li><a href="about-2.html">About Us 2</a></li>
                                                                    <li><a href="services.html">Service </a></li>
                                                                    <li><a href="my-account.html">my account </a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Column2</a></h3>
                                                                <ul>
                                                                    <li><a href="blog.html">Blog </a></li>
                                                                    <li><a href="blog-details.html">Blog Details </a></li>
                                                                    <li><a href="blog-fullwidth.html">Blog FullWidth</a></li>
                                                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                                    <li><a href="faq.html">Frequently Questions</a></li>
                                                                    <li><a href="404.html">404</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Column3</a></h3>
                                                                <ul>
                                                                    <li><a href="contact.html">Contact</a></li>
                                                                    <li><a href="cart.html">cart</a></li>
                                                                    <li><a href="checkout.html">Checkout </a></li>
                                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                                    <li><a href="login.html">Login</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li><a href="blog.html">blog</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="blog-details.html">blog details</a></li>
                                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="contact.html">contact us</a></li>

                                            </ul>
                                        </nav>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header end -->

                <!--pos home section-->
                @yield('content')
                <!--pos home section end-->

            </div>
            <!--pos page inner end-->
        </div>
    </div>
    <!--pos page end-->

    <!--footer area start-->
    <div class="footer_area">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer_widget">
                            <h3>About us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <div class="footer_widget_contect">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 19 Interpro Road Madison, AL 35758, USA</p>

                                <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact@plazathemes.com </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer_widget">
                            <h3>My Account</h3>
                            <ul>
                                <li><a href="#">Your Account</a></li>
                                <li><a href="#">My orders</a></li>
                                <li><a href="#">My credit slips</a></li>
                                <li><a href="#">My addresses</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer_widget">
                            <h3>Informations</h3>
                            <ul>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Our store(s)!</a></li>
                                <li><a href="#">My credit slips</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">About us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer_widget">
                            <h3>extras</h3>
                            <ul>
                                <li><a href="#"> Brands</a></li>
                                <li><a href="#"> Gift Vouchers </a></li>
                                <li><a href="#"> Affiliates </a></li>
                                <li><a href="#"> Specials </a></li>
                                <li><a href="#"> Privacy policy </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <ul>
                                <li><a href="#"> about us </a></li>
                                <li><a href="#"> Customer Service </a></li>
                                <li><a href="#"> Privacy Policy </a></li>
                            </ul>
                            <p>Copyright &copy; 2018 <a href="#">Pos Coron</a>. All rights reserved. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_social text-right">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer area end-->

    <!-- modal area start -->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{url('assets/img/product/product13.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{url('assets\img\product\product14.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{url('assets\img\product\product15.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{url('assets\img\cart\cart17.jpg')}}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{url('assets\img\cart\cart18.jpg')}}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{url('assets\img\cart\cart19.jpg')}}" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>tran phi thuong</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$66</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_content mb-10">
                                        <p>Short-sleeved blouse with feminine draped sleeve detail.</p>
                                    </div>
                                    <div class="modal_size mb-15">
                                        <h2>size</h2>
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                    <div class="modal_add_to_cart mb-15">
                                        <form action="#">
                                            <input min="0" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>lorem is spum</p>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal area end -->



    <!-- all js here -->
    <script src="{{url('assets\js\vendor\jquery-1.12.0.min.js')}}"></script>
    <script src="{{url('assets\js\popper.js')}}"></script>
    <script src="{{url('assets\js\bootstrap.min.js')}}"></script>
    <script src="{{url('assets\js\ajax-mail.js')}}"></script>
    <script src="{{url('assets\js\plugins.js')}}"></script>
    <script src="{{url('assets\js\main.js')}}"></script>
</body>

</html>
