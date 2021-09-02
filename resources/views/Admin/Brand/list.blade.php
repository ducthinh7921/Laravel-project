@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhãn Hàng
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
                                <th>Name</th>
                              	<th>Image</th>
                              	<th>Description</th> 
                              	<th>Trạng thái</th> 
                                  <th>Active</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brand as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->id}}</td>
                                <td>{{$b->name}}</td>
                                <td><img width="100px" src="upload/brand/{{$b->image}}" />
                                <td>{{$b->description}}</td>
                                @if($b->status == 0)
                                <td class="btn btn-primary">Active</td>
                                @else
                                <td class="btn btn-danger">UnActive</td>
                                @endif
                                <td><a href="brand/active/{{$b->id}}">Active</a></br><a href="brand/unactive/{{$b->id}}">UnActive</a> </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="brand/edit/{{$b->id}}">Edit</a></td>
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