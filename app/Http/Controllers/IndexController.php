<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $banners =DB::table('banner')->orderby('sort','desc')->get();
        $products =DB::table('product')->orderBy('id','desc')->limit(4)->get();

       // var_dump($products);

        $data=[
            'banners'=> $banners,
            'products'=>$products
        ];
        return view('index.index',$data);
    }
}
