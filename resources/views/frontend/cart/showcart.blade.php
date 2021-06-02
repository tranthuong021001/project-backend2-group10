@extends('frontend.master')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Shopping Cart</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->



<!--shopping cart area start -->
<div class="shopping_cart_area">
    <form action="#">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $content = Cart::content();
                                echo '<pre>';
                                print_r($content);
                                echo '</pre>';

                                ?>

                                @foreach ($content as $value)

                                <tr>
                                    <td class="product_remove"><a href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{url('assets/img/product/'.$value->options->image.'')}}" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{$value->name}}</a></td>
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                    {{csrf_field()}}
                                        <input type="hidden" name="rowId_cart" value="{{$value->rowId}}">
                                        <td class="product-price">${{number_format($value->price)}}</td>
                                        <td class="product_quantity"><input min="0" max="100" name="quantity_product" value="{{$value->qty}}" type="text">
                                            <button class="update-button" type="submit">Update</button>
                                            <!-- <input type="submit" value="Update"> -->
                                            <!-- <a href="{{url('/update-cart-quantity/'.$value->rowId.'/10')}}">Update</a> -->
                                        </td>
                                       
                                    </form>

                                    <td><input type="text" value="{{$value->qty}}"></td>

                                    <td class="product_total">$
                                        <?php
                                        $subtotal = $value->price * $value->qty;
                                        echo (number_format($subtotal));
                                        ?></td>







                                </tr>

                                @endforeach


                                <!-- <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart18.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="#">Handbags justo</a></td>
                                    <td class="product-price">£90.00</td>
                                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                                    <td class="product_total">£180.00</td>


                                </tr>
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="assets\img\cart\cart19.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="#">Handbag elit</a></td>
                                    <td class="product-price">£80.00</td>
                                    <td class="product_quantity"><input min="0" max="100" value="1" type="number"></td>
                                    <td class="product_total">£160.00</td>


                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                    <div class="cart_submit">
                        <button type="submit">update cart</button>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area start-->
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input placeholder="Coupon code" type="text">
                            <button type="submit">Apply coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount"> $ {{Cart::subtotal()}}</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> $ 0</p>
                            </div>
                            <a href="#">Calculate shipping</a>

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount"> $ {{Cart::subtotal()}}</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="#">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </form>
</div>
<!--shopping cart area end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection
