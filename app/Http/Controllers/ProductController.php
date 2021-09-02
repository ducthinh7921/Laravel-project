<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Event;
use App\User;
use App\product;
use App\brand;
use App\category;
use App\strap;


class ProductController extends Controller
{
    
    // [GET] product/index
    public function index(){
        $product = product::all();
    	return view('admin.product.list',['product'=>$product]);

    }

    //update qty product    
    public function qty(Request $req){
        $oldqty =product_quantity::find(1);
        DB::table('product_quantity')
        ->where('id', 1)
        ->update(['quantity' =>($oldqty->quantity + $req->qty)]);
        return redirect('/product/index')->with('thongbao','cap nhat thanh cong!');
    	

    }

    // [GET] product/add
    public function getAdd(){
        $brand=brand::all()->where('status',0);
        $category=category::all()->where('status',0);
        $strap=strap::all()->where('status',0);
        return view('admin.product.add',
        ['brand'=>$brand,'category'=>$category,'strap'=>$strap]);
    }

    // [POST] product/stored
    public function postAdd(Request $req){
        if($req->discount <0 || $req->discount >=100 ) return redirect()->back()->with('thongbao',' Không thể nhập giảm giá < 0 hoặc >=100');

        $this->validate($req,[
            'name'=>'required|min:5|unique:product,name',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'case_size'=>'required',
            'Wateproof'=>'required',
            'origin'=>'required',
            'image'=>'required'
         
          ],[
             'name.required'=>'Bạn chưa nhập tên sản phẩm',
             'name.min'=>'Tên sản phẩm phải có ít nhất 5 ký tự',
             'name.unique'=>'Tên sản phẩm đã tồn tại',
             'price.required'=>'Bạn chưa nhập giá',
             'price.numeric'=>'Phải nhập giá bằng ký tự số',
             'discount.required'=>'Bạn chưa nhập giảm giá',
             'discount.numeric'=>'Phải nhập giảm giá bằng ký tự số',
             'case_size.required'=>'Bạn chưa nhập case size',
             'Wateproof.required'=>'Bạn chưa nhập độ chống nước',
             'origin.required'=>'Bạn chưa nhập xuất xứ',
             'image.required'=>'Bạn chưa chọn hình ảnh'
   
            
          ]);

        //   check active brand, strap, cat
          $brandcheck = brand::find($req -> brand_id);
          if($brandcheck->status == 1) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
          $catcheck = category::find($req -> category_id);
          if($catcheck->status == 1) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
          $strapcheck = strap::find($req -> strap_id);
          if($strapcheck->status == 1) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');


          // Add product
          $product = new product;

          $product -> strap_id  = $req -> strap_id;
          $product -> category_id = $req -> category_id;
          $product -> brand_id = $req -> brand_id;
          $product -> name = $req -> name;
          $product -> slug = str_slug($req -> name);
          $product -> price = $req -> price;
          $product -> discount = $req -> discount;
          $product -> gender = $req -> gender;
          $product -> case_size = $req -> case_size;
          $product -> loai_kinh = $req -> loai_kinh;
          $product -> Wateproof = $req -> Wateproof;
          $product -> origin = $req -> origin;
          $product -> status = 1;
          $product -> pay = 0;
          $product -> guarantee = $req -> guarantee;

          //image1
          if($req->hasFile('image'))
          {
              $file = $req->file('image');
              $name =$file->getClientOriginalName();
              $image = str_random(10)."_".$name;
              $file->move("upload/product",$image);
              $product->product_image=$image;
  
          }
          else
          {
          $product->product_image = "";
          }
           //image2
        //   if($req->hasFile('image2'))
        //   {
        //       $file = $req->file('image2');
        //       $name =$file->getClientOriginalName();
        //       $image = str_random(10)."_".$name;
        //       $file->move("upload/product",$image);
        //       $product->product_image2=$image;
  
        //   }
        //   else
        //   {
        //   $product->product_image2 = "";
        //   }
           //image3
        //    if($req->hasFile('image3'))
        //    {
        //        $file = $req->file('image3');
        //        $name =$file->getClientOriginalName();
        //        $image = str_random(10)."_".$name;
        //        $file->move("upload/product",$image);
        //        $product->product_image3=$image;
   
        //    }
        //    else
        //    {
        //    $product->product_image3 = "";
        //    }
   
          $product -> save();
        
          return redirect('/product/add')->with('thongbao','Thêm thành công!');
    }

    
    //  [GET] product/edit/{slug}
    public function getEdit($slug, Request $request){
       $product = product::where('slug',$slug)->first();
       if($product) {
        $brand=brand::all()->where('status',0);
        $category=category::all()->where('status',0);
        $strap=strap::all()->where('status',0);
        return view('admin.product.edit',
        ['brand'=>$brand,'category'=>$category,'strap'=>$strap,'product'=>$product]);
            
       }
       else 
        return redirect()->back()->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');
    }

