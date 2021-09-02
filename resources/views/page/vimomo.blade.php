@extends('layout.index')
@section('title')   
    <title>Chính sách đổi hàng</title>
@endsection

@section('content')
<div class="grid">
            <div class="Contentlabel2">
                <span class="Contentlabel-item Contentlabel-item-separate">VÍ ĐIỆN TỬ MOMO</span>
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
                            <h4 class="cardbody">Ví Điện Tử Momo</h4>
                        </div>
                    </div>
                    <div class="step">
                        <h4 class="titletop2"><strong>Bước 1:</strong> Chọn đồng hồ và gọi tới số
                            <strong>0362179555</strong> để đặt hàng</h4>
                        <h4 class="titletop2"><strong>Bước 2:</strong> Chúng tôi sẽ gọi theo số điện thoại trong đơn
                            hàng lại trong vòng 2 phút để xác nhận đơn hàng</h4>
                        <h4 class="titletop2"><strong>Bước 3:</strong> <strong>Quét mã QR</strong> bên dưới và chuyển
                            tiền kèm nội dung: <strong>Mã đơn hàng + Số điện thoại mua hàng</strong>
                        </h4>

                    </div>

                    <h4 class="title-bank2">THÔNG TIN TÀI KHOẢN MOMO</h4>

                    <div class="img-momo">
                        <img class="img-momo1" src="public/assets/img/momo.jpg" alt="">
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