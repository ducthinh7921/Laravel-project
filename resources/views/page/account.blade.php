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
                    <div class="profile-thongtin">
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
                        <div class="profile-thongtin-header profile-thongtin-line">
                            <h4 class="profile-thongtin-title">Thông Tin Của Tôi</h4>
                            <h4 class="profile-thongtin-body">Quản lý thông cá nhân để bảo mật tài khoản</h4>
                        </div>
                        <form action="editProfile/{{$user->id}}" method="post" enctype="multipart/form-data">
                        <div class="row chitiet-thongtin">
                            
                                 <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                <div class="col-8 col-8-chitiet-thongtin">
                                    <div class="row row-col-8-chitiet-thongtin">   
                                        <div class="label-chitiet-thongtin">
                                            <h4 class="label-chitiet-thongtin-item">Tên</h4>
                                        </div>
                                        <div class="input-group-prepend">
                                            <input type="text" class="form-control" name="name"  placeholder="Nhập họ và tên" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="row row-col-8-chitiet-thongtin">   
                                        <div class="label-chitiet-thongtin">
                                            <h4 class="label-chitiet-thongtin-item">Email</h4>
                                        </div>
                                        <div class="input-group-prepend">
                                            <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly >
                                        </div>
                                    </div>
                                    <div class="row row-col-8-chitiet-thongtin">   
                                        <div class="label-chitiet-thongtin">
                                            <h4 class="label-chitiet-thongtin-item">Số Điện Thoại</h4>
                                        </div>
                                        <div class="input-group-prepend">
                                            <input type="text" class="form-control" name="phone" placeholder="Nhập họ và tên" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                
                                  

                                    <div class="row row-col-8-chitiet-thongtin">   
                                        <div class="label-chitiet-thongtin">
                                            <h4 class="label-chitiet-thongtin-item">Ảnh Đại Diện</h4>
                                        </div>
                                        <div class="input-group-prepend">
                                       
                                        <input class="form-control" type="file" name="image">
                                        </div>
                                    </div>

                                    <button type="submit" class="pro4-btn ">
                                        <h4 class="submit-btn" >Lưu</h4>
                                    </button>

                                </div>
                                <div class="col-4"></div>
                            
                        </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection