@extends("layouts.app")

@section('content')
<script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<form>
    <div class="form-group">
      <label for="itemname">宝贝名称</label>
      <input type="text" class="form-control" id="itemname" placeholder="请输入物品名称">
    </div>
    <div class="form-group">
        <label for="itemprice">宝贝价格</label>
        <input type="text" class="form-control" id="itemprice" placeholder="请输入物品价格">
      </div>
      <div class="form-group">
        <label for="itemprice">宝贝图片</label>
        <input type="text" class="form-control" id="itemimg" placeholder="请粘贴图片链接">
      </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">宝贝分类</label>
      <select class="form-control" id="cid">
        <option value="1">二手教材</option>
        <option value="2">二手数码</option>
        <option value="3">堪比全新（？）</option>
      </select>
    </div>
    <form>
       {{--  <div class="form-group">
          <label for="itemimg">宝贝图片</label>
          <input type="file" class="form-control-file" id="itemimg">
        </div> --}}
      </form>
    <div class="form-group">
      <label for="itemcontent">宝贝描述（100字以内）</label>
      <textarea class="form-control" id="itemcontent" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary submit">提交</button>
  </form>


  <script src="https://heerey525.github.io/layui-v2.4.3/layui-v2.4.5/layui.js"></script>

  <script>

    $('.submit').click(function () {

    itemname = $('#itemname').val();
    itemprice = $('#itemprice').val();
    cid = $("#cid option:selected").val();
    itemcontent = $('#itemcontent').val();

    itemimg =  $('#itemimg').val();
    //$value = session('username');
    //uid = $value;

   $.post("{{url('success')}}",{title:itemname,price:itemprice,cid:cid,content:itemcontent,img:itemimg},function(res){
      if(res.code==200){

          layui.use('layer', function(){
              var layer = layui.layer;

             layer.msg(res.msg,{time:2000});

             });

             setTimeout('window.location.href="{{url('/')}}";',2000);



     }else{
             layui.use('layer', function(){
            var layer = layui.layer;

             layer.msg(res.msg,{time:2000});
             });


     }
    },'json');

});



   </script>
@endsection
