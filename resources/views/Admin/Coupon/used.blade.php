@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Coupon
                            <small>Danh Sách</small>
                        </h1>
                    </div>


                    <!-- /.col-lg-12 -->

                      @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif


                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Khách Hàng</th>
                                <th>Mã giảm giá</th>
                              	<th>Discount</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày sử dụng</th>


                       


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupon_used as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->id}}</td>
                                <td>{{$b->user->name}}</td>
                                <td>{{$b->coupon->code}}</td>
                                <td>{{$b->coupon->discount}}</td>
                                <td>{{$b->orders->code}}</td>
                                <td>{{ $b->created_at->isoFormat('L')}}</td>
                 

                              

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection