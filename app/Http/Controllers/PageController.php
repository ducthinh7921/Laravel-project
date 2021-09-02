<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use Auth;


use App\brand;
use App\User;

use App\product;
use App\category;
use App\strap;
use App\orders;
use App\order_details;
use App\shipping;
use Carbon\Carbon;
use App\comments;
use App\banner;
use App\news;
use App\coupon;
use App\coupon_used;







class PageController extends Controller
{

    function __construct(){

        $brand=brand::all()->where('status',0);
        view()->share('brand',$brand);

        $newsf = news::all()->sortByDesc('created_at')->take(3);
        view()->share('newsf',$newsf);
    } 

    // [GET] trangchu
    public function index () {
        $productM = product::all()->where('gender',0)->where('status',1)->sortByDesc('pay')->take(8);
        $productF = product::all()->where('gender',1)->where('status',1)->sortByDesc('pay')->take(8);
        $product = product::all()->where('status',1)->sortByDesc('created_at')->take(8);
        $banner = banner::all()->where('status',0)->sortByDesc('created_at')->take(1);
        return view('page.trangchu',[
            'productM'=>$productM,
            'productF'=>$productF,
            'product'=>$product,
            'banner'=>$banner
        ]);
    }

    // [GET] sp/{slug name}
    public function spdetails ($slug) {
        $product = product::where('slug', $slug)->first();
        if(!$product) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại');
        $productlist = product::where('brand_id', $product->brand_id)->where('gender', $product->gender)->take(3)->get();
        $comments = comments::all()->where('product_id',$product->id);
        return view('page.productdetail',['product'=>$product,'productlist'=>$productlist,'comments'=>$comments]);
    }

    // [POST] comment/{id}
    public function postcomment(Request $request,$id) {
        $this->validate($request,[
            'comment'=>'required',
          ],[
             'comment.required'=>'Bạn chưa nhập bình luận',
          ]);
        $product = product::find($id);
        if(!$product) return redirect()->back();
        $comments= new comments;
        $comments->user_id =  Auth::user()->id;
        $comments->product_id = $product->id;
        $comments->content = $request->comment;
        $comments->save();
        return redirect()->back();

    }

    // [GET] ask
    public function getask () {
        return view('page.hoidap');
    }

    
    // [GET] doihang
    public function doihang () {
        return view('page.doihang');
    }


    // [GET] bao hanh
    public function baohanh () {
        return view('page.baohanh');
    }
    
    // [GET]  news
    public function getnews () {
        $news = news::all()->sortByDesc('created_at');
        return view('page.news',['news'=>$news]);
    }

    // [GET]  news-details/{id}
    public function newsdetails ($id) {
        $news_item = news::find($id);
        if(!$news_item) return redirect('/news');
        return view('page.newsdetails',['news_item'=>$news_item]);
    }

