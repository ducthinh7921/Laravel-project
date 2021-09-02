@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết Đơn Hàng
                            <small>Danh Sách</small>
                        </h1>
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
                                <th>Mã Hóa Đơn</th>
                              	<th>Tên Sản Phẩm</th>
                              	<th>Giá Khuyến Mãi</th>
                              	<th>Giá Cũ</th>
                              	<th>Số Lượng</th> 
                              	<th>Hình Ảnh</th> 
                              	<th>Delete</th> 

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_details as $s)
                            <tr class="odd gradeX" align="center">
                                <td>{{$s->id}}</td>
                                <td>{{$s->orders->code}}</td>
                                <td>{{$s->product->name}}</td>
                                <th>{{number_format($s->price_sale) }} đ</th> 
                                <th>{{number_format($s->price_old) }} đ</th> 
                                <td>{{$s->qty}}</td>
                                <td><img width="100px" src="upload/product/{{$s->product->product_image}}" />
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="orders/delete/{{$s->id}}">Hủy</a></td>




                    
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