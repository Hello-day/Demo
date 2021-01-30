<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class ImgController extends Controller
{
    public function submit(Request $request)
    {

        $data = $request->input();
        //DB::table('product')->insertGetId($data);
        if(!empty($data['title'])&&!empty($data['price'])){
            DB::table('product')->insertGetId($data);
            return response()->json(array('code'=>200,'msg'=>'发布成功！快去首页看看吧！'));
        }else{
            return response()->json(array('code'=>601,'msg'=>'请填写商品标题或价格！'));
        }

    }



}
