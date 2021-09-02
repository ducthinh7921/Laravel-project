@extends('Admin.layout.index') 

@section('content')
<!-- Page Content -->
       <div id="page-wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Sản Phẩm
                           <small>Sửa</small>
                       </h1>
                   </div>
                   <!-- /.col-lg-12 -->
                   <div class="col-lg-7" style="padding-bottom:120px">
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

                       <form action="product/update/{{$product->slug}}" method="POST" enctype="multipart/form-data">

                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                           <div class="form-group">
                                <label>Nhãn Hàng</label>
                                <select class="form-control"  name="brand_id">
                                    @foreach($brand as $b)
                                    <option @if($product->brand_id==$b->id){{"selected"}} @endif
                                        value="{{$b->id}}"> {{$b->name}} </option>
                                   
                                    @endforeach
                                </select>
                            </div>

                           <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control"  name="category_id">
                                    @foreach($category as $cat)
                                        <option  @if($product->category_id==$cat->id){{"selected"}} @endif
                                        value="{{$cat->id}}"> {{$cat->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dây Đeo</label>
                                <select class="form-control"  name="strap_id">
                                    @foreach($strap as $s)
                                        <option @if($product->strap_id==$s->id){{"selected"}} @endif
                                        value="{{$s->id}}"> {{$s->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                           <div class="form-group">
                               <label>Tên Sản Phẩm</label>
                               <input class="form-control" name="name" placeholder="Nhập Tên Sản Phẩm." value="{{$product->name}}" />
                           </div>
                      
                           <div class="form-group">
                               <label>Giá</label>
                               <input class="form-control" name="price" placeholder="Nhập Price." value="{{$product->price}}"/>
                           </div>
                           <div class="form-group">
                               <label>Giảm Giá (%)</label>
                               <input class="form-control" name="discount" placeholder="Nhập Discount." value="{{$product->discount}}" />
                           </div>
                           <img width="100px" src="upload/product/{{$product->product_image}}" />
                           <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <!-- <img width="100px" src="upload/product/{{$product->product_image2}}" />
                            <div class="form-group">
                                <label>Hình 2</label>
                                <input class="form-control" type="file" name="image2">
                            </div>
                            <img width="100px" src="upload/product/{{$product->product_image3}}" />
                            <div class="form-group">
                                <label>Image 3</label>
                                <input class="form-control" type="file" name="image3">
                            </div> -->
                      
                            <div class="form-group" >
                                <label>Giới Tính</label>
                                <label class="radio-inline">
                                    <input name="gender" value="0" @if($product->gender ==0) {{"checked"}} @endif type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="1" @if($product->gender ==1) {{"checked"}} @endif type="radio">Nữ
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="2" @if($product->gender ==2) {{"checked"}} @endif type="radio">Đôi
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="3" @if($product->gender ==3) {{"checked"}} @endif type="radio">Trẻ Em
                                </label>
                            </div>
                            <div class="form-group">
                               <label>Case Size</label>
                               <input class="form-control" name="case_size" placeholder="Nhập Case Size." value="{{$product->case_size}}"  />
                           </div>
                           <div class="form-group">
                               <label>Loại Kính</label>
                               <input class="form-control" name="loai_kinh" placeholder="Nhập Loại Kính." value="{{$product->loai_kinh}}" />
                           </div>
                           <div class="form-group">
                               <label>Chống Nước</label>
                               <input class="form-control" name="Wateproof" placeholder="Nhập độ chống nước." value="{{$product->Wateproof}}" />
                           </div>
                           <div class="form-group">
                               <label>Xuất xứ</label>
                               <input class="form-control" name="origin" placeholder="Nhập độ xuất xứ." value="{{$product->origin}}" />
                           </div>
                           <div class="form-group">
                               <label>Bảo Hành</label>
                               <input class="form-control" name="guarantee" placeholder="Nhập bảo hành." value="{{$product->guarantee}}" />
                           </div>
                           
                           

                           <button type="submit" class="btn btn-default">Sửa</button>
                           <button type="reset" class="btn btn-default">Reset</button>
                       </form>
                   </div>
               </div>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </div>
       <!-- /#page-wrapper -->

@endsection