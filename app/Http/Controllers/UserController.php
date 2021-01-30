<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //注册
    public function register(Request $request)
    {
        //var_dump($request->input());

        $data = $request->input();
        //$data['password'] = md5($data['password']);
        //$id = DB::table('users')->insertGetId($data);
        //session(['users'=>['id'=>$id,'username'=>$data['username']]]);

        //return response()->json(array('code'=>200,'msg'=>'注册成功啦！'));

        if(!empty($data['username'])&&!empty($data['password'])){
            $id = DB::table('users')->insertGetId($data);
            session(['users'=>['id'=>$id,'username'=>$data['username']]]);
            return response()->json(array('code'=>200,'msg'=>'注册成功！'));
        }else{
            return response()->json(array('code'=>601,'msg'=>'请填写用户名和密码！'));
        }
    }

    //退出登录
    public function loginout(Request $request)
    {
        $request->session()->forget('users');
        return response()->json(array('code'=>200,'msg'=>'退出成功'));
    }


    //登录
    public function login(Request $request)
    {
        $data= $request->input();
       // $data['password']=md5($data['password']);
        $user = DB::table('users')->where($data)->first();
        if(!empty($user)){
            session(['users'=>['id'=>$user->id,'username'=>$user->username]]);
            return response()->json(array('code'=>200,'msg'=>'登录成功！'));
        }else{
            return response()->json(array('code'=>601,'msg'=>'用户名或密码有误！'));
        }
    }
}
