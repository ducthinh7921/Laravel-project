@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Thông Tin Cá Nhân
                           <small>Sửa</small>
                       </h1>
                   </div>
                   <!-- /.col-lg-12 -->
                   <div class="col-lg-7" style="padding-bottom:120px">
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

                       <form action="update/{{$user->code}}" method="POST" enctype="multipart/form-data">

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                         

                         

                           <div class="form-group">
                               <label>Họ Và Tên</label>
                               <input class="form-control" name="name" placeholder="Nhập Tên Người Dùng." value="{{$user->name}}" />
                           </div>
                      
                           <div class="form-group">
                               <label>Email</label>
                               <input class="form-control" name="email"  value="{{$user->email}}" readonly />
                           </div>
                           <div class="form-group">
                               <label>Phone</label>
                               <input class="form-control" name="phone" placeholder="Nhập Số Điện Thoại" value="{{$user->phone}}" />
                           </div>

                           @if($user->image != null) 
                                  <img src="upload/user/{{$user->image}}" alt="" class="imgp4-img" width=100px height=100px>

                                @else
                                  <img src="public/assets/img/user-icon-placeholder.png" alt="" class="imgp4-img" width=100px height=100px>
                                @endif
                           <div class="form-group">
                                
                                
                                <label>Hình Đại Diện</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                           
                         

                           <button type="submit" class="btn btn-default">Sửa</button>
                           <button type="reset" class="btn btn-default">Reset</button>
                       </form>
                   </div>
               </div>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </div>
       <!-- /#page-wrapper -->

@endsection