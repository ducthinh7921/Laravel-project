@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Banner
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

                       <form action="banner/edit/{{$banner->id}}" method="POST" enctype="multipart/form-data">

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           <div class="form-group">
                               <label>Name</label>
                               <input class="form-control" name="name" value="{{$banner->name}}"  />
                           </div>
                           <div class="form-group">
                                <label>Image </label><br>
                                <img width="300px" src="upload/banner/{{$banner->image}}" /> <br/>
                                <input class="form-control" type="file" name="image">
                            </div>
                           <div class="form-group">
                               <label>Status</label>
                               <input class="form-control" name="status" value="{{$banner->status}}" />
                           </div>
                           
                           

                           <button type="submit" class="btn btn-default">Edit</button>
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