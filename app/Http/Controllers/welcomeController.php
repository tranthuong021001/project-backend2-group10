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


class WelcomeController extends Controller
{
    public function page($page)
    {
        return view('frontend/' . $page);
    }
    //hàm lấy all sản phẩm theo hãng nữ
    public function getProductByManufactureWomen($id)
    {
        $productbymanufacture = DB::table('products')->where('manu_id', '=', $id)->where('gender', '=', 2)->get();
         return view('frontend.productbymanufacture', compact('productbymanufacture'));
    }
    //hàm lấy all sản phẩm theo hãng nam
    public function getProductByManufactureMen($id)
    {
        $productbymanufacture = DB::table('products')->where('manu_id', '=', $id)->where('gender', '=', 1)->get();
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
    //get all products
    public function getProductByProtype()
    {
        $protype = Protype::all();
        return view('frontend.index', ['protypes' => $protype]);
    }
    //get all products , manufacture , proytpe of products
    public function getProductMenSale()
    {
        $productbymanufacture = Product::where('sale', '>=',1)->where('gender', '=', 1)->get();
        return view('frontend.productsale', compact('productbymanufacture'));
    }
    //get all products , manufacture , proytpe of products
    public function getProductWomenSale()
    {
        $productbymanufacture = Product::where('sale', '>=',1)->where('gender', '=', 2)->get();
        return view('frontend.productsale', compact('productbymanufacture'));
    }

    //get all products , manufacture , proytpe of products
    public function getProductSale()
    {
        $product_Feature = Product::where('sale', '>=',1)->get();
        return view('frontend.index', compact('product_Feature'));
    }
    //lấy sản phẩm kết với bảng product_image( chưa xong)
    public function getAllProductHome()
    {
        //hiển thị sản phẩm
        $product = Product::all();
        $Product_Image = Product_Image::all();
        //hiển thị loại sản phẩm
        $protype = Protype::all();
        return view('frontend.index', ['products' => $product], ['Product_Image' => $Product_Image], ['Protypes' => $protype]);
    }

    //hàm lấy ảnh sản phẩm chi tiết
    public function getAllProduct_Image()
    {
        $Product_Image = Product_Image::all();
        return view('frontend.index', ['Product_Image' => $Product_Image]);
    }

    //ham tim kiem san pham theo tu khoa
    public function Seach_Product(Request $request){
        $keyWord = $request->keyword_product;
        $seachProduct = DB::table('products')->where('name', 'like', '%'.$keyWord.'%')->get();
        //dd($seachProduct);
        return view('frontend.seachproduct', compact('seachProduct'));

    }
}
?>
