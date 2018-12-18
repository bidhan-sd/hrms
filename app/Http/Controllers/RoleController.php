<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function createRole(){
        return view('back-end.role.create');
    }
    public function saveRole(Request $request){
        $this->validate($request, [
            'role_name'    => 'required',
            'publication_status' => 'required'
        ]);

        DB::table('roles')->insert([
            'role_name' => strtolower($request->role_name),
            'publication_status' =>$request->publication_status
        ]);

        return redirect('manage-role')->with('message','Role Saved !');
    }
    public function manageRole(){
        $roles = DB::table('roles')->orderBy('id', 'desc')->get();
        return view('back-end.role.manage',[
            'roles' => $roles
        ]);
    }

    public function unPublishedRole($id){
        DB::table('roles')->where('id',$id)->update([
            'publication_status' => 0
        ]);
        return redirect('manage-role')->with('message','Role Unpublished !');
    }
    public function publishedRole($id){
        DB::table('roles')->where('id',$id)->update([
            'publication_status' => 1
        ]);
        return redirect('manage-role')->with('message','Role Published !');
    }
    public function editRole($id){
        $singleRole = DB::table('roles')->select()->where('id', $id)->first();
        return view('back-end.role.edit',[
            'singleRole' => $singleRole
        ]);
    }
    public function updateRole(Request $request){
        $this->validate($request, [
            'role_name'    => 'required',
            'publication_status' => 'required'
        ]);

        DB::table('roles')->where('id', $request->id)->update([
            'role_name' => $request->role_name,
            'publication_status' =>$request->publication_status
        ]);

        return redirect('manage-role')->with('message','Role Updated !');
    }
    public function deleteRole($id){
        DB::table('roles')->where('id', $id)->delete();
        return redirect('manage-role')->with('message','Role Deleted !');
    }
}
