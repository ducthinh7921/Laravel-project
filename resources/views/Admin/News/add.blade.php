@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Tin Tức
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

                       <form action="news/add" method="POST" enctype="multipart/form-data">

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                         
                           <div class="form-group">
                               <label>Tên Bản Tin</label>
                               <input class="form-control" name="name" placeholder="Enter Name." />
                           </div>
                           <div class="form-group">
                               <label>Nội Dung</label>
                               <textarea id="editor" class="form-control" name="content" placeholder="Enter Name."></textarea>
                           </div>
                           <div class="form-group">
                                <label>Hình Ảnh </label>
                                <input class="form-control" type="file" name="image">
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

