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
                    <h3 class="news-title-details">{{$news_item->name}}</h3>
                
                    <img src="upload/news/{{$news_item->image}}" alt="" width="500px" height="auto" margin-left="20px">
                    <div class="body-news-details">
                          {!! $news_item->content !!}
                    </div>
                 
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