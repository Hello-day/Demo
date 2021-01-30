<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CateController extends Controller
{

    public function __invoke( $id = null )
    {
        if($id==null){
            $products=DB::table('product')->orderBy('id','desc')->paginate(3);
        }else{
            $products=DB::table('product')->orderBy('id','desc')->where('cid',$id)->paginate(3);
        }
        $cates=DB::table('cate')->orderBy('sort','desc')->get();


        $data=[
            'cates'=>$cates,
            'products'=>$products

        ];


        return view('cate.index',$data);
    }
}
