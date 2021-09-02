@extends('layout.index')
@section('title')   
    <title>Product Details</title>
@endsection

@section('content')

<div class="grid">
       
        <h4 class="tag-brand">Đồng hồ {{$product->brand->name}}</h4>
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
        <div class="tag-brand-line"></div>
        <div class="row dt1">
            <div class="col-6 col-3-img-details">
                <div id="sliders" style="width:550px ; height:550px;">
                @if($product->product_image)
                    <div class="slide"> <img src="upload/product/{{$product->product_image}}" width="550px" height="550px" /></div>
                @endif
                @if($product->product_image)
                    <div class="slide"> <img src="upload/product/{{$product->product_image}}" width="550px" height="550px" /></div>
                @endif
                @if($product->product_image)
                    <div class="slide"> <img src="upload/product/{{$product->product_image}}" width="550px"height="550px" /> </div>
                @endif
                </div>
                @if($product->status==0 || $product->brand->status == 1)
                <div class="content-product-item-sold-out-dt">
                    <img src="public/assets/img/sold-out-0.png" alt="" class="sold-out-dt">
                </div>
                @endif

            </div>
            <div class="col-6">
                        
                <h4 class="product-name">Đồng hồ {{$product->name}}</h4>
               
                <div class="dt-price">
                    <div class="dt-old-price">
                        <h4 class="dt-price-title">Giá niêm yết</h4>
                        <h4 class="price-old">{{number_format($product->price)}}đ </h4>
                    </div>
                    <div class="dt-new-price">
                        <h4 class="dt-price-title">Giá khuyến mãi</h4>
                        @if($product->discount != 0)
                        <h4 class="price-new">{{number_format($product->price-($product->price*($product->discount/100)))}}đ</h4>
                        @else 
                        <h4></h4>
                        @endif
                    </div>
                </div>
                <div class="dt-sale">
                    <h4 class="dt-sale-title">SALE</h4>
                    <H4 class="dt-sale-percent">{{$product->discount}}%</H4>
                </div>

                <div class="row thong-so">
                    <div class="col-chi-tiet1">
                        <h4 class="col-chi-tiet-header">Đường kính mặt</h4>
                        <h4 class="col-chi-tiet-body">{{$product->case_size}} mm</h4>

                    </div>
                    <div class="col-chi-tiet">
                        <h4 class="col-chi-tiet-header">Độ Chịu Nước</h4>
                        <h4 class="col-chi-tiet-body">{{$product->Wateproof}}</h4>

                    </div>
                    <div class="col-chi-tiet">
                        <h4 class="col-chi-tiet-header">Chất liệu mặt</h4>
                        <h4 class="col-chi-tiet-body">{{$product->loai_kinh}}</h4>

                    </div>
                    <div class="col-chi-tiet">
                        <h4 class="col-chi-tiet-header">Năng lượng sử dụng</h4>
                        <h4 class="col-chi-tiet-body">{{$product->category->name}}</h4>

                    </div>
                </div>
                <div class="khuyenmai">
                    <h4 class="khuyenmai-chitiet">Trở thành khách hàng may mắn nhận các sản phẩm khuyến mãi của
                        TWatch.</h4>
                    <h4 class="khuyenmai-chitiet">Miễn Phí giao hàng.</h4>

                </div>
                <div class="khuyenmai-label">
                    <h4 class="khuyenmai-label-header">KHUYẾN MÃI</h4>
                </div>

                <a href="shopping/add/{{$product->id}}" class="">
                    <div class="link-to-card">
                        <h4 class="link-to-card-header">MUA NGAY</h4>
                        <h4 class="link-to-card-body">Giao hàng miễn phí</h4>

                    </div>
                </a>


            </div>
        </div>
        <div class="row dt2">
            <div class="col-8">
                <div class="row sp-lienquan">
                    <div class="header-lienquan">
                        <h4 class="sp-lienquan-header">Có thể bạn sẽ thích</h4>
                    </div>
                    @foreach($productlist as $p)
                    <div class="col-4 col-sp-lienquan">
                        <div class="content-product-item">
                            <a href="sp/{{$p->slug}}" >
                                <img src="upload/product/{{$p->product_image}}" alt=""
                                    class="content-product-item-img">
                                <h4 class="content-product-item-name">{{$p->name}} - @if($p->gender==0) Nam @else Nữ @endif - {{$p->loai_kinh}} - {{$p->category->name}} - {{$p->strap->name}}
                                </h4>
                            </a>
                            @if($p->discount == 0)
                            <!-- sp khong giam gia -->
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
                   
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>


            <div class="col-4">
                <div class="thongso-kt">
                    <span class="thongso-kt-item  ">THÔNG SỐ KỸ THUẬT</span>
                </div>
                <div class="row thong-so-chitiet  ">
                    <div class="col-6 label">Đường kính mặt</div>
                    <div class="col-6 solieu">{{$product->case_size}} mm</div>

                </div>
                <div class="row thong-so-chitiet  ">
                    <div class="col-6 label">Chống nước</div>
                    <div class="col-6 solieu">{{$product->Wateproof}}</div>

                </div>
                <div class="row thong-so-chitiet ">
                    <div class="col-6 label">Chất kiệu</div>
                    <div class="col-6 solieu">{{$product->loai_kinh}}</div>

                </div>
                <div class="row thong-so-chitiet ">
                    <div class="col-6 label">Năng lượng sử dụng</div>
                    <div class="col-6 solieu">{{$product->category->name}}</div>

                </div>
                <div class="row thong-so-chitiet ">
                    <div class="col-6 label">Chất liệu dây</div>
                    <div class="col-6 solieu">{{$product->strap->name}}</div>

                </div>
                <div class="row thong-so-chitiet ">
                    <div class="col-6 label">Xuất xứ</div>
                    <div class="col-6 solieu">{{$product->origin}}</div>

                </div>
                <div class="row thong-so-chitiet ">
                    <div class="col-6 label">Chế độ bảo hành</div>
                    <div class="col-6 solieu">Bảo hành {{$product->guarantee}}</div>

                </div>



            </div>

        </div>
        <div class="row dt3">
            <div class="header-cmt">
                <form action="comment/{{$product->id}}" method="post">
                     <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    <textarea name="comment" rows="5" cols="33"
                        placeholder="Mời bạn tham gia thảo luận, vui lòng sử dụng tiếng Việt có dấu."></textarea>
                    <br><br>
                    <input type="submit" value="Submit">
                </form>

            </div>
            @foreach($comments as $cm)
                <div class="bg-cmt">
                    <div class="col-12 cmt-item">
                        <h4 class="user-name">{{$cm->user->name}}</h4>
                        <h4 class="user-cmt">{{$cm->content}}</h4>
                        <h4 class="thoigian-cmt">Đăng vào:  {{ $cm->created_at->isoFormat('L')}}</h4>
                    </div>
                </div>
            @endforeach

        </div>


    </div>


@endsection

@section('script')
<script src="public/assets/js/style.js">
    </script>
    <script type='text/javascript'>
        $("#sliders").simpleSlider({ speed: 500 });
    </script>
@endsection