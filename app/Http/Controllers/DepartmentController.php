<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function createDepartment(){
        return view('back-end.department.create');
    }
    public function saveDepartment(Request $request){
        $this->validate($request, [
            'department_name'    => 'required',
            'publication_status' => 'required'
        ]);

        DB::table('departments')->insert([
            'department_name' => $request->department_name,
            'publication_status' =>$request->publication_status
        ]);

        return redirect('manage-department')->with('message','Department Saved !');
    }
    public function manageDepartment(){
        $departments = DB::table('departments')->orderBy('id', 'desc')->get();
        return view('back-end.department.manage',[
            'departments' => $departments
        ]);
    }
    public function unpublishedDepartment($id){
        DB::table('departments')->where('id',$id)->update([
            'publication_status' => 0
        ]);
        return redirect('manage-department')->with('message','Department Unpublished !');
    }
    public function publishedDepartment($id){
        DB::table('departments')->where('id',$id)->update([
            'publication_status' => 1
        ]);
        return redirect('manage-department')->with('message','Department Published !');
    }
    public function editDepartment($id){
        $singleDepartment = DB::table('departments')->select()->where('id', $id)->first();
        //return $singleDepartment;
        return view('back-end.department.edit',[
            'singleDepartment' => $singleDepartment
        ]);
    }
    public function updateDepartment(Request $request){
        $this->validate($request, [
            'department_name'    => 'required',
            'publication_status' => 'required'
        ]);

        DB::table('departments')->where('id', $request->id)->update([
            'department_name' => $request->department_name,
            'publication_status' =>$request->publication_status
        ]);

        return redirect('manage-department')->with('message','Department Updated !');
    }
    public function deleteDepartment($id){
        $singleDepartment = DB::table('departments')->where('id', $id)->delete();
        return redirect('manage-department')->with('message','Department Deleted !');
    }
}
