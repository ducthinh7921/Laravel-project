@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Thể Loại
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

                       <form action="category/update/{{$category->id}}" method="POST">

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           <div class="form-group">
                               <label>Edit Category</label>
                               <input class="form-control" name="name" value="{{$category->name}}" />
                           </div>
                           <div class="form-group">
                               <label>Edit Description</label>
                               <input class="form-control" name="description" value="{{$category->description}}" />
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