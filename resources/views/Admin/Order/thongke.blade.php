@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống Kê
                        </h1>
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
                    </div>
                    <form action="orders/thongke" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                        <div class="col-lg-12 thong-ke">
                            <label for="cars">Tháng:</label>
                            <select name="month" class="month selectmonth" >
                                <option value="1">Tháng 1</option>
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>
                            </select>
                            <label for="cars" class="month mright" >Năm:</label>

                            <input type="text"  class="fyear" name="year" value="{{now()->year}}">
                            <button type="submit">Chọn</button><br>
                            <label class="label-thong-ke rtk">Thống kê tháng: @if(isset($thang)) {{$thang}} @endif </label>
                            <label class="label-thong-ke">Năm:@if(isset($nam)) {{$nam}} @endif </label>


                        </div>
                    </form>
                    <!-- /.col-lg-12 -->

                  

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Số đơn hàng</th>
                                <th>Số lượng sản phẩm đã bán</th>
                              	<th>Đơn xác nhận</th>
                              	<th>Đơn chờ lấy</th> 
                                <th>Đơn Đã giao</th> 
                              	<th>Đơn Đã hủy</th> 
                              	<th>Tổng tiền</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                @if(isset($tongdon))
                                    <td>{{$tongdon}}</td>
                                @else  <td>0</td>
                                @endif

                                @if(isset($slsanpham))
                                    <td>{{$slsanpham}}</td>
                                @else  <td>0</td>
                                @endif

                                @if(isset($choxn))
                                    <td>{{$choxn}}</td> 
                                @else  <td>0</td>
                                @endif

                                @if(isset($cholh))
                                    <td>{{$cholh}}</td>
                                @else  <td>0</td>
                                @endif

                                @if(isset($dagiao))
                                    <td>{{$dagiao}}</td>
                                @else  <td>0</td>
                                @endif

                                @if(isset($dahuy))
                                    <td>{{$dahuy}}</td>
                                @else  <td>0</td>
                                @endif

                                @if(isset($tongtien))
                                    <td>{{number_format($tongtien)}} đ</td>
                                @else  <td>0đ</td>
                                @endif
                            </tr>
                       
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection