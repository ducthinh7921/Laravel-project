@extends('Admin.layout.index')

   @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
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
                                <th>Tên Bản Tin</th>
                              	<th>Nội Dung</th> 
                 
                         
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $n)
                            <tr class="odd gradeX" >
                                <td>{{$n->id}}</td>
                                <td>{{$n->name}}</td>
                                <td>{!! $n->content !!}</td>

                      
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="news/edit/{{$n->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="news/delete/{{$n->id}}">Delete</a></td>

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