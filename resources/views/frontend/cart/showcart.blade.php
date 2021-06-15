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
                                ?>

                                @foreach ($content as $value)
                                <tr>
                                    <td class="product_remove"><a href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="{{url('assets/img/product/'.$value->options->image.'')}}" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{$value->name}}</a></td>
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="rowId_cart" value="{{$value->rowId}}">
                                        <td class="product-price">{{number_format($value->price)}} VNĐ</td>
                                        <td class="product_quantity"><input min="1" max="100" name="quantity_product" value="{{$value->qty}}" type="number">
                                            <button class="update-button" type="submit">Update</button>
                                        </td>
                                    </form>

                                    <td class="product_total">
                                        <?php
                                        $subtotal = $value->price * $value->qty;
                                        echo number_format($subtotal).' VNĐ';
                                        ?>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
<!--shopping cart area end -->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3></h3>
            </div>
        </div>
    </div>
    <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- thông tin đơn hàng -->
                <form action="{{url('/order')}}" method="post">
                    {{ csrf_field() }}
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-12 mb-30">
                            <label>Full Name <span>*</span></label>
                            <input type="text" name="shipping_name" required>
                        </div>
                        <div class="col-12 mb-30">
                            <label>Street address <span>*</span></label>
                            <input placeholder="House number and street name" type="text" name="shipping_address" required>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Phone<span>*</span></label>
                            <input type="text"name="shipping_phone" required>

                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Email Address <span>*</span></label>
                            <input type="text" name="shipping_email" required>

                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Order Notes</label>
                                <textarea id="order_note" name="shipping_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-30">
                            <div class="order_button">
                                <button type="submit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">


                <h3>Your order</h3>
                <div class="order_table table-responsive mb-30">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $content = Cart::content();
                            ?>
                            @foreach ($content as $value)
                            <tr>
                                <td> {{$value->name}} <strong> × {{$value->qty}}</strong></td>
                                <td>
                                    <?php
                                    $subtotal = $value->price * $value->qty;
                                    echo (number_format($subtotal)).' VNĐ';
                                    ?>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cart Subtotal</th>
                                <td>{{Cart::subtotal()}} VNĐ</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td><strong>0 VNĐ</strong></td>
                            </tr>
                            <tr class="order_total">
                                <th>Order Total</th>
                                <td><strong>{{Cart::subtotal()}} VNĐ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="payment_method">
                    <div class="panel-default">
                        <input id="payment" name="check_method" type="radio" data-target="createp_account">
                        <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Create an account?</label>

                        <div id="method" class="collapse one" data-parent="#accordion">
                            <div class="card-body1">
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-default">
                        <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
                        <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets\img\visha\papyel.png" alt=""></label>

                        <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                            <div class="card-body1">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection
