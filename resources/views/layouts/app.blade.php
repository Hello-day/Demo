<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>闲鱼ofNJUPT</title>
    <style>
        .zp-container{
            width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">闲鱼 of NJUPT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(\Request::getRequestUri()=='/') active @endif">
              <a class="nav-link" href="{{url('/')}}">首页 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @if(strpos(\Request::getRequestUri(),'cate')== true) active @endif">
              <a class="nav-link" href="{{url('cate')}}">物品分类</a>
            </li>
            @if(!empty(session('users')))
            <li class="nav-item dropdown" id="out">
              <a class="nav-link" href="{{url('my')}}">我要发布</a>
            </li>
            @endif
          </ul>
          <form class="form-inline my-2 my-lg-0" onsubmit="return false">
            @if(empty(session('users')))
            <button class="btn btn-light" data-toggle="modal" data-target="#login">登录</button>
            <button class="btn btn-light" data-toggle="modal" data-target="#register ">注册</button>
            @else
            <button class="btn btn-light">{{session('users')['username']}}</button>
            <button class="btn btn-light login-out" >退出</button>
            @endif

          </form>
        </div>
      </nav>



  <!-- login -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="yonghuming">登录啦</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form onsubmit="return false;">
                <div class="form-group">
                  <label for="lusername">用户名</label>
                  <input type="text" class="form-control" id="lusername" placeholder="请输入用户名" >
                </div>
                <div class="form-group">
                  <label for="lpassord">密码</label>
                  <input type="password" class="form-control" id="lpassword" placeholder="请输入密码">
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
          <button type="button" class="btn btn-primary login-submit">登录</button>
        </div>
      </div>
    </div>
  </div>


  <!-- register -->
  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="zhuce">注册啦</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form onsubmit="return false;">
                <div class="form-group">
                  <label for="rtel">手机号</label>
                  <input type="text" class="form-control" id="rtel" placeholder="请输入手机号">
                </div>
                <div class="form-group">
                    <label for="rusername">用户名</label>
                    <input type="text" class="form-control" id="rusername" placeholder="请设置用户名">
                  </div>
                <div class="form-group">
                  <label for="rpassword">密码</label>
                  <input type="password" class="form-control" id="rpassword" placeholder="请设置密码">

                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary register-submit">注册</button>
        </div>
      </div>
    </div>
  </div>


      <div class="zp-container">
      @yield('content')
      </div>
      <script src="https://heerey525.github.io/layui-v2.4.3/layui-v2.4.5/layui.js"></script>

       <script>

           //login
           $('.login-submit').click(function () {

           lusername = $('#lusername').val();
           lpassword = $('#lpassword').val();

          $.post("{{url('login')}}",{username:lusername,password:lpassword},function(res){
            if(res.code==200){

                 layui.use('layer', function(){
                     var layer = layui.layer;

                    layer.msg(res.msg,{time:2000});
                    });
                    setTimeout('window.location.reload()',2000);


            }else{
                    layui.use('layer', function(){
                   var layer = layui.layer;

                    layer.msg(res.msg,{time:2000});
                    });
            }


            },'json');





           });



           //login-out
           $('.login-out').click(function(){
               $.getJSON("{{url('loginout')}}",{},function(res){


              layui.use('layer', function(){
                   var layer = layui.layer;

                    layer.msg(res.msg,{time:2000});
                    });



               });
               setTimeout('window.location.reload()',2000);
               window.location.href="{{url('/')}}";


            });


          //register

          $('.register-submit').click(function(){
          rusername = $('#rusername').val();
          rtel = $('#rtel').val();
          rpassword = $('#rpassword').val();

          $.post("{{url('register')}}",{username:rusername,tel:rtel,password:rpassword},function(res){
              console.log(res);
              if(res.code==200){

              layui.use('layer', function(){
             var layer = layui.layer;

              layer.msg(res.msg);
            });

            setTimeout('window.location.reload()',2000);

        }else{
            layui.use('layer', function(){
             var layer = layui.layer;

              layer.msg(res.msg,{time:2000});
            });

        }



            },'json');






          });




        </script>
</body>
</html>
