<footer class="footer">
            <div class="grid">
                <div class="content-news">
                    <span class="content-news-header content-news-boder ">TWATCH - TIN TỨC VÀ SỰ KIỆN</span>
                </div>
                <div class="row content-news-body">
                    <div class="col-8 content-news-list8">
                        <div class="row content-news-list8-3">
                            @foreach($newsf as $nf)
                                <div class="col-4 content-news-item">
                                    <a href="news-details/{{$nf->id}}" class="">

                                        <img src="upload/news/{{$nf->image}}" alt="" class="content-news-item-img">
                                        <h3 class="content-news-item-title">{{$nf->name}}</h3>
                                        <h4 class="content-news-item-content">{!! $nf->content !!}</h4>
                                    </a>
                                </div>
                            
                            @endforeach
                          

                        </div>
                    </div>
                    <div class="col-4 content-news-list4">
                        <span class="content-news-list4-header content-news-list4-boder">BÁO CHÍ NÓI VỀ TWATCH</span>
                        <a href="https://dantri.com.vn/kinh-doanh/chuyen-gia-dong-ho-xwatch-ha-noi-thu-phu-hang-fake-20180818162959166.htm">
                             <img src="public/assets/img/baodantri.jpg" alt="" class="content-news-list4-link">
                        </a>
                        <a href="https://vietnamnet.vn/vn/thoi-su/tin-anh/ha-noi-xe-lu-can-nat-dong-dong-ho-deo-tay-giua-pho-330251.html" >
                             <img src="public/assets/img/baovietnamnet.png" alt="" class="content-news-list4-link">
                        </a>
                        <a href="https://www.youtube.com/watch?v=jw5EBwRpP4o" >
                             <img src="public/assets/img/baovtv.png" alt="" class="content-news-list4-link">
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid__full_with footer-background">
                <div class="footter-line"></div>

                <div class="grid">

                    <div class="row footer-column">
                        <div class="footer-column-item">
                            <div class="footer-column-tuvan-list">
                                <div class="footer-column-tuvan-item">
                                    <span class="col-4 footer-column-tuvan-icon"><i
                                            class="tuvan-icon fas fa-phone-alt"></i></span>
                                    <div class="col-8 tuvan-body">
                                        <h4 class="sdt">0362 179 555</h4>
                                        <h4 class="text">TƯ VẤN BÁN HÀNG</h4>
                                    </div>
                                </div>
                                <div class="footer-column-tuvan-item">
                                    <span class="col-4 footer-column-tuvan-icon"><i
                                            class="tuvan-icon far fa-comment-alt"></i></span>
                                    <div class="col-8 tuvan-body">
                                        <h4 class="sdt">0362 179 555</h4>
                                        <h4 class="text">HỖ TRỢ DỊCH VỤ</h4>
                                    </div>
                                </div>
                                <div class="footer-column-tuvan-item">
                                    <span class="col-4 footer-column-tuvan-icon"><i
                                            class="tuvan-icon fas fa-cogs"></i></span>
                                    <div class="col-8 tuvan-body">
                                        <h4 class="sdt">0362 179 555</h4>
                                        <h4 class="text">TƯ VẤN KỸ THUẬT</h4>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="footer-column-item">
                            <h4 class="tu-van-header">CHĂM SÓC KHÁCH HÀNG</h4>
                            <div class="tu-van-link-list">
                                <a href="ask">
                                    <h4 class="tu-van-link-item-title">Hỏi Đáp - Góp Ý</h4>
                                </a>
                                <a href="doihang">
                                    <h4 class="tu-van-link-item-title">Chính Sách Đổi Hàng</h4>
                                </a>
                                <a href="baohanh">
                                    <h4 class="tu-van-link-item-title">Chính Sách Bảo Hành</h4>
                                </a>


                            </div>
                        </div>
                        <div class="footer-column-item">
                            <h4 class="tu-van-header">THEO DÕI CHÚNG TÔI TRÊN</h4>
                            <div class="tu-van-link-list">
                                <div class="row-item">
                                    <a href="https://www.facebook.com/TWatch-105682811775059" class="">
                                        <div class=" col-link-icon"><i class="link-icon fab fa-facebook-square"></i>
                                        </div>
                                        <div class=" col-link-brand">Facebook</div>
                                    </a>
                                </div>
                                <div class="row-item">
                                    <a href="https://www.instagram.com/">
                                        <div class=" col-link-icon"><i class="link-icon fab fa-instagram"></i></div>
                                        <div class=" col-link-brand">Instagram</div>
                                    </a>
                                </div>


                            </div>
                        </div>
                        <div class="footer-column-item">
                            <h4 class="tu-van-header">TIỆN ÍCH</h4>
                            <div class="tu-van-link-list">
                                <a href="news">
                                    <h4 class="tu-van-link-item-title">Tin Tức</h4>
                                </a>


                            </div>
                        </div>
                    </div>

                </div>
                <a href="{{ request()->fullUrl() }}" class="back-top"><i class="back-top-icon fas fa-chevron-circle-up"></i></a>

            </div>
        </footer>