@extends('frontend.master')
@section('content')

<!--breadcrumbs area start-->
<!-- <div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>checkout</li>
                    <li><?php
                        echo Session::get('id');
                        echo Session::get('shipping_id');
                    ?></li>
                </ul>

            </div>
        </div>
    </div>
</div> -->
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>Order Success<br>
                    Thank You !!!
                </h3>
            </div>
        </div>
    </div>
    <!-- <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">

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
                                    echo (number_format($subtotal));
                                    ?>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cart Subtotal</th>
                                <td>$ {{Cart::subtotal()}}</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td><strong>$ 0</strong></td>
                            </tr>
                            <tr class="order_total">
                                <th>Order Total</th>
                                <td><strong>$ {{Cart::subtotal()}}</strong></td>
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
    </div> -->
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

@endsection
