@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn Hàng
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <div class="col-lg-12 loc-don">
                        <label for="cars">Lọc Đơn hàng:</label>
                        <div class="dropdown">
                        <button class="dropbtn">Đơn hàng</button>
                        <div class="dropdown-content">
                            <a href="{{request()->fullUrlWithQuery(['q'=>'0'])}}">Tất cả đơn hàng</a>
                            <a href="{{request()->fullUrlWithQuery(['q'=>'1'])}}">Chờ xác nhận</a>
                            <a href="{{request()->fullUrlWithQuery(['q'=>'2'])}}">Chờ lấy hàng</a>
                            <a  href="{{request()->fullUrlWithQuery(['q'=>'3'])}}">Đã giao</a>
                            <a href="{{request()->fullUrlWithQuery(['q'=>'4'])}}">Đã hủy</a>
    

                        </div>
                        </div>
                    </div>



                    <!-- /.col-lg-12 -->
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


                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Code</th>
                              	<th>Hình Thức Thanh Toán</th>
                              	<th>Tổng Đơn</th> 
                                <th>Ngày Tạo</th> 
                              	<th>Ghi Chú</th> 
                              	<th>Trạng Thái</th> 
                              	<th>Chuyển Trạng Thái</th> 
                              	<th>Shipping</th> 
                              	<th>Chi Tiết ĐH</th> 
                              	<th>Hủy ĐH</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $o)
                        

                            <tr class="odd gradeX" align="center">
                                <td>{{$o->id}}</td>
                                <td>{{$o->code}}</td>
                                <td>{{$o->payment}}</td>
                                <th>{{number_format($o->order_total_money)}}đ</th> 
                                <th>{{ $o->created_at->isoFormat('L')}}</th>
                                <td>{{$o->note}}</td>
                                @if($o->status ==0)
                                <td class="btn btn-warning" >Chờ xác nhận</td>
                                @elseif ($o->status ==1)
                                <td class="btn btn-success" >Chờ lấy hàng</td>
                                @elseif ($o->status ==2)
                                <td class="btn btn-primary" >Đã Giao</td>
                                @else
                                <td class="btn btn-danger" >Đã Hủy</td>
                                @endif


                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="orders/chuyen-trang-thai/{{$o->id}}">Chuyển Trạng Thái</a></td>
                                <td class="center"> <a href="orders/shipping/{{$o->ship_id}}">Xem</a></td>
                                <td class="center"> <a href="orders/order_details/{{$o->id}}">Xem</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="orders/huy-don-hang/{{$o->id}}">Hủy</a></td>

                              
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