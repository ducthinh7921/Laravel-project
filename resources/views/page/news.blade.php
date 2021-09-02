@extends('layout.index')
@section('title')   
    <title>Tin Tức - Sự Kiện</title>
@endsection

@section('content')
<div class="grid">
            <div class="Contentlabel2">
                <span class="Contentlabel-item Contentlabel-item-separate">TIN TỨC - SỰ KIỆN</span>
                <span class="Contentlabel-item-separate2"></span>
            </div>
            <div class="row news-list">
                <div class="col-8">
                    @foreach($news as $n)
                        <div class="news-item">
                            <div class="row">
                                <div class="col-4">
                                    <a href="news-details/{{$n->id}}" class="">
                                         <img src="upload/news/{{$n->image}}" alt="" class="news-img">
                                    </a>
                                </div>
                                <div class="col-8 new">
                                   <a href="news-details/{{$n->id}}" class="">

                                        <h3 class="news-title">{{$n->name}}
                                        </h3>
                                        <h4 class="news-body">{!! $n->content !!}
                                        </h4>
                                    </a>

                                </div>

                            </div>
                        </div>
                    @endforeach
              
                 
                </div>
                <div class="col-4"></div>



            </div>


            <!-- <ul class="pagination">
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-angle-left"></i>
                    </a>
                </li>
                <li class="pagination-item ">
                    <a href="" class="pagination-item-link">1</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">2</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">3</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">4</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">5</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">...</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item-link">14</a>
                </li>

                <li class="pagination-item">
                    <a href="" class="pagination-item-link">
                        <i class="pagination-item-icon fas fa-angle-right"></i>
                    </a>
                </li>

            </ul>
 -->


        </div>




@endsection

@section('script')
        <script src="public/assets/js/style.js">
        </script>
@endsection