<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function createUser(){
        return view('back-end.user.create');
    }
    public function manageUser(){
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        return view('back-end.user.manage',[
            'users' => $users
        ]);
    }
    public function searchUser($id){
        //return $id;
    }

}
