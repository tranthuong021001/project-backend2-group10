@extends('frontend.master')
@section('content')

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
    
</div>
<!--Checkout page section end-->

<!--shopping cart area start -->
    <?php
        $content = Cart::content();
    ?>
    <div class="evaluate-product">

        <table>
            @foreach ($content as $value)
            <tr class="product-row" >
                <form action="{{URL::to('/rating-product')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$value->id}}" name="product_id">
                    <input type="hidden" value="{{$value->rowId}}" name="product_rowId">
                    <td class="image_product"><a href="#"><img src="{{url('assets/img/product/'.$value->options->image.'')}}" alt=""></a></td>
                    <td class="name_product"><a href="#">{{$value->name}}</a></td>
                    <td class="product_comment">
                        <textarea name="product_comment" id="" cols="13" rows="2"></textarea>
                    </td>
                    <td class="product_button"><button class="update-button" type="submit">Evaluate</button></td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>


</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

@endsection
