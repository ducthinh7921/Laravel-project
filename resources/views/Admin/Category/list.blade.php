@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
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
                              	<th>Description</th>
                              	<th>Trạng thái</th> 
                                <th>Active</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cat)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                @if($cat->status == 0)
                                <td class="btn btn-primary">Active</td>
                                @else
                                <td class="btn btn-danger">UnActive</td>
                                @endif
                                <td class=><a href="category/active/{{$cat->id}}">Active</a></br><a href="category/unactive/{{$cat->id}}">UnActive</a> </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="category/edit/{{$cat->id}}">Edit</a></td>
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