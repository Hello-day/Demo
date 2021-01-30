@extends("layouts.app")

@section('content')
  <div class="row" style="margin-top:50px; background-color:#cab9ea91; line-height:40px;">
    <a href="/cate" class="col-sm-3"; style="color:#000000">全部商品</a>
      @foreach ($cates as $cate)
          <a href="{{url('cate',['id'=>$cate->id])}}" class="col-sm-3"; style="color:#000000">{{$cate->name}}</a>
      @endforeach
  </div>
  <br>


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
    {{$products->links('vendor.pagination.bootstrap-4')}}
  </div>



@endsection
