<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function manageDepartmentHeadSetup(){

        $departmentHeads = DB::table('department_heads')
            ->leftJoin('employees', 'employees.id', '=', 'department_heads.employee_id')
            ->select('employees.employee_name as eName', 'department_heads.*')
            ->orderBy('id', 'desc')
            ->get();

        return view('back-end.departmentHead.manage',[
            'departmentHeads' => $departmentHeads
        ]);

    }
    public function createDepartmentHead(){
        return view('back-end.departmentHead.create');
    }
    public function saveDepartmentHead(Request $request){
        //return $request->all();
        $this->validate($request, [
            "department_name" => 'required',
            "departmentHead_pin"  => 'required'
        ]);

        DB::table('department_heads')->insert([
            'employee_id'         => $request->id,
            'department_name'     => $request->department_name,
            'departmentHead_pin'  => $request->departmentHead_pin,
            'publication_status'  => 1,
        ]);
        DB::table('employees')->where('id',$request->id)->update([
            'department_head' => 1
        ]);
        return redirect('manage-departmentHead-setup')->with('message','Department Head Created !');

    }


}

