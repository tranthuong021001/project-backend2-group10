@extends('frontend.master')
@section('content')

<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Purchase History</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="cart_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product_thumb">Image</th>
                                <th class="product_remove">Classify</th>
                                <th class="product_name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product_quantity">Quantity</th>
                                <th class="product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $value)
                            <tr>
                                <td class="product_thumb"><a href="#"><img src="{{url('assets/img/product/'.$value->image.'')}}" alt=""></a></td>
                                <td class="product_remove">
                                    <?php
                                        if($value->gender ==2){
                                            echo 'Female';
                                        }
                                        else
                                            echo 'Male'
                                    ?>
                                </td>
                                <td class="product_name"><a href="#">{{$value->name}}</a></td>
                                <td class="product-price">{{number_format($value->price)}} VNĐ</td>
                                <td class="product_quantity">{{$value->amount}}</td>
                                <td class="product_total">{{number_format($value->total_money)}} VNĐ</td>
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

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection
