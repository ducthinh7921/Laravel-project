

<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('CheckLogin');



//--------------------------------------------------------Category

Route::get('category/list','CategoryController@getList')->middleware('CheckLogin');

Route::get('category/add','CategoryController@getAdd')->middleware('CheckLogin');
Route::post('category/stored','CategoryController@postAdd')->middleware('CheckLogin');

Route::get('category/edit/{id}','CategoryController@getEdit')->middleware('CheckLogin');
Route::post('category/update/{id}','CategoryController@postEdit')->middleware('CheckLogin');

Route::get('category/active/{id}','CategoryController@active')->middleware('CheckLogin');
Route::get('category/unactive/{id}','CategoryController@unactive')->middleware('CheckLogin');




//----------------------------------------------------------Strap


Route::get('strap/list','StrapController@getList')->middleware('CheckLogin');

Route::get('strap/add','StrapController@getAdd')->middleware('CheckLogin');
Route::post('strap/stored','StrapController@postAdd')->middleware('CheckLogin');

Route::get('strap/edit/{id}','StrapController@getEdit')->middleware('CheckLogin');
Route::post('strap/update/{id}','StrapController@postEdit')->middleware('CheckLogin');

Route::get('strap/active/{id}','StrapController@active')->middleware('CheckLogin');
Route::get('strap/unactive/{id}','StrapController@unactive')->middleware('CheckLogin');




//------------------------------------------------------------Brand


Route::get('brand/list','BrandController@getList')->middleware('CheckLogin');

Route::get('brand/add','BrandController@getAdd')->middleware('CheckLogin');
Route::post('brand/stored','BrandController@postAdd')->middleware('CheckLogin');

Route::get('brand/edit/{id}','BrandController@getEdit')->middleware('CheckLogin');
Route::post('brand/update/{id}','BrandController@postEdit')->middleware('CheckLogin');

Route::get('brand/active/{id}','BrandController@active')->middleware('CheckLogin');
Route::get('brand/unactive/{id}','BrandController@unactive')->middleware('CheckLogin');





//------------------------------------------------------------Product

Route::get('product/index','ProductController@index')->middleware('CheckLogin');
Route::post('product/qty','ProductController@qty')->middleware('CheckLogin');


Route::get('product/add','ProductController@getAdd')->middleware('CheckLogin');
Route::post('product/stored','ProductController@postAdd')->middleware('CheckLogin');

Route::get('product/edit/{slug}','ProductController@getEdit')->middleware('CheckLogin');
Route::post('product/update/{slug}','ProductController@postEdit')->middleware('CheckLogin');

Route::get('product/active/{id}','ProductController@active')->middleware('CheckLogin');
Route::get('product/unactive/{id}','ProductController@unactive')->middleware('CheckLogin');



// -----------------------------------------------------------Coupon



Route::get('coupon/index','CouponController@index')->middleware('CheckLogin');


Route::get('coupon/add','CouponController@add')->middleware('CheckLogin');
Route::post('coupon/add','CouponController@postAdd')->middleware('CheckLogin');


Route::get('coupon/active/{id}','CouponController@active')->middleware('CheckLogin');
Route::get('coupon/unactive/{id}','CouponController@unactive')->middleware('CheckLogin');

Route::get('coupon/used','CouponController@used')->middleware('CheckLogin');






//-------------------------------------------------------------COMMENTS

Route::get('comment/index','CommentController@index')->middleware('CheckLogin');

Route::get('comment/delete/{id}','CommentController@getDelete')->middleware('CheckLogin');







//----------------------------------------------------------------USER


Route::get('user/user','UserController@getUser')->middleware('CheckLogin');
Route::get('user/admin','UserController@getAdmin')->middleware('CheckLogin');
Route::get('user/delete/{id}','UserController@delete')->middleware('CheckLogin');



Route::get('login','UserController@getLogin');
Route::post('login','UserController@postLogin');

Route::get('logout','UserController@getLogout');


Route::get('register','UserController@getRegister');
Route::post('register','UserController@postRegister');
Route::get('verify/{token}','UserController@verifyEmail');

Route::get('admin/add','UserController@getAdd');
Route::post('admin/add','UserController@postAdd');


Route::get('forgot','UserController@getForm');
Route::post('forgot','UserController@postForm');
Route::get('forgotpassword/{code}','UserController@resetPassword');



Route::get('edit/{code}','UserController@edit')->middleware('CheckLogin');
Route::post('update/{code}','UserController@stored')->middleware('CheckLogin');
Route::get('resetad/{code}','UserController@getresetad')->middleware('CheckLogin');
Route::post('storedad/{code}','UserController@storedad')->middleware('CheckLogin');







//----------------------------------------------------------------Banner

