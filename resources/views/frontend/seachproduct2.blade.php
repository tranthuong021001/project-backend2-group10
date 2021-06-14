 @extends('frontend.master')
 @section('content')


 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
     <div class="row">
         <div class="col-12">
             <div class="breadcrumb_content">
                 <ul>
                     <li><a href="#">home</a></li>
                     <li><i class="fa fa-angle-right"></i></li>
                     <li>seach product</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!--breadcrumbs area end-->

 <!--pos home section-->
 <div class=" pos_home_section shop_section shop_fullwidth">

     <div class="row">
         <div class="col-3">
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
         </div>

         <div class="col-9">
             <!--shop toolbar start-->
             <div class="shop_toolbar mb-35">
                 <div class="list_button">
                     <ul class="nav" role="tablist">
                         <li>
                             <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                         </li>
                         <li>
                             <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                         </li>
                     </ul>
                 </div>
                 <div class="page_amount">
                     <p>Showing 1–9 of 21 results</p>
                 </div>
                 <div class="select_option">
                     <form action="#">
                         <label>Sort By</label>
                         <select name="orderby" id="short">
                             <option selected="" value="1">Position</option>
                             <option value="1">Price: Lowest</option>
                             <option value="1">Price: Highest</option>
                             <option value="1">Product Name:Z</option>
                             <option value="1">Sort by price:low</option>
                             <option value="1">Product Name: Z</option>
                             <option value="1">In stock</option>
                             <option value="1">Product Name: A</option>
                             <option value="1">In stock</option>
                         </select>
                     </form>
                 </div>
             </div>




             <!--shop toolbar end-->

             <!--shop tab product-->
             <div class="shop_tab_product shop_fullwidth">
                 <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="large" role="tabpanel">
                         <div class="row">
                             <!-- hien thi san pham da tim duoc -->

                             
                         </div>
                     </div>



                 </div>
             </div>
             <!--shop tab product end-->


         </div>
     </div>



     <!--pagination style start-->
     <div class="pagination_style shop_page">
         <div class="item_page">
             <form action="#">
                 <label for="page_select">show</label>
                 <select id="page_select">
                     <option value="1">8</option>
                     <!-- <option value="2">10</option>
                     <option value="3">11</option> -->
                 </select>
                 <span>Products by page</span>
             </form>
         </div>
         <div class="page_number">
             <!-- <span>Pages: </span>
             <ul>
                 <li>«</li>
                 <li class="current_number">1</li>
                 <li><a href="#">2</a></li>
                 <li>»</li>
             </ul> -->

         </div>

     </div>
     <!--pagination style end-->
 </div>
 <!--pos home section end-->
 @endsection
