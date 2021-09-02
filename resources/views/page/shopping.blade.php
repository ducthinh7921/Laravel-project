@extends('layout.index')
@section('title')   
    <title>Giỏ hàng</title>
@endsection

@section('content')
<div class="grid">
            <!-- -----------NO SHOPPING------------------- -->
            <div class="Contentlabel2">
                <span class="Contentlabel-item Contentlabel-item-separate">GIỎ HÀNG</span>
                <span class="Contentlabel-item-separate2"></span>
            </div>
                 @if(count($errors) >0)  
                           <div class="alert alert-danger"> 
                               @foreach($errors->all() as $err )
                                   {{$err}}<br>
                               @endforeach
                           </div>
                       @endif

                       @if(session('thongbao'))
                           <div class="alert alert-success">
                               {{session('thongbao')}}
                           </div>
                       @endif
                       
            @if(count($listItem)==0) 

            
            <div class="no-shopping">
                
                <div class="row sp-bag">
                    <img src="public/assets/img/shopping-bag.png" alt="" class="sp-bag-img">
                </div>
                <div class="sp-bag-text">
                    <h4 class="sp-bag-text-header">BẠN CHƯA ĐẶT MUA BẤT KỲ SẢN PHẨM NÀO!</h4>
                    <h4 class="sp-bag-text-body">Hãy chọn cho mình 1 chiếc đồng hồ ưng ý nhất nhé 🙂</h4>

                </div>
                <a href="trangchu" class="">
                <div class="sp-bag-text-btn">
                    <h4 class="sp-bag-text-btn-link">QUAY TRỞ LẠI SHOP</h4>
                </div>
                </a>
            </div>
             
            <!-- --------------SHOPING---------------------- -->
            @else 
            <div class="grid">
                <div class="row ">
                    <div class="col-6 ">
               
                        <div class="shopping-header">
                            <h4 class="shopping-header-text">THÔNG TIN GIỎ HÀNG</h4>
                        </div>
                        <div class="row shopping-header-title">
                            <div class="col1">Hình ảnh</div>
                            <div class="col2">Sản phẩm</div>
                            <div class="col3">Giá</div>
                            <div class="col4">Số lượng</div>
                            <div class="col5">Thành tiền</div>
                            <div class="col6"></div>
                        </div>
                        <!-- -------SHOPPING CARD ITEM------ -->
                        @foreach($listItem as $key => $item)
                          
                            <div class="row shopping-header-item">
                                <div class="col1 ">
                                    <img src="upload/product/{{$item->options->image}}" class="shopping-item-img" alt="">
                                </div>
                                <div class="col2 shopping-item-pd-name">
                                   {{$item->name}}
                                </div>
                                <div class="col3 shopping-item-pd-price">
                                    <h4 shopping-item-pd-price-vl>{{ number_format( $item->price ) }}   </h4>
                                    <!-- <h4 shopping-item-pd-price-vl style="text-decoration: line-through">{{ number_format( $item->options->price_old ) }}   </h4> -->
                                    <div class="shopping-item-pd-price-sale">
                                        <h4 class="shopping-item-pd-price-sale-vl">- {{$item->options->sale}} %</h4>
                                    </div>
                                </div>
                                <div class="col4 shopping-item-pd-qty">
                                    <!-- Form update qty product -->
                                    <form action="shopping/update/{{$key}}" method = "post">
                                       <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="text" class="form-control" name="qty" value="{{$item->qty}}">
                                        <button type="submit" class="btn btn-primary btn-capnhat">Cập nhật</button>
                                    </form>
                                </div>
                                <div class="col5 shopping-item-pd-tatal">
                                    {{ number_format($item->price* $item->qty)  }}
                                </div>
                                <div class="col6 shopping-item-pd-tatal">
                                    <a href="shopping/delete/{{$key}}" class="">
                                        <i class="fas fa-times"></i>

                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <!-- <div class="total-pay">
                            <h4 class="total-pay-title">Thanh toán:</h4>
                            <h4 class="total-pay-vl">{{Cart::subtotal(0)}} VNĐ</h4>
                        </div> -->
                        <form action="shopping/coupon" method = "post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="cpay">
                                <h4 class="coupon-title">Coupon:</h4>
                                <input type="text" class=" form-cp" name="coupon" placeholder=" Hãy nhập mã giảm giá">
                                <button type="submit" class="btn btn-primary btn-xacnhan">Xác nhận</button>
        
                                <div class="total-pay">
                                    <h4 class="total-pay-title">Thanh toán:</h4>
                                    @if(isset($coupon))
                                        <?php
                                            $bill = str_replace(',', '',\Cart::subtotal(0));
                                            $discount = $coupon-> discount;
                                            $total = $bill - $bill*$discount/100;
                                        ?>
                                        <h4 class="total-pay-vl" >{{number_format($total)}} VNĐ</h4>
                                    @else
                                         <h4 class="total-pay-vl">{{Cart::subtotal(0)}} VNĐ</h4>

                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-6 col-btn">
                        
                        <div class="shopping-header">
                            <h4 class="shopping-header-text">THÔNG TIN LIÊN HỆ</h4>
                        </div>
                        <form action="thanhtoan" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        @if(isset($coupon))
                            <input type="hidden" name="coupon" value="{{$coupon->id}}" />
                        @endif
                        <div class="nhapform">
                            <div class="row row-col-8-chitiet-thongtin1">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Họ và tên</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên"  >
                                </div>
                            </div>
                            <div class="row row-col-8-chitiet-thongtin1">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Số điện thoại</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" >
                                </div>
                            </div>
                            <div class="row row-col-8-chitiet-thongtin1">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Địa Chỉ</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
                                </div>
                            </div>
                         
                            <div class="row row-col-8-chitiet-thongtin1">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Email</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <input type="email" class="form-control" name="email" placeholder="Nhập email"  >
                                                                                                                    
                                </div>
                            </div>
                            <div class="row row-col-8-chitiet-thongtin1">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Ghi chú</h4>
                                </div>
                                <div class="input-group-prepend">
                                    <textarea name="note" id="" cols="3" rows="2" style="min-height: 100px" placeholder="Nhập ghi chú" ></textarea>
                                </div>
                            </div>
                            <div class="row row-col-8-chitiet-thongtin2">
                                <div class="label-chitiet-thongtin">
                                    <h4 class="label-chitiet-thongtin-item">Hình thức thanh toán</h4>
                                </div>
                                <label class="radio-inline">
                                    <input name="payment" value="0" checked="" type="radio"> Ship COD
                                </label>
                                <label class="radio-inline">
                                    <input name="payment" value="1" type="radio"> Chuyển Khoản
                                </label>
                                <label class="radio-inline">
                                    <input name="payment" value="2" type="radio"> Ví Momo
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-dathang">

                            <h4 class="btn-danghang-link1">Đặt hàng</h4>
                            <h4 class="btn-danghang-link2">(Giao hàng miễn phí)</h4>


                        </button>

                        </form>
                    </div>

                </div>

            </div>
            @endif

        </div>
        


@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection