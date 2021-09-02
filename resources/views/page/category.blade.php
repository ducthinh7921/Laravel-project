@extends('layout.index')
@section('title')   
    <title>Category</title>
@endsection

@section('content')
<div class="grid">
            <div class="row category-list">
                <a href="dong-ho-nam" class="col-category-item">
                    <div class="col-4-item">
                        <img src="public/assets/img/banner-dong-ho-nam.png" alt="" class="category-img">
                    </div>
                    <div class="col-8-item">
                        <h4 class="category-name-header">ĐỒNG HỒ NAM</h4>
                        <h4 class="category-name-qty">Có <strong>{{count($dhnam)}}</strong> sản phẩm</h4>
                    </div>
                </a>
                <a href="dong-ho-nu" class="col-category-item">

                    <div class="col-4-item">
                        <img src="public/assets/img/banner-dong-ho-nu.png" alt="" class="category-img">
                    </div>
                    <div class="col-8-item">
                        <h4 class="category-name-header">ĐỒNG HỒ NỮ</h4>
                        <h4 class="category-name-qty">Có <strong>{{count($dhnu)}}</strong> sản phẩm</h4>
                    </div>
                </a>
                <a href="dong-ho-doi" class="col-category-item">

                    <div class="col-4-item">
                        <img src="public/assets/img/banner-dong-ho-doi.png" alt="" class="category-img">
                    </div>
                    <div class="col-8-item">
                        <h4 class="category-name-header">ĐỒNG HỒ ĐÔI</h4>
                        <h4 class="category-name-qty">Có <strong>{{count($dhdoi)}}</strong> sản phẩm</h4>
                    </div>
                </a>
                <a href="dong-ho-tre-em" class="col-category-item1">

                    <div class="col-4-item">
                        <img src="public/assets/img/banner-dong-ho-tre-em.png" alt="" class="category-img">
                    </div>
                    <div class="col-8-item">
                        <h4 class="category-name-header">ĐỒNG HỒ TRẺ EM</h4>
                        <h4 class="category-name-qty">Có <strong>{{count($dhkid)}}</strong> sản phẩm</h4>
                    </div>
                </a>
            </div>
            <h4 class="tag-brand">Đồng Hồ Chính Hãng</h4>
            <div class="tag-brand-line"></div>
            <div class="order">
                <div class="price">
                    <Span class="price-tag">Giá:</Span>
                    <div class="price-block">
                        <ul class="price-list">
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'5'])}}" class="price-link">Dưới 2 triệu</a>
                            </li>
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'6'])}}" class="price-link">Từ 2 - 5 triệu</a>
                            </li>
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'7'])}}" class="price-link">Từ 5 - 10 triệu</a>
                            </li>
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'8'])}}" class="price-link">Từ 10 - 20 triệu</a>
                            </li>
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'9'])}}" class="price-link">Từ 20 - 50 triệu</a>
                            </li>
                            <li class="price-item">
                                <a href="{{request()->fullUrlWithQuery(['price'=>'10'])}}" class="price-link">Trên 50 triệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="right">
                    <div class="dropdown">
                        <span class="case-size-tittle">Chọn Đường Kính</span>
                        <ul class="dropdown-list">
                            <li class="dropdown-content-item">
                                <a href="{{request()->fullUrlWithQuery(['size'=>'0'])}}" class="case-size-type">Dưới 25 mm</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="{{request()->fullUrlWithQuery(['size'=>'1'])}}" class="case-size-type">25 - 31 mm</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="{{request()->fullUrlWithQuery(['size'=>'2'])}}" class="case-size-type">32 - 37 mm</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="{{request()->fullUrlWithQuery(['size'=>'3'])}}" class="case-size-type">38 - 42 mm</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="{{request()->fullUrlWithQuery(['size'=>'4'])}}" class="case-size-type">Trên 42 mm</a>
                            </li>
                        </ul>

                    </div>
                    <div class="dropdown strap">
                        <span class="case-size-tittle">Loại Dây Đeo</span>
                        <ul class="dropdown-list">
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Da</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Inox</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Cao Su</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Lưới</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Vải</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Dây Titanium</a>
                            </li>
                        </ul>

                    </div>
                    <div class="dropdown sort">
                        <span class="case-size-tittle">Sắp xếp</span>
                        <ul class="dropdown-list">
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Bán Chạy</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Giá từ thấp tới cao</a>
                            </li>
                            <li class="dropdown-content-item">
                                <a href="" class="case-size-type">Giá từ cao tới thấp</a>
                            </li>
                        </ul>
                    </div>

                </div> -->
            </div>
            <div class="tag-brand-line"></div>
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
            <!-- <ul class="pagination">
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="pagination-item ">
                    <a href="" class="pagination-item-link">1</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">2</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">3</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">4</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">5</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">...</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">14</a>
                </li>

                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-angle-right"></i>
                    </a>
                </li>

            </ul> -->



        </div>

@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection