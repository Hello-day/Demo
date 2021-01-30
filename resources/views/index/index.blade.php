@extends('layouts.app')

@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($banners as $banner)
      <div class="carousel-item @if($loop->first) active @endif">
        <img src="{{$banner->img}}" class="d-block w-100" alt="...">
      </div>
      @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

   <br>
   <br>
   <hr>
   <div class="row">
        <div class="page-header" style="margin-left: 40px">
            <h3>最新二手！
              <a href="{{url('cate')}}" style="text-decoration: none;margin-left: 10px; color:grey;"><small>点我查看更多</small></a>
            </h3>
        </div>
   </div>
   <hr>

  <div class="container" >
    <div class="row">
        <div class="col-sm">
            @foreach($products as $product)
        <a href="{{url('detail',['id'=>$product->content])}}" style="margin-left: 50px">
        <figure class="figure">
            <img src="{{$product->img}}" width="300" height="300" class="figure-img img-fluid rounded" alt="{{$product->title}}">
        <figcaption class="figure-caption"><span style="color: orange">￥{{$product->price}}</span><br>{{$product->title}}</figcaption>
        </figure>
        </a>
        @endforeach
        </div>
    </div>
  </div>

@endsection
