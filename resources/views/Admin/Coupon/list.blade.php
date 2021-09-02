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
                                <th>Tên mã giảm giá</th>
                                <th>Mã giảm giá</th>
                              	<th>Discount</th>
                       

                                <th>Trạng thái</th> 
                                <th>Active</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupon as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->id}}</td>
                                <td>{{$b->name}}</td>
                                <td>{{$b->code}}</td>
                                <td>{{$b->discount}}</td>
                 

                                @if($b->status == 0)
                                <td class="btn btn-primary">Active</td>
                                @else
                                <td class="btn btn-danger">UnActive</td>
                                @endif
                                <td><a href="coupon/active/{{$b->id}}">Active</a></br><a href="coupon/unactive/{{$b->id}}">UnActive</a> </td>

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