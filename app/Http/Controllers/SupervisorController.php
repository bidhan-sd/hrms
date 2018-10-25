<?php

namespace App\Http\Controllers;
use DB;
use App\Employee;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function manageSupervisor(){
        $supervisorss = DB::table('supervisors')
            ->leftJoin('employees', 'employees.id', '=', 'supervisors.employee_id')
            ->select('employees.employee_name as eName', 'supervisors.*')
            ->orderBy('id', 'desc')
            ->get();
        //return $supervisorss;
        return view('back-end.supervisor.manage',[
            'supervisorss' => $supervisorss
        ]);
    }

    public function createSupervisor(){
        return view('back-end.supervisor.create');
    }

    public function saveSupervisor(Request $request){
        //return $request->all();
        $this->validate($request, [
            "department_name" => 'required',
            "supervisor_pin"  => 'required'
        ]);

        DB::table('supervisors')->insert([
            'employee_id'         => $request->id,
            'department_name'     => $request->department_name,
            'supervisor_pin'      => $request->supervisor_pin,
            'publication_status'  => 1,
        ]);
        DB::table('employees')->where('id',$request->id)->update([
            'supervisor' => 1
        ]);
        return redirect('manage-supervisor')->with('message','Supervisor Created !');

    }

    public function addSupervisor($employee_id){
        $employee = Employee::select('id','department_name','employee_pin')->find($employee_id);
        return $employee;
    }
}
