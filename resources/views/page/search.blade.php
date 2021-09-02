@extends('layout.index')
@section('title')   
    <title>Chính sách đổi hàng</title>
@endsection

@section('content')
<div class="grid">
            <div class="Contentlabel2">
                <span class="Contentlabel-item Contentlabel-item-separate">KẾT QUẢ TÌM KIẾM</span>
                <span class="Contentlabel-item-separate2"></span>
            </div>
            @if(count($product)==0)
                <div class="sp-bag-text">
                    <h4 class="sp-bag-text-header">KHÔNG CÓ KẾT QUẢ ĐƯỢC TÌM THẤY!</h4>

                </div>
                @endif
            <div class="product-show">
                <div class="row content-product">
              

                @foreach($product as $p)
                    <div class="col-product-4">
                        <div class="content-product-item">
                            <a href="sp/{{$p->slug}}" >
                            <img src="upload/product/{{$p->product_image}}" alt=""
                                class="content-product-item-img">
                                <h4 class="content-product-item-name">
                                    {{$p->name}} - @if($p->gender ==0) Nam
                                                @elseif($p->gender==1) Nữ
                                                @elseif($p->gender==2) Đôi
                                                @else Trẻ em
                                                @endif - {{$p->loai_kinh}} - {{$p->category->name}} - {{$p->strap->name}}
                                </h4>
                            </a>
                            @if($p->discount == 0)
                          
                            <div class="content-product-item-price nosale">
                                <span class="content-product-item-price-no-sale">{{number_format($p->price)}}đ</span>
                            </div>
                            @else
                            <div class="content-product-item-price ">
                        
                                 <span class="content-product-item-price-old">{{number_format($p->price)}}đ </span>
                                <span class="content-product-item-price-new">{{number_format($p->price-($p->price*($p->discount/100)))}}đ</span>
                            </div>
                            <div class="content-product-item-sale">
                                <span class="content-product-item-sale-percent">{{$p->discount}}%</span>
                                <span class="content-product-item-sale-label">GIẢM</span>
                            </div>
                            @endif
                            @if($p->status==0 || $p->brand->status == 1)    
                            <div class="content-product-item-sold-out">
                                <img src="public/assets/img/sold-out-0.png" alt="" class="sold-out">
                            </div>
                            @endif
                        </div>

                    </div>

                    @endforeach



                </div>



            </div>



        </div>


@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection