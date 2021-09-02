@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dây Đeo
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
                            @foreach($strap as $st)
                            <tr class="odd gradeX" align="center">
                                <td>{{$st->id}}</td>
                                <td>{{$st->name}}</td>
                                <td>{{$st->description}}</td>
                                @if($st->status == 0)
                                <td class="btn btn-primary">Active</td>
                                @else
                                <td class="btn btn-danger">UnActive</td>
                                @endif
                                <td><a href="strap/active/{{$st->id}}">Active</a></br><a href="strap/unactive/{{$st->id}}">UnActive</a> </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="strap/edit/{{$st->id}}">Edit</a></td>
                               

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