    // [POST] product/update/{slug}
    public function postEdit(Request $req,$slug){
        if($req->discount <0 || $req->discount >=100 ) return redirect()->back()->with('thongbao',' Không thể nhập giảm giá < 0 hoặc >=100');
        $this->validate($req,[
            'name'=>'required|min:5',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'case_size'=>'required',
            'Wateproof'=>'required',
            'origin'=>'required',
            'image'=>'required'
         
          ],[
             'name.required'=>'Bạn chưa nhập tên sản phẩm',
             'name.min'=>'Tên sản phẩm phải có ít nhất 5 ký tự',
             'price.required'=>'Bạn chưa nhập giá',
             'price.numeric'=>'Phải nhập giá bằng ký tự số',
             'discount.required'=>'Bạn chưa nhập giảm giá',
             'discount.numeric'=>'Phải nhập giảm giá bằng ký tự số',
             'case_size.required'=>'Bạn chưa nhập case size',
             'Wateproof.required'=>'Bạn chưa nhập độ chống nước',
             'origin.required'=>'Bạn chưa nhập xuất xứ',
             'image.required'=>'Bạn chưa chọn hình ảnh'


          ]);

          $product = product::where('slug',$slug)->first();
          if($product) {
                $product -> strap_id  = $req -> strap_id;
                $product -> category_id = $req -> category_id;
                $product -> brand_id = $req -> brand_id;
                $product -> name = $req -> name;
                $product -> slug = str_slug($req -> name);
                $product -> price = $req -> price;
                $product -> discount = $req -> discount;
                $product -> gender = $req -> gender;
                $product -> case_size = $req -> case_size;
                $product -> loai_kinh = $req -> loai_kinh;
                $product -> Wateproof = $req -> Wateproof;
                $product -> origin = $req -> origin;
                $product -> guarantee = $req -> guarantee;

                //image1
                if($req->hasFile('image'))
                {
                    $file = $req->file('image');
                    $name =$file->getClientOriginalName();
                    $image = str_random(10)."_".$name;
                    $file->move("upload/product",$image);
                    $product->product_image=$image;
        
                }
               
                //image2
                // if($req->hasFile('image2'))
                // {
                //     $file = $req->file('image2');
                //     $name =$file->getClientOriginalName();
                //     $image = str_random(10)."_".$name;
                //     $file->move("upload/product",$image);
                //     $product->product_image2=$image;
        
                // }
              
                //image3
                // if($req->hasFile('image3'))
                // {
                //     $file = $req->file('image3');
                //     $name =$file->getClientOriginalName();
                //     $image = str_random(10)."_".$name;
                //     $file->move("upload/product",$image);
                //     $product->product_image3=$image;
            
                // }
                   
            
                $product -> save();
                return redirect('/product/index')->with('thongbao','Sửa sản phẩm thành công!');


            }
            else 
                 return redirect('/product/index')->with('thongbao','Lỗi Hệ Thống Xin Vui Lòng Thử Lại!');
    }

    // [GET] product/active/{id}
    public function active ($id) {
        $product = product::find($id);
        DB::table('product')
        ->where('id', $id)
        ->update(['status' =>1]);
        return redirect()->back()->with('thongbao','Active sản phẩm thành công!');
    }

    // [GET] product/unactive/{id}
    public function unactive ($id) {
        $product = product::find($id);
        DB::table('product')
        ->where('id', $id)
        ->update(['status' =>0]);
        return redirect()->back()->with('thongbao','UnActive sản phẩm thành công!');
    }
}
