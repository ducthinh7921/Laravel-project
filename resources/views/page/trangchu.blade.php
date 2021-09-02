@extends('layout.index')
@section('title')   
    <title>TWactch</title>
@endsection

@section('content')
    <div class="grid__full_with content-body">

            <!-- ---------------Banner--------------- -->
            @if(count($banner) == 0)
                <img src="public/assets/img/banner.jpg" class="header__navbar-img" width="100%" height="400px">
            @else
                @foreach($banner as $b)
                    <img src="upload/banner/{{$b->image}}" class="header__navbar-img" width="100%" height="400px">
                @endforeach
            @endif
         


            <!-- --------------4 IMAGE------------- -->


            <div class="grid">

                <div class="row border-img3">

                    <div class="col-sm boder-img">
                        <a href="dong-ho-nam" class="container-image-link"><img src="public/assets/img/hotnam.jpg" alt=""
                                class="container-img" width="250" height="96"></a>
                    </div>
                    <div class="col-sm boder-img">
                        <a href="dong-ho-moi" class="container-image-link"><img src="public/assets/img/moive.jpg" alt=""
                                class="container-img" width="250" height="96"></a>
                    </div>
                    <div class="col-sm boder-img">
                        <a href="dong-ho-nu" class="container-image-link"><img src="public/assets/img/bst-dong-ho-nu-hot.jpg" alt=""
                                class="container-img" width="250" height="96"></a>
                    </div>

                </div>

                <div class="row border-img5">
                    <div class="col-8 border-dh20hot">
                        <a href="top-nam" class="border-dh20hot-link"><img src="public/assets/img/lq98NLp.jpg" alt=""
                                class="border-dh20hot-img"></a>
                    </div>
                    <div class="col-2 border-4img">
                        <div class="row img-2-tren">
                            <div class="col img-2-tren-img1">

                                <a href="dong-ho-nam" class="col img-2-tren-img1-link"><img
                                        src="public/assets/img/banner-dong-ho-nam.png" alt=""
                                        class="img-2-tren-img1-link-img" width="177" height="177"></a>
                            </div>
                            <div class="col img-2-tren-img2">
                                <a href="dong-ho-nu" class="col img-2-tren-img2-link"><img
                                        src="public/assets/img/banner-dong-ho-nu.png" alt="" class="img-2-tren-img2-link-img"
                                        width="177" height="177"></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-2 border-4img">
                        <div class="row img-2-duoi">
                            <div class="col img-2-tren-img3">
                                <a href="dong-ho-doi" class="col img-2-duoi-img1-link"><img
                                        src="public/assets/img/banner-dong-ho-doi.png" alt=""
                                        class="img-2-duoi-img1-link-img" width="177" height="177"></a>

                            </div>
                            <div class="col img-2-tren-img4">
                                <a href="dong-ho-tre-em" class="col img-2-duoi-img2-link"><img
                                        src="public/assets/img/banner-dong-ho-tre-em.png" alt=""
                                        class="img-2-duoi-img2-link-img" width="177" height="177"></a>

                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------Đồng hồ nam-------------------------------  -->
                <div class="Contentlabel">
                    <span class="Contentlabel-item Contentlabel-item-separate">ĐỒNG HỒ NAM BÁN CHẠY</span>
                    <span class="Contentlabel-item-separate2"></span>
                </div>



                <div class="row content-product">
                    @foreach($productM as $p)
                    <div class="col-product-4">
                        <div class="content-product-item">
                            <a href="sp/{{$p->slug}}" class="link-to-detail" >
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

                <!---------------------------Đồng hồ NỮ-------------------------------  -->
                <div class="Contentlabel2">
                    <span class="Contentlabel-item Contentlabel-item-separate">ĐỒNG HỒ NỮ BÁN CHẠY</span>
                    <span class="Contentlabel-item-separate2"></span>
                </div>



                <div class="row content-product">
                    @foreach($productF as $p)
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

                <!---------------------------Đồng hồ mới-------------------------------  -->
                <div class="Contentlabel2">
                    <span class="Contentlabel-item Contentlabel-item-separate">ĐỒNG HỒ MỚI</span>
                    <span class="Contentlabel-item-separate2"></span>
                </div>



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


                <!-- ------------------Brand----------------------- -->
                <div class="content-brand-label">
                    <span class="content-brand-header Contentlabel-item-separate">THƯƠNG HIỆU NỔI TIẾNG</span>
                    <span class="Contentlabel-item-separate2"></span>
                </div>

                <div class="content-brand-list">
                    <div class="row">
                        <div class="brand-item">
                            <img src="public/assets/img/QPthW0zYbZ_Daniel Wellington.jpg" alt="" class="brand-item-img">
                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/7idYnIrXjA_doxa.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/Cx1fC6rQQe_seiko.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/F7aRw9Rmid_citizen.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/fkJyo03kif_Claude bernard.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/Fuw9RpXTKD_cadino.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/iO98cR7ki6_casio.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/mfbdTSU6Mv_fossil.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/movado.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/zjnEtgHhw8_tissot.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/calvin.jpg" alt="" class="brand-item-img">

                        </div>
                        <div class="brand-item">
                            <img src="public/assets/img/rado.jpg" alt="" class="brand-item-img">

                        </div>

                    </div>
                </div>
            </div>
    </div>

@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection