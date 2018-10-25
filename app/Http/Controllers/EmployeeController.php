<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class EmployeeController extends Controller
{
    public function assignEmployee(Request $request){
        $id = $request->checkSingle;
        $name = $request->full_name;
        $degination = $request->post_name;

        return view('back-end.employee.create',[
            'id' => $id,
            'name' => $name,
            'degination' => $degination
        ]);
    }
    public function saveEmployee(Request $request){

        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'joining_date' => 'required',
            'employee_pin' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('final-list')->with('message','Input field required');
        }

        $exist_pin = DB::table('employees')
            ->where('employee_pin',$request->employee_pin )
            ->first();

        if($exist_pin) {
            return redirect('final-list')->with('message','Pin already exist input another pin');
        }else {

            DB::table('employees')->insert([
                'applied_online_id' => $request->id,
                'employee_name' => $request->employee_name,
                'degination' => $request->degination,
                'department_name' => $request->department_name,
                'joining_date' => $request->joining_date,
                'employee_pin' => $request->employee_pin,
                'active' => 1,
            ]);

            DB::table('online_applies')->where('id', $request->id)->update([
                'status' => 5,
            ]);

            return redirect('manage-employee')->with('message', 'Employee Created !');
        }
    }

    public function manageEmployee(){
        $employess = DB::table('employees')
            ->leftJoin('online_applies', 'online_applies.id', '=', 'employees.applied_online_id')
            ->select('online_applies.photo as ePhoto', 'employees.*')
            ->orderBy('id', 'desc')
            ->get();
        //return $employess;
        return view('back-end.employee.manage',[
            'employess' => $employess
        ]);
    }

    public function manageSupervisor(){
        return view('back-end.supervisor.manage');
    }
    public function createSupervisor(){
        return view('back-end.supervisor.create');
    }
    public function saveSupervisor(Request $request){
        return $request->all();
    }
    public function manageDepartmentHeadSetup(){
        return view('back-end.departmentHead.manage');
    }
}