    // [GET] cat/{slug}
    public function catDetail (Request $request, $slug) {
        $brandcheck = brand::where('slug',$slug)->first();
        if($brandcheck->status == 1) return redirect()->back();
        $brand = brand::where('slug',$slug)->where('status',0)->first();
        $product = product::all()->where('brand_id',$brand->id);
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('brand_id',$brand->id)->where('price', '>=', 50000000);
                    break;
            }
        }
    
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] dong-ho-nam
    public function getDHNam (Request $request) {
        $product = product::all()->where('gender',0) ;
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('gender',0)->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('gender',0)->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('gender',0)->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('gender',0)->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('gender',0)->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('gender',0)->where('price', '>=', 50000000);
                    break;
            }
        }

        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] dong-ho-nu
    public function getDHNu (Request $request) {
        $product = product::all()->where('gender',1) ;
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('gender',1)->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('gender',1)->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('gender',1)->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('gender',1)->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('gender',1)->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('gender',1)->where('price', '>=', 50000000);
                    break;
            }
        }
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] dong-ho-doi
    public function getDHDoi (Request $request) {
        $product = product::all()->where('gender',2) ;
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('gender',2)->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('gender',2)->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('gender',2)->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('gender',2)->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('gender',2)->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('gender',2 )->where('price', '>=', 50000000);
                    break;
            }
        }
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] dong-ho-tre-em
    public function getDHKid (Request $request) {
        $product = product::all()->where('gender',3) ;
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('gender',3)->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('gender',3)->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('gender',3)->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('gender',3)->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('gender',3)->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('gender',3)->where('price', '>=', 50000000);
                    break;
            }
        }
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] dong-ho-moi
    public function getDHMoi (Request $request) {
        $product = product::all()->sortByDesc('created_at')->take(16);
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->sortByDesc('created_at')->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->sortByDesc('created_at')->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->sortByDesc('created_at')->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->sortByDesc('created_at')->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->sortByDesc('created_at')->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->sortByDesc('created_at')->where('price', '>=', 50000000);
                    break;
            }
        }
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }

    // [GET] top-nam
    public function getTopnam (Request $request) {
        $product = product::all()->where('gender',0)->sortByDesc('pay')->take(20);
        $dhnam = product::all()->where('gender',0);
        $dhnu = product::all()->where('gender',1);
        $dhdoi = product::all()->where('gender',2);
        $dhkid = product::all()->where('gender',3);

        if($request->price) {
            $price = $request->price;
            switch ($price) {
                case 5: 
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '<', 2000000) ;
                    break;
                case 6:
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '>=', 2000000) ->where('price', '<', 5000000);
                    break;
                case 7:
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '>=', 5000000) ->where('price', '<', 10000000);
                    break;
                case 8:
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '>=', 10000000) ->where('price', '<', 20000000);
                    break;
                case 9:
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '>=', 20000000) ->where('price', '<', 50000000);
                    break;
                case 10:
                    $product = product::all()->where('gender',0)->sortByDesc('pay')->where('price', '>=', 50000000);
                    break;
            }
        }
        return view('page.category',['product'=>$product,'dhnam'=>$dhnam,'dhnu'=>$dhnu,'dhdoi'=>$dhdoi,'dhkid'=>$dhkid]);
    }
    
    // [GET] search
    public function getTK(Request $request){
        $product=product::where('name','like','%'.$request->key.'%')->get();
        return view('page.search',['product'=>$product]);
        
    }

    // [GET] shopping
    public function shopping() {
        $listItem =  \Cart::content();
        return view('page.shopping',['listItem'=>$listItem]);
    }
    
    // [GET] shopping/add/{id}
    public function addItem($id) {
        // $listItem =  \Cart::content();
        // foreach($listItem as $key => $item){
        //     $sp1 = \Cart::search($key);
        //     dd($sp1);    
        // }
                          


        $product = product::find($id);
        if(!$product) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        if($product->status==0 || $product->brand->status==1 ) return redirect()->back()->with('thongbao','Sản phẩm này tạm ngừng kinh doanh!');
        if(!$product) return redirect('/trangchu');
         \Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'price' => $product->price-($product->price*($product->discount/100)),  
            'weight' => '1',
            'options' => [
                'sale' => $product->discount,
                'price_old'=>  $product->price,
                'image' => $product->product_image,
                'slug' => $product->slug,


            ]]);
            // dd($sp);
        return redirect()->back()->with('thongbao','Thêm sản phẩm vào giỏ hàng thành công!');
    }

    // [GET] shopping/delete/{id}
    public function deteteItem($rowId) {

        \Cart::remove($rowId);
        return redirect()->back()->with('thongbao','Xóa sản phẩm thành công!');
    }

    // [POST] shopping/update/{id}
    public function updateItem(Request $request,$rowId) {
        if($request->qty < 0 || $request->qty >=6 ) return redirect()->back()->with('thongbao',' Không thể cập nhật số lượng < 0 hoặc >=6');
        $this->validate($request,[
            'qty'=>'required|numeric ',
          ],[
             'qty.required'=>'Bạn chưa nhập nhập số lượng',
             'qty.numeric'=>'Số lượng phải là ký tự số',
          ]);
        \Cart::update($rowId, $request->qty); 
        return redirect()->back()->with('thongbao','Cập nhật số lượng sản phẩm thành công!');
    }

    // [POST] shopping/coupon
    public function coupon(Request $request) {
        // kiểm tra tồn tại
        $coupon = coupon::where('code',$request->coupon)->where('status',0)->first();
        if(!$coupon)  return redirect()->back()->with('thongbao','Mã khuyến mãi sai hoặc không tồn tại!');

        // Lọc người sử dụng
        $coupon_used = coupon_used::all()->where('coupon_id',$coupon->id);
        foreach($coupon_used as $c) {
            if($c->user_id == Auth::user()->id)  return redirect()->back()->with('thongbao','Khách hàng đã sử dụng mã này!');
        }

        $listItem =  \Cart::content();
        return view('page.shopping',['listItem'=>$listItem,'coupon'=>$coupon])->with('thongbao','Sử dụng mã khuyến mãi thành công!');
    }

      // [GET] shopping/coupon
      public function reload(Request $request) {
        $listItem =  \Cart::content();
        return view('page.shopping',['listItem'=>$listItem]);

    }


    



    // [POST] thanhtoan
    public function thanhtoan(Request $request) {
        $sdt = strlen($request->phone);
        if($sdt!=10) redirect()->back()->with('thongbao','Bạn phải nhập số điện thoại đúng 10 ký tự!');
        if(isset($request->coupon)){
            $coupon = coupon::find($request->coupon);
        }
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required|numeric',
            'address'=>'required',
            'email'=>'required|email',
          ],[
             'name.required'=>'Bạn chưa nhập tên tên người nhận hàng',
             'phone.required'=>'Bạn chưa nhập số điện thoại người nhận hàng',
             'phone.numeric'=>'Số điện thoại phải là kiểu ký tự số',
             'address.required'=>'Bạn chưa nhập địa chỉ nhận hàng',
             'email.required'=>'Bạn chưa nhập Email',
             'email.email'=>'Bạn chưa nhập đúng định dạng Email',

          ]);
          $shipping =new shipping;
          $shipping->user_id = Auth::user()->id;
          $shipping->name=$request->name;
          $shipping->phone=$request->phone;
          $shipping->address=$request->address;
          $shipping->email=$request->email;
          $shipping->save();

          $orders= new orders;
          $orders->user_id = Auth::user()->id;
          $orders->ship_id = $shipping->id;
          if($request->payment == 0){
              $orders->payment = "Ship COD";
          }
          if($request->payment == 1) {
            $orders->payment = "Chuyển Khoản";
          }
          if($request->payment == 2) {
            $orders->payment = "Ví Điện Tử Momo";
          }
          if(isset($request->coupon)){
            $orders->coupon_id = $coupon->id;
            $bill = str_replace(',', '',\Cart::subtotal(0));
            $orders->order_total_money =  $bill- $bill*$coupon->discount/100;

          }
          else {
            $orders->order_total_money =  str_replace(',', '',\Cart::subtotal(0));
          }
          if($request->note) {
            $orders->note = $request->note;
          }
          $orders->status = 0;
          $orders->code = Str::random(10);
        //   if(isset($cou)) {
        //     $orders->note = $request->note;
        //   }

          $orders->save();

        $listItem =  \Cart::content();
        foreach($listItem as $key => $item) {
            $order_details= new order_details;
            $order_details->order_id =  $orders->id;
            $order_details->product_id =  $item->id;
            $order_details->price_sale =  $item->price;
            $order_details->price_old =  $item->options->price_old;
            $order_details->qty =  $item->qty;
            $order_details->image =  $item->options->image;
            $order_details->save();


            $product =product::find($item->id);
            DB::table('product')
            ->where('id', $item->id)
            ->update(['pay' =>($product->pay + $item->qty)]);
            
          $idorder = $orders->id;
          }

          if(isset($request->coupon)){
            $coupon_used = new coupon_used;
            $coupon_used->user_id = Auth::user()->id;
            $coupon_used->coupon_id = $coupon->id;
            $coupon_used->order_id = $orders->id;
            $coupon_used->save();
        }
          

         \Cart::destroy();
        if($request->payment == 1) {
            $orderck = orders::find($idorder);
            return view('page.chuyenkhoan',['orderck'=>$orderck]);
        }
        if($request->payment == 2) {
            $orderck = orders::find($idorder);
            return view('page.vimomo',['orderck'=>$orderck]);
        }
        
        return redirect()->back()->with('thongbao','Đặt hàng thành công chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất!');
    }
    
    // [GET]  cus/{code}
    public function profile($code){
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        return view('page.account',['user'=>$user]);
      }

    // [POST] editProfile/{id}
    public function editProfile(Request $request,$id){
        $sdt = strlen($request->phone);
        if($sdt!=10) redirect()->back()->with('thongbao','Bạn phải nhập số điện thoại đúng 10 ký tự!');
        $user = User::find($id);
        if(!$user) return redirect('/trangchu');
        $this->validate($request,[
            'name'=>'required|min:3',
            'phone'=>'required|numeric',
            'image'=>'required'
          ],[
             'name.required'=>'Bạn chưa nhập tên người dùng',
             'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
             'phone.required'=>'Bạn chưa nhập số điện thoại người dùng',
             'phone.numeric'=>'Số điện thoại phải là kiểu ký tự số',
             'image.required'=>'Bạn chưa chọn hình ảnh'

          ]);
        $user->name=$request->name;
        $user->phone=$request->phone;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $name =$file->getClientOriginalName();
            $image = str_random(10)."_".$name;
            $file->move("upload/user",$image);
            $user->image=$image;

        }
      
        $user -> save();
    

        return redirect()->back()->with('thongbao','Cập nhật tài khoản thành công!');
      }

    // [GET]  resetcus/{code}
    public function resetcus ($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        return view('page.doimatkhau',['user'=>$user]);
    }

    // [GET] stored/{code}
    public function storedcus (Request $request,$code) {
        $user = User::where('code', $code)->first();
        $this->validate($request,[
            'password'=>'required|min:6|max:32',
            'passwordAgain'=>'required|same:password' 

          ],[ 
             'passwod.required'=>'Bạn chưa nhập mật khẩu',
             'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
             'password.max'=>'Mật khẩu phải có ít nhất 6 ký tự và nhiều nhất 32 ký tự',
             'passwordAgain.required'=>'Bạn chưa nhật lại mật khẩu',
             'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
          ]);
        if(isset($user)) {
                $user->password=bcrypt($request->password);
                $user->save();
                return redirect()->back()->with('thongbao','Đổi mật khẩu thành công!');
          
        }
        else 
           return  redirect('/trangchu');

    }

    // [GET] don-hang/{code}
    public function getbills($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        $orders=orders::all()->where('user_id',$user->id);
        $order_details=order_details::all();
        return view('page.allbill',['user'=>$user,'orders'=>$orders,'order_details'=>$order_details]);
    }

    // [GET] cho-xac-nhan/{code}
    public function getdhcho($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        $orders=orders::all()->where('user_id',$user->id)->where('status',0);
        $order_details=order_details::all();
        return view('page.billcho',['user'=>$user,'orders'=>$orders,'order_details'=>$order_details]);
    }

    // [GET] cho-lay-hang/{code}
    public function choLayHang($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        $orders=orders::all()->where('user_id',$user->id)->where('status',1);
        $order_details=order_details::all();
        return view('page.billcholayhang',['user'=>$user,'orders'=>$orders,'order_details'=>$order_details]);
    }

    // [GET] da-giao/{code}
    public function daGiao($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        $orders=orders::all()->where('user_id',$user->id)->where('status',2);
        $order_details=order_details::all();
        return view('page.billdagiao',['user'=>$user,'orders'=>$orders,'order_details'=>$order_details]);
    }

    // [GET] da-huy/{code}
    public function daHuy($code) {
        $user = User::where('code', $code)->first();
        if(!$user) return redirect('/trangchu');
        $orders=orders::all()->where('user_id',$user->id)->where('status',3);
        $order_details=order_details::all();
        return view('page.billdahuy',['user'=>$user,'orders'=>$orders,'order_details'=>$order_details]);
    }

    // [GET] huy-don/{code}
    public function huyDonHang($code) {
        $orders = orders::where('code', $code)->first();
        if(!$orders) return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');
        if($orders->status==0) {
            DB::table('orders')
            ->where('id', $orders->id)
            ->update(['status' =>3 ]);
            return redirect()->back()->with('thongbao','Hủy đơn hàng thành công!');
        }
        else 
            return redirect()->back()->with('thongbao','Lỗi hệ thống xin vui lòng thử lại!');


    }


}
