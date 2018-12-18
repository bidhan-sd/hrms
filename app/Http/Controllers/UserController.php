<?php

namespace App\Http\Controllers;
use App\Employee;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function searchUser(Request $request){
        //$employee = DB::table('employees')->where('employee_pin', $request->id)->get();
        //$employee = Employee::where('employee_pin', $request->id)->first();

        $employees = DB::table('employees')
            ->join('online_applies', 'employees.applied_online_id', '=', 'online_applies.id')
            ->select('employees.*', 'online_applies.email_address','online_applies.full_name','employees.id as employeeId')
            ->where('employees.employee_pin', $request->id)
            ->get('email_address');
        //return $employees;

        foreach($employees as $employee){
            $data['employeeId'] = $employee->employeeId;
            $data['full_name'] = $employee->full_name;
            $data['email_address'] = $employee->email_address;
        }

        if($data != true){
            return 0;
        }else{
            return $data;
        }

    }

    public function storeUser(Request $request){
        //dd($request->all());
        $alreadyUser = User::where('email',$request->user_email)->first();

        if($alreadyUser){
            return back()->with('message',"Already User");
        }else {
            DB::table('users')->insert([
                'employeeId' => $request->employeeId,
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
                'role' => $request->user_role,
                'publication_status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            return back()->with('message', "User Created Successfully !");
        }
    }
    public function UnpublishedUser($id){
        DB::table('users')->where('id',$id)->update([
            'publication_status' => 0
        ]);
        return redirect('manage-user')->with('message','User Unpublished !');
    }
    public function PublishedUser($id){
        DB::table('users')->where('id',$id)->update([
            'publication_status' => 1
        ]);
        return redirect('manage-user')->with('message','User Published !');
    }

}
