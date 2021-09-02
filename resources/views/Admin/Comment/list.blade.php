@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình Luận
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
                                <th>Người Đăng</th>
                                <th>Sản Phẩm</th>
                                <th>Nội Dung</th>
                              	<th>Ngày Đăng</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $c)
                            <tr class="odd gradeX" align="center">
                                <td>{{$c->id}}</td>
                                <td>{{$c->user->name}}</td>
                                <td>{{$c->product->name}}</td>
                                <td>{{$c->content}}</td>
                                <td>{{$c->created_at->isoFormat('L')}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="comment/delete/{{$c->id}}">Delete</a></td>
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