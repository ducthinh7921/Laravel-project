@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Admin
                           <small>Thêm</small>
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

                       <form action="admin/add" method="POST" >

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                         
                                <div class="form-group">
                                 <label>Họ và tên</label>

                                    <input class="form-control" placeholder="Nhập họ và tên" name="name" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>

                                    <input class="form-control" placeholder="Nhập Email" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                   <label>Mật Khẩu</label>

                                    <input class="form-control" placeholder="Nhập Mật Khẩu" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                     <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
                                </div>
                      

                           <button type="submit" class="btn btn-default">Add</button>
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