Route::get('banner','BannerController@index')->middleware('CheckLogin');
Route::get('banner/add','BannerController@add')->middleware('CheckLogin');
Route::post('banner/add','BannerController@addstored')->middleware('CheckLogin');

Route::get('banner/edit/{id}','BannerController@edit')->middleware('CheckLogin');
Route::post('banner/edit/{id}','BannerController@editstored')->middleware('CheckLogin');
Route::get('banner/delete/{id}','BannerController@delete')->middleware('CheckLogin');


Route::get('banner/active/{id}','BannerController@active')->middleware('CheckLogin');
Route::get('banner/unactive/{id}','BannerController@unactive')->middleware('CheckLogin');



//----------------------------------------------------------------NEWS

Route::get('news/index','NewsController@index')->middleware('CheckLogin');
Route::get('news/add','NewsController@add')->middleware('CheckLogin');
Route::post('news/add','NewsController@addstored')->middleware('CheckLogin');

Route::get('news/edit/{id}','NewsController@edit')->middleware('CheckLogin');
Route::post('news/edit/{id}','NewsController@editstored')->middleware('CheckLogin');
Route::get('news/delete/{id}','NewsController@delete')->middleware('CheckLogin');





//-------------------------------------------------------------  ORDERS
Route::get('orders/index','OrderController@index')->middleware('CheckLogin');

Route::get('orders/chuyen-trang-thai/{id}','OrderController@edit')->middleware('CheckLogin');
Route::get('orders/huy-don-hang/{id}','OrderController@huydon')->middleware('CheckLogin');

Route::get('orders/shipping/{id}','OrderController@indexship')->middleware('CheckLogin');
Route::get('orders/order_details/{id}','OrderController@indexdt')->middleware('CheckLogin');
Route::get('orders/delete/{id}','OrderController@delete')->middleware('CheckLogin');

Route::get('orders/thongke','OrderController@thongke')->middleware('CheckLogin');
Route::post('orders/thongke','OrderController@postthongke')->middleware('CheckLogin');








//----------------------------------------------------PAGE
// trang chu
Route::get('trangchu','PageController@index');

//chi tiet san pham

Route::get('sp/{slug}','PageController@spdetails');

Route::post('comment/{id}','PageController@postcomment')->middleware('CheckUser');


//hoi đáp
Route::get('ask','PageController@getask');

//đổi hàng

Route::get('doihang','PageController@doihang');

//bảo hành

Route::get('baohanh','PageController@baohanh');


// tin tức

Route::get('news','PageController@getnews');
Route::get('news-details/{id}','PageController@newsdetails');



// cate product

Route::get('cat/{slug}','PageController@catDetail');

// search product

Route::post('search','PageController@getTK');  

// dong ho nam
Route::get('dong-ho-nam','PageController@getDHNam');  

// dong ho nu
Route::get('dong-ho-nu','PageController@getDHNu');  

// dong ho doi
Route::get('dong-ho-doi','PageController@getDHDoi');  

// dong ho tre em
Route::get('dong-ho-tre-em','PageController@getDHKid');  

// dong ho moi
Route::get('dong-ho-moi','PageController@getDHMoi');  

//  top dong ho nam
Route::get('top-nam','PageController@getTopnam');  

//  shoping 
Route::get('shopping','PageController@shopping');  

Route::get('shopping/add/{id}','PageController@addItem');  

Route::get('shopping/delete/{id}','PageController@deteteItem');  

Route::post('shopping/update/{id}','PageController@updateItem');  

Route::post('thanhtoan','PageController@thanhtoan')->middleware('CheckUser');

Route::get('shopping/coupon','PageController@reload')->middleware('CheckUser');

Route::post('shopping/coupon','PageController@coupon')->middleware('CheckUser');


// Account setting 
Route::get('cus/{code}','PageController@profile')->middleware('CheckUser');  
Route::post('editProfile/{id}','PageController@editProfile')->middleware('CheckUser');  


Route::get('resetcus/{code}','PageController@resetcus')->middleware('CheckUser');  
Route::post('stored/{code}','PageController@storedcus')->middleware('CheckUser');  

Route::get('don-hang/{code}','PageController@getbills')->middleware('CheckUser');  
Route::get('cho-xac-nhan/{code}','PageController@getdhcho')->middleware('CheckUser');  
Route::get('cho-lay-hang/{code}','PageController@choLayHang')->middleware('CheckUser'); 
Route::get('da-giao/{code}','PageController@daGiao')->middleware('CheckUser');  
Route::get('da-huy/{code}','PageController@daHuy')->middleware('CheckUser');  

Route::get('huy-don/{code}','PageController@huyDonHang')->middleware('CheckUser');  














