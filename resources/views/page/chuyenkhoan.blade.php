@extends('layout.index')
@section('title')   
    <title>Chính sách đổi hàng</title>
@endsection

@section('content')
<div class="grid">
            <div class="Contentlabel2">
                <span class="Contentlabel-item Contentlabel-item-separate">CHUYỂN KHOẢN</span>
                <span class="Contentlabel-item-separate2"></span>
            </div>
            <div class="row">
                <div class="col-8">
                    <h4 class="titletop">Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</h4>
                    <div class="row payment-content">
                        <div class="col-card1 ">
                            <h4 class="cardtitle">MÃ ĐƠN HÀNG</h4>
                            <h4 class="cardbody">{{$orderck->code}}</h4>
                        </div>
                        <div class="col-card2">
                            <h4 class="cardtitle">NGÀY</h4>
                            <h4 class="cardbody">{{ $orderck->created_at->isoFormat('L')}}</h4>
                        </div>
                        <div class="col-card3">
                            <h4 class="cardtitle">TỔNG CỘNG</h4>
                            <h4 class="cardbody">{{number_format($orderck->order_total_money)}}đ</h4>
                        </div>
                        <div class="col-card4">
                            <h4 class="cardtitle">PHƯƠNG THỨC THANH TOÁN</h4>
                            <h4 class="cardbody">Chuyển Khoản Ngân Hàng</h4>
                        </div>
                    </div>
                    <div class="step">
                        <h4 class="titletop2"><strong>Bước 1:</strong> Chọn đồng hồ và gọi tới số
                            <strong>0362179555</strong> để đặt hàng</h4>
                        <h4 class="titletop2"><strong>Bước 2:</strong> Chúng tôi sẽ gọi theo số điện thoại trong đơn
                            hàng lại trong vòng 2 phút để xác nhận đơn hàng</h4>
                        <h4 class="titletop2"><strong>Bước 3:</strong> Chuyển khoản tới số tài khoản bên dưới kèm nội
                            dung chuyển khoản: <strong>Mã đơn hàng + Số điện thoại mua hàng</strong> </h4>

                    </div>

                    <h4 class="title-bank2">THÔNG TIN CHUYỂN KHOẢN NGÂN HÀNG</h4>
                    <h4 class="title-bank3">VU DUC THINH</h4>
                    <div class="row row-bank">
                        <div class="col-bank1">
                            <h4 class="cardtitle">NGÂN HÀNG</h4>
                            <h4 class="cardbody2"><strong>Sacombank - Chi nhánh Cộng Hòa</strong></h4>
                        </div>
                        <div class="col-bank2">
                            <h4 class="cardtitle">SỐ TÀI KHOẢN</h4>
                            <h4 class="cardbody2"><strong>9704 0328 9711 4248</strong></h4>
                        </div>
                    </div>




                </div>
                <div class="col-4">
                </div>

            </div>
        </div>
@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection