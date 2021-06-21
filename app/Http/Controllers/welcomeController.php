<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//khai bao model
use App\Product;
use App\Product_Image;
use App\Protype;
use App\Bill;
use App\Gender;
use App\Manufacture;
use App\Rating;
use App\User;
use App\Bill_Detail;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;

class WelcomeController extends Controller
{
    //hàm lấy all sản phẩm theo hãng nữ
    public function getProductByManufactureWomen($id)
    {
        $productbymanufacture = DB::table('products')->where('manu_id', '=', $id)->where('gender', '=', 2)->paginate(8);
         return view('frontend.productbymanufacture', compact('productbymanufacture'));
    }
    //hàm lấy all sản phẩm theo hãng nam
    public function getProductByManufactureMen($id)
    {
        $productbymanufacture = DB::table('products')->where('manu_id', '=', $id)->where('gender', '=', 1)->paginate(8);
         return view('frontend.productbymanufacture', compact('productbymanufacture'));
    }
     //hàm lấy all sản phẩm theo loại phaan trang
     public function getProductByCategory($id)
     {
        $category = DB::table('products')->where('type_id', '=', $id)->paginate(8);
         return view('frontend.productbycategory', compact('category'));
     }
    //hàm lấy all sản phẩm theo loại nu
    public function getProductByCategoryWomen($id, $manu_id)
    {
        $category = DB::table('products')->where('type_id', '=', $id)->where('gender', '=', 2)->where('manu_id', '=', $manu_id)->paginate(8);
        return view('frontend.productbycategory', compact('category'));
    }
    //hàm lấy all sản phẩm theo loại nam
    public function getProductByCategoryMen($id, $manu_id)
    {
        $category = DB::table('products')->where('type_id', '=', $id)->where('gender', '=', 1)->where('manu_id', '=', $manu_id)->paginate(8);
        return view('frontend.productbycategory', compact('category'));
    }

     //xem chi tiet san pham View_Product_Detail
     public function Product_Detail($id)
     {
        $singleProduct = Product::find($id);
        $product_image = Product::find($id)->product_image;
        //lấy các sản phẩm cùng hang san xuat vs singleProduct
        $productByCategory = Protype::find($singleProduct->type_id)->product;
        //lấy các đánh giá của sản phẩm
          $ratings = Product::find($id)->rating;
        return view('frontend.productdetail', compact('singleProduct','product_image','productByCategory','ratings'));
     }
    //lấy thông tin từ bảng protypes
    public function getProductByProtype()
    {
        $protype = Protype::all();
        return view('frontend.index', ['protypes' => $protype]);
    }
   //lấy sản phẩm nam đang sale
    public function getProductMenSale()
    {
        $producSale = Product::where('sale', '>=',1)->where('gender', '=', 1)->paginate(8);
        return view('frontend.productsale', compact('producSale'));
    }
    //lấy sản phẩm nữ đang sale
    public function getProductWomenSale()
    {
        $producSale = Product::where('sale', '>=',1)->where('gender', '=', 2)->paginate(8);
        return view('frontend.productsale', compact('producSale'));
    }

    //láy sản phẩm quần áo nữ
    public function getProductClothingFemale()
    {
        $Product_Female = Product::where('gender', '=',2)->where('type_id', '=', 1)->get();
        return view('frontend.index', compact('Product_Female'));
    }

    //ham tim kiem san pham theo tu khoa và phân trang
    public function Seach_Product(Request $request){
        $keyWord = $request->keyword;
        $seachProduct = DB::table('products')->where('name', 'like', '%'.$keyWord.'%')->paginate(8);
        return view('frontend.seachproduct', compact('seachProduct'));
    }

    public function Contact(){
        return view('frontend.contact');
    }

    //hàm xem lịch sử mua hàng của từng user
    public function Purchase_History($user_id){
    $bills = DB::table('bills')->join('bill__details', 'bills.id', '=', 'bill__details.bill_id')->join('products', 'bill__details.product_id', '=', 'products.id')->where('user_id', '=', $user_id)->get();
    $name_user = DB::table('users')->where('id', '=', $user_id)->get();

        return view('frontend.purchase history.purchasehistory', compact('bills', 'name_user'));
    }

    //hàm xem chi tiết đơn hàng đã mua
    public function Order_Detail($bill_id){
        echo $bill_id;
        $Order_Detail = Bill_Detail::with('Product')->where('bill_id', $bill_id)->get();

        return view('frontend.purchase history.orderdetail', compact('Order_Detail'));
    }
}
