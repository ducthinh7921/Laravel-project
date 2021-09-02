@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Coupon
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

                       <form action="coupon/edit/{{$coupon->id}}" method="POST" >

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                         
                           <div class="form-group">
                               <label>Name</label>
                               <input class="form-control" name="name" placeholder="Enter Name." value="{{$coupon->name}}" />
                           </div>
                           <div class="form-group">
                                <label>Discount </label>
                                <input class="form-control" name="discount" placeholder="Enter Discount." value="{{$coupon->discount}}" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Start_at:  </label>
                                <input type="datetime-local" id="start_at" name="start_at" value="{{$coupon->start_at}}">
                           </div>
                           <div class="form-group">
                                <label>End_at:  </label>
                                <input type="datetime-local" id="end_at" name="end_at" value="{{$coupon->end_at}}">
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