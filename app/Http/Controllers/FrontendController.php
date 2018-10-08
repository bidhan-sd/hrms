<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function career(){
        $advertisements = DB::table('advertisements')->select('id', 'post_name')->where('publication_status' ,'=', '1' )->orderBy('id', 'desc')->get();
        return view('front-end.career.index',[
            'advertisements'=>$advertisements
        ]);
    }
    public function advertisementSingle($id){
        $advertisement = DB::table('advertisements')->select()->where('id' ,'=', $id)->first();
        return view('front-end.career.single',[
            'advertisement'=> $advertisement
        ]);
    }
    public function applyOnline(){
        //$advertisement = DB::table('advertisements')->select()->where('id' ,'=', $id)->first();
        return view('front-end.career.apply-online');
    }
}
