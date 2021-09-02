<header class="header">
            <div class="grid">
                <!-- ---------------Block tren---------------------------- -->
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-cursor">KẾT NỐI</span>
                            <a href="https://www.facebook.com/TWatch-105682811775059" class="header__navbar-icon-link"><i
                                    class="header__navbar-icon fab fa-facebook"></i></a>
                            <a href="https://www.instagram.com/" class="header__navbar-icon-link"><i
                                    class="header__navbar-icon fab fa-instagram"></i></i></a>
                        </li>
                    </ul>

                    <!-- -----------SUBLIST THUONG HIEU----------- -->
                    <ul class="header__navbar-list">

                        <li class="header__navbar-item ">
                            <div class="dropdown header__navbar-item--separate">
                                <span class="brand-tittle">THƯƠNG HIỆU</span>
                                <ul class="dropdown-list">
                                  @foreach($brand as $b)
                                    @if(count($b->product)!=0)
                                    <li class="dropdown-content-item">
                                        <a href="cat/{{$b->slug}}" class="brand-items">{{$b->name}}</a>
                                    </li>
                                    @endif
                                  @endforeach

                                </ul>

                            </div>
                        </li>


                        <li class="header__navbar-item">
                            <a href="news" class="header__navbar-item-link header__navbar-item--separate">TIN TỨC ĐỒNG
                                HỒ</a>
                        </li>

                        @if(isset(Auth::user()->name) && Auth::user()->quyen==1) 
                            @if(Auth::user()->name)
                            <li class="header__navbar-item header__navbar-item--has-menu">
                                @if(Auth::user()->name == null  )
                                     <img src="public/assets/img/meow_94529.png" class="header__navbar-user-logo">
                                @else
                                    <img src="upload/user/{{Auth::user()->image}}" class="header__navbar-user-logo">
                                @endif

                                <div class="dropdown">
                                    <span class="account-tittle">{{Auth::user()->name}}</span>
                                    <ul class="dropdown-list">
                                        <li class="dropdown-content-item">
                                            <a href="cus/{{Auth::user()->code}}" class="brand-items">Thông Tin Tài Khoản</a>
                                        </li>
                                        <li class="dropdown-content-item">
                                            <a href="logout" class="brand-items">Đăng Xuất</a>
                                        </li>

                                    </ul>

                                </div>
                            </li>
                            @endif
                        
                        @else 
                              <!-- ----------------SIGN IN/ SIGN UP--------------------- -->
                        <li class="header__navbar-item"> 
                            <a href="register" class="header__navbar-item-link header__navbar-item--bold header__navbar-item--separate">ĐĂNG KÝ</a>
                         </li>
                        <li class="header__navbar-item">
                            <a href="login" class="header__navbar-item-link header__navbar-item--bold">ĐĂNG NHẬP</a> 
                        </li>
                        
                        @endif

                      
                    </ul>

                </nav>
                <!--------------------- Block  duoi ---------------------->
                <div class="header-with-search">
                    <!---------------- Header  Logo -------------->

                    <a href="trangchu" class="header__logo">
                        <div class="header__logo-img">
                            <img class="header__logo-img-img" src="public/assets/img/logo.png" alt="logo">
                        </div>
                    </a>
                    <!---------------- Header  search ----------->


                    <form class="header__search" action="search" method="post">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="text" name="key" class="header__search-input" placeholder="Nhập nội dung cần tìm...">
                        <button type="submit" class="header__search-btn ">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </form>

                    <!------------ Header  Card-------------------- -->
                    <div class="header__card">

                        <a href="shopping" class="header__card-link"><i class="header__card-icon fas fa-shopping-cart"></i> </a>

                    </div>
                </div>

            </div>
        </header>