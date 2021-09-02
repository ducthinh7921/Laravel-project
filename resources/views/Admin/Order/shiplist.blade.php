@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Giao Hàng
                            <small>Chi Tiết</small>
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
                                <th>Tên Người Đặt</th>
                              	<th>Địa Chỉ</th>
                              	<th>Số Điện Thoại</th> 
                              	<th>Email</th> 
                                <th>Ghi Chú</th>

                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="odd gradeX" align="center">
                                <td>{{$ship->id}}</td>


                                <td>{{$ship->name}}</td>
                                <td>{{$ship->address}}</td>
                                <td>{{$ship->phone}}</td>
                                <td>{{$ship->email}}</td>
                                <td>{{$ship->orders->note}}</td>





                               
                              
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection