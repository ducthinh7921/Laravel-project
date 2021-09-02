@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
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

                      @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif


                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                              	<th>Hình ảnh</th>
                              	<th>Giới tính</th>
                              	<th>Case size</th>
                              	<th>Loại kính</th>
                              	<th>Chống nước</th>
                              	<th>Xuất xứ</th>
                              	<th>Trạng thái</th>
                                <th>Active</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $p)
                            <tr class="odd gradeX" align="center">
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{number_format($p->price)}}đ</td>
                                <td>{{$p->discount}}</td>
                                <td><img width="100px" src="upload/product/{{$p->product_image}}" />
                                @if($p->gender==0) 
                                    <td>Nam</td>
                                @elseif($p->gender==1)
                                    <td>Nữ</td>
                                @elseif($p->gender==2)
                                    <td>Đôi</td>
                                @else
                                    <td>Trẻ em</td>
                                 @endif
                                <td>{{$p->case_size}}</td>
                                <td>{{$p->loai_kinh}}</td>
                                <td>{{$p->Wateproof}}</td>
                                <td>{{$p->origin}}</td>
                                @if($p->status==1) 
                                    <td class="btn btn-primary">Active</td>
                                @else
                                    <td class="btn btn-danger">UnActive</td>
                                 @endif
                                 <td><a href="product/active/{{$p->id}}">Active</a></br><a href="product/unactive/{{$p->id}}">UnActive</a> </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="product/edit/{{$p->slug}}">Edit</a></td>
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