@extends('layout.index')
@section('title')   
    <title>Chính sách đổi hàng</title>
@endsection

@section('content')
<div class="grid__full_with bg-p4">
            <div class="grid">
                <div class="row">

                    <div class="profile-menu">
                        <div class="row ">
                            <div class="imgp4">
                                @if($user->image != null) 
                                  <img src="upload/user/{{$user->image}}" alt="" class="imgp4-img">

                                @else
                                  <img src="public/assets/img/user-icon-placeholder.png" alt="" class="imgp4-img">
                                @endif
                                <h4 class="imgp4-username">{{$user->name}}</h4>
                                <a href="cus/{{$user->code}}" class="">
                                    <div class="taikhoan-list">
                                        <h4 class="taikhoan-icon"><i class="far fa-user"></i></h4>
                                        <h4 class="taikhoan">Thông Tin Tài Khoản</h4>

                                    </div>
                                </a>
                                <a href="resetcus/{{$user->code}}" class="">
                                <div class="taikhoan-list1">
                                    <h4 class="taikhoan-icon"><i class="fas fa-cogs"></i></i></h4>
                                    <h4 class="taikhoan">Đổi Mật Khẩu</h4>

                                </div>
                                </a>
                                <a href="don-hang/{{Auth::user()->code}}" class="">
                                <div class="taikhoan-list1">
                                    <h4 class="taikhoan-icon"><i class="fas fa-clipboard-list"></i></i></i></h4>
                                    <h4 class="taikhoan">Đơn Mua</h4>

                                </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="profile-thongtin no-bill-padding">
                        <div class="row bill-type">
                           
                            <a href="don-hang/{{Auth::user()->code}}"  class="col-2-type">Tất Cả</a>
                            <a href="cho-xac-nhan/{{Auth::user()->code}}" class="col-2-type">Chờ Xác Nhận</a>
                            <a href="cho-lay-hang/{{Auth::user()->code}}" class="col-2-type">Chờ Lấy Hàng</a>
                            <a href="da-giao/{{Auth::user()->code}}" class="col-2-type-active">Đã Giao</a>
                            <a href="da-huy/{{Auth::user()->code}}" class="col-2-type">Đã Hủy</a>
                            

                        </div>
                        <!-- -------------NO BILL----------------- -->
                        @if(count($orders) == 0)

                        <div class="no-bill">
                            <img src="public/assets/img/5fafbb923393b712b96488590b8f781f.png" alt="" class="no-bill-img">
                            <h4 class="no-bill-title">Chưa có đơn hàng</h4>
                        </div>
                        @else
                        <!-- ------------HAVE BILL---------------- -->
                            @foreach($orders as $od)
                                <div class="bill-list">
                                    <div class="title-bill">
                                        <h4 class="bill-code">Mã đơn hàng: {{$od->code}} |  {{$od->payment}} | Ngày: {{ $od->created_at->isoFormat('L')}}</h4>
                                        <h4 class="bill-status">Trạng thái: @if($od->status == 0) Chờ xác nhận
                                                                            @elseif ($od->status == 1) Chờ xác lấy hàng
                                                                            @elseif ($od->status == 2) Đã giao
                                                                            @else Đã hủy
                                                                            @endif


                                        </h4>
                                    </div>
                                    @foreach($order_details as $od_dt)
                                        @if($od->id == $od_dt->order_id )
                                          
                                                
                                                <div class="row dt-bill-item">
                                                    <div class="col-1-billdt">
                                                    <img src="upload/product/{{$od_dt->image}}" alt=""

                                                            class="col-1-billdt-img">
                                                    </div>
                                                    <div class="col-2-billdt">
                                                        <h4 class="col-2-billdt-name">{{$od_dt->product->name}} – @if($od_dt->product->gender==0) Nam
                                                                                                                @elseif($od_dt->product->gender==1) Nữ
                                                                                                                @elseif($od_dt->product->gender==2) Đôi
                                                                                                                @else Trẻ em
                                                                                                                @endif
                                                        </h4>
                                                        <h4 class="col-2-billdt-name">x {{$od_dt->qty}}</h4>
                                                    </div>
                                                    <div class="col-3-billdt">
                                                        <h4 class="col-3-billdt-price-old"> {{ number_format($od_dt->price_old)}} VNĐ </h4>
                                                        <h4 class="col-3-billdt-price-new">{{ number_format($od_dt->price_sale)}} VNĐ</h4>
                                                    </div>
                                                </div>
                                        @endif
                                    @endforeach
                                    <div class="total-pay">
                                        <h4 class="total-pay-title">Thanh toán:</h4>
                                        <h4 class="total-pay-vl">{{number_format($od->order_total_money)}} VNĐ</h4>
                                    </div>

                                </div>
                            @endforeach
                        @endif



                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection