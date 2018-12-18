<?php

namespace App\Http\Controllers;
use App\onlineApply;
use DB;
use Image;
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
                'supervisor' => 0,
                'department_head' => 0,
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
            ->select('online_applies.id as onlineID','online_applies.full_name', 'online_applies.mobile_number', 'online_applies.email_address', 'employees.*')
            ->orderBy('id', 'desc')
            ->get();
        //return $employess;
        return view('back-end.employee.manage',[
            'employess' => $employess
        ]);
    }

    public function assignSupervisor(Request $request){
        DB::table('employees')->where('id', $request->id)
            ->update(['assign_supervisor' => $request->supervisor_name]);

        return back()->with('message', "Supervisor Assigned Successfully !");
    }

    public function singleEmployeeDetails($id){
        $singleEmployeeDetail = DB::table('employees')
            ->LeftJoin('online_applies', 'online_applies.id', '=', 'employees.applied_online_id')
            ->select('employees.*','online_applies.*','employees.id as employeeID')
            ->where('employees.id', '=', $id)
            ->first();
        //dd($singleEmployeeDetail);
        return view('back-end.employee.singleEmployeeDetails',['singleEmployeeDetail'=>$singleEmployeeDetail]);
    }

    protected function validationSingleEmployeeInfo($request){
        $this->validate($request,[
            'degination' => 'required',
            'department_name' => 'required',
            'employee_pin' => 'required',
            'joining_date' => 'required',
            'full_name'   => 'required|regex:/^[\pL\s\-]+/u',
            'father_name' => 'required|regex:/^[\pL\s\-]+/u',
            'mother_name' => 'required|regex:/^[\pL\s\-]+/u',
            'dob'         => 'required',
            'gender'             => 'required',
            'religion'           => 'required',
            'marital_status'     => 'required',
            'nationality'        => 'required|regex:/^[\pL\s\-]+/u',
            'mobile_number'      => 'required',
            'email_address'      => 'required',
            'present_address'    => 'required',
            'permanent_address'  => 'required',
            'ssc_group'   => 'required',
            'ssc_result'  => 'required',
            'ssc_board'   => 'required',
            'ssc_passing_year'  => 'required',
            'hsc_group'  => 'required',
            'hsc_result'    => 'required',
            'hsc_board'     => 'required',
            'hsc_passing_year'  => 'required',
            'referencesNameOne'  => 'required',
            'referencesMobileOne'  => 'required',
            'referencesEmailOne'  => 'required',
            'referencesAddressOne'  => 'required',
            'photo'  => 'mimes:jpeg,png,jpg',
            'signature'  => 'mimes:jpeg,png,jpg',
        ]);
    }

    public function updateSingleEmployeeInfo(Request $request){

        $this->validationSingleEmployeeInfo($request);

        DB::table('employees')->where('id', $request->employeeID)
        ->update([
            'degination' => $request->degination,
            'department_name' => $request->department_name,
            'employee_pin' => $request->employee_pin,
            'joining_date' => $request->joining_date,
        ]);

        $onlineAppliedID = DB::table('employees')->where('id', $request->employeeID)->select('applied_online_id')->first();
        $onlineApplieds = DB::table('online_applies')->where('id', $onlineAppliedID->applied_online_id)->select('photo','signature')->first();
        //dd($onlineApplieds);

        if(empty($request->hasFile('photo') || $request->hasFile('signature'))){
            DB::table('online_applies')->where('id',$onlineAppliedID->applied_online_id)->update([
                'unique_apply_id' => $request->unique_apply_id,
                'post_id' => $request->post_id,
                'post_name' => $request->degination,
                'full_name' => $request->full_name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'spouse_name' => $request->spouse_name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'marital_status' => $request->marital_status,
                'nationality' => $request->nationality,
                'national_id_no' => $request->national_id_no,
                'mobile_number' => $request->mobile_number,
                'email_address' => $request->email_address,
                'totalExperince' => $request->totalExperince,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'ssc_exam' => $request->ssc_exam,
                'ssc_group' => $request->ssc_group,
                'ssc_result' => $request->ssc_result,
                'ssc_cgpa' => $request->ssc_cgpa,
                'ssc_scale' => $request->ssc_scale,
                'ssc_marks' => $request->ssc_marks,
                'ssc_board' => $request->ssc_board,
                'ssc_passing_year' => $request->ssc_passing_year,
                'hsc_exam' => $request->hsc_exam,
                'hsc_group' => $request->hsc_group,
                'hsc_result' => $request->hsc_result,
                'hsc_cgpa' => $request->hsc_cgpa,
                'hsc_scale' => $request->hsc_scale,
                'hsc_marks' => $request->hsc_marks,
                'hsc_board' => $request->hsc_board,
                'hsc_passing_year' => $request->hsc_passing_year,
                'honors_exam' => $request->honors_exam,
                'honors_group' => $request->honors_group,
                'honors_result' => $request->honors_result,
                'honors_cgpa' => $request->honors_cgpa,
                'honors_scale' => $request->honors_scale,
                'honors_marks' => $request->honors_marks,
                'honors_board' => $request->honors_board,
                'honors_passing_year' => $request->honors_passing_year,
                'post_graduation_exam' => $request->post_graduation_exam,
                'post_graduation_group' => $request->post_graduation_group,
                'post_graduation_result' => $request->post_graduation_result,
                'post_graduation_cgpa' => $request->post_graduation_cgpa,
                'post_graduation_scale' => $request->post_graduation_scale,
                'post_graduation_marks' => $request->post_graduation_marks,
                'post_graduation_board' => $request->post_graduation_board,
                'post_graduation_passing_year' => $request->post_graduation_passing_year,
                'other_graduation_exam' => $request->other_graduation_exam,
                'other_graduation_group' => $request->other_graduation_group,
                'other_graduation_result' => $request->other_graduation_result,
                'other_graduation_cgpa' => $request->other_graduation_cgpa,
                'other_graduation_scale' => $request->other_graduation_scale,
                'other_graduation_marks' => $request->other_graduation_marks,
                'other_graduation_board' => $request->other_graduation_board,
                'other_graduation_passing_year' => $request->other_graduation_passing_year,
                'eOrganizationNameOne' => $request->eOrganizationNameOne,
                'edesignationOne' => $request->edesignationOne,
                'eJobTypeOne' => $request->eJobTypeOne,
                'eResponsibilitiesOne' => $request->eResponsibilitiesOne,
                'eJoiningDateOne' => $request->eJoiningDateOne,
                'eReleaseDateOne' => $request->eReleaseDateOne,
                'eRunningDateOne' => $request->eRunningDateOne,
                'eOrganizationNameTwo' => $request->eOrganizationNameTwo,
                'edesignationTwo' => $request->edesignationTwo,
                'eJobTypeTwo' => $request->eJobTypeTwo,
                'eResponsibilitiesTwo' => $request->eResponsibilitiesTwo,
                'eJoiningDateTwo' => $request->eJoiningDateTwo,
                'eReleaseDateTwo' => $request->eReleaseDateTwo,
                'eOrganizationNameThree' => $request->eOrganizationNameThree,
                'edesignationThree' => $request->edesignationThree,
                'eJobTypeThree' => $request->eJobTypeThree,
                'eResponsibilitiesThree' => $request->eResponsibilitiesThree,
                'eJoiningDateThree' => $request->eJoiningDateThree,
                'eReleaseDateThree' => $request->eReleaseDateThree,
                'bSpeaking' => $request->bSpeaking,
                'bReading' => $request->bReading,
                'bListening' => $request->bListening,
                'bWriting' => $request->bWriting,
                'eSpeaking' => $request->eSpeaking,
                'eReading' => $request->eReading,
                'eListening' => $request->eListening,
                'eWriting' => $request->eWriting,
                'other_language' => $request->other_language,
                'oSpeaking' => $request->oSpeaking,
                'oReading' => $request->oReading,
                'oListening' => $request->oListening,
                'oWriting' => $request->oWriting,
                'skills' => $request->skills,
                'referencesNameOne' => $request->referencesNameOne,
                'referencesMobileOne' => $request->referencesMobileOne,
                'referencesEmailOne' => $request->referencesEmailOne,
                'referencesAddressOne' => $request->referencesAddressOne,
                'referencesNameTwo' => $request->referencesNameTwo,
                'referencesMobileTwo' => $request->referencesMobileTwo,
                'referencesEmailTwo' => $request->referencesEmailTwo,
                'referencesAddressTwo' => $request->referencesAddressTwo,
            ]);
        }

        if($request->hasFile('photo') && $request->hasFile('signature')) {

            $photoData = Image::make($request->file('photo'));
            $signatureData = Image::make($request->file('signature'));
            $photoSize = $photoData->filesize();
            $signatureSize = $signatureData->filesize();
            //return [$photoSize,$signatureSize];

            if ($photoSize < 512000) {
                if ($signatureSize < 40960) {

                    unlink($onlineApplieds->photo);
                    unlink($onlineApplieds->signature);

                    $photoRandom = str_random(15);
                    $signatureRandom = str_random(10);

                    $photo = $request->file('photo');
                    $signature = $request->file('signature');

                    $photoUnique = strtolower($photoRandom . time().'.' . $photo->getClientOriginalExtension());
                    $signatureUnique = strtolower($signatureRandom .time().'.' . $signature->getClientOriginalExtension());

                    $directory = 'front-end/online-apply-image/';

                    $photoUrl = $directory.$photoUnique;
                    $signatureUrl = $directory.$signatureUnique;

                    Image::make($photo)->save($photoUrl); //For external Package.
                    Image::make($signature)->save($signatureUrl); //For external Package.
                    //return [$photoUrl,$signatureUrl];

                    DB::table('online_applies')->where('id',$onlineAppliedID->applied_online_id)->update([
                        'unique_apply_id' => $request->unique_apply_id,
                        'post_id' => $request->post_id,
                        'post_name' => $request->degination,
                        'full_name' => $request->full_name,
                        'father_name' => $request->father_name,
                        'mother_name' => $request->mother_name,
                        'spouse_name' => $request->spouse_name,
                        'dob' => $request->dob,
                        'gender' => $request->gender,
                        'religion' => $request->religion,
                        'marital_status' => $request->marital_status,
                        'nationality' => $request->nationality,
                        'national_id_no' => $request->national_id_no,
                        'mobile_number' => $request->mobile_number,
                        'email_address' => $request->email_address,
                        'totalExperince' => $request->totalExperince,
                        'present_address' => $request->present_address,
                        'permanent_address' => $request->permanent_address,
                        'ssc_exam' => $request->ssc_exam,
                        'ssc_group' => $request->ssc_group,
                        'ssc_result' => $request->ssc_result,
                        'ssc_cgpa' => $request->ssc_cgpa,
                        'ssc_scale' => $request->ssc_scale,
                        'ssc_marks' => $request->ssc_marks,
                        'ssc_board' => $request->ssc_board,
                        'ssc_passing_year' => $request->ssc_passing_year,
                        'hsc_exam' => $request->hsc_exam,
                        'hsc_group' => $request->hsc_group,
                        'hsc_result' => $request->hsc_result,
                        'hsc_cgpa' => $request->hsc_cgpa,
                        'hsc_scale' => $request->hsc_scale,
                        'hsc_marks' => $request->hsc_marks,
                        'hsc_board' => $request->hsc_board,
                        'hsc_passing_year' => $request->hsc_passing_year,
                        'honors_exam' => $request->honors_exam,
                        'honors_group' => $request->honors_group,
                        'honors_result' => $request->honors_result,
                        'honors_cgpa' => $request->honors_cgpa,
                        'honors_scale' => $request->honors_scale,
                        'honors_marks' => $request->honors_marks,
                        'honors_board' => $request->honors_board,
                        'honors_passing_year' => $request->honors_passing_year,
                        'post_graduation_exam' => $request->post_graduation_exam,
                        'post_graduation_group' => $request->post_graduation_group,
                        'post_graduation_result' => $request->post_graduation_result,
                        'post_graduation_cgpa' => $request->post_graduation_cgpa,
                        'post_graduation_scale' => $request->post_graduation_scale,
                        'post_graduation_marks' => $request->post_graduation_marks,
                        'post_graduation_board' => $request->post_graduation_board,
                        'post_graduation_passing_year' => $request->post_graduation_passing_year,
                        'other_graduation_exam' => $request->other_graduation_exam,
                        'other_graduation_group' => $request->other_graduation_group,
                        'other_graduation_result' => $request->other_graduation_result,
                        'other_graduation_cgpa' => $request->other_graduation_cgpa,
                        'other_graduation_scale' => $request->other_graduation_scale,
                        'other_graduation_marks' => $request->other_graduation_marks,
                        'other_graduation_board' => $request->other_graduation_board,
                        'other_graduation_passing_year' => $request->other_graduation_passing_year,
                        'eOrganizationNameOne' => $request->eOrganizationNameOne,
                        'edesignationOne' => $request->edesignationOne,
                        'eJobTypeOne' => $request->eJobTypeOne,
                        'eResponsibilitiesOne' => $request->eResponsibilitiesOne,
                        'eJoiningDateOne' => $request->eJoiningDateOne,
                        'eReleaseDateOne' => $request->eReleaseDateOne,
                        'eRunningDateOne' => $request->eRunningDateOne,
                        'eOrganizationNameTwo' => $request->eOrganizationNameTwo,
                        'edesignationTwo' => $request->edesignationTwo,
                        'eJobTypeTwo' => $request->eJobTypeTwo,
                        'eResponsibilitiesTwo' => $request->eResponsibilitiesTwo,
                        'eJoiningDateTwo' => $request->eJoiningDateTwo,
                        'eReleaseDateTwo' => $request->eReleaseDateTwo,
                        'eOrganizationNameThree' => $request->eOrganizationNameThree,
                        'edesignationThree' => $request->edesignationThree,
                        'eJobTypeThree' => $request->eJobTypeThree,
                        'eResponsibilitiesThree' => $request->eResponsibilitiesThree,
                        'eJoiningDateThree' => $request->eJoiningDateThree,
                        'eReleaseDateThree' => $request->eReleaseDateThree,
                        'bSpeaking' => $request->bSpeaking,
                        'bReading' => $request->bReading,
                        'bListening' => $request->bListening,
                        'bWriting' => $request->bWriting,
                        'eSpeaking' => $request->eSpeaking,
                        'eReading' => $request->eReading,
                        'eListening' => $request->eListening,
                        'eWriting' => $request->eWriting,
                        'other_language' => $request->other_language,
                        'oSpeaking' => $request->oSpeaking,
                        'oReading' => $request->oReading,
                        'oListening' => $request->oListening,
                        'oWriting' => $request->oWriting,
                        'skills' => $request->skills,
                        'referencesNameOne' => $request->referencesNameOne,
                        'referencesMobileOne' => $request->referencesMobileOne,
                        'referencesEmailOne' => $request->referencesEmailOne,
                        'referencesAddressOne' => $request->referencesAddressOne,
                        'referencesNameTwo' => $request->referencesNameTwo,
                        'referencesMobileTwo' => $request->referencesMobileTwo,
                        'referencesEmailTwo' => $request->referencesEmailTwo,
                        'referencesAddressTwo' => $request->referencesAddressTwo,
                        'photo' => $photoUrl,
                        'signature' => $signatureUrl,
                    ]);

                } else {
                    return redirect('career')->with('message', 'Large Signature Size ! Signature size less then 400 KB');
                }
            } else {
                return redirect('career')->with('message', 'Large Photo Size ! Photo size less then 500 KB');
            }
        }

        if($request->hasFile('photo')) {
            $photoData = Image::make($request->file('photo'));
            $photoSize = $photoData->filesize();
            if ($photoSize < 512000){
                unlink($onlineApplieds->photo);
                $photoRandom = str_random(15);
                $photo = $request->file('photo');
                $photoUnique = strtolower($photoRandom . time().'.' . $photo->getClientOriginalExtension());
                $directory = 'front-end/online-apply-image/';
                $photoUrl = $directory.$photoUnique;
                Image::make($photo)->save($photoUrl); //For external Package.
                DB::table('online_applies')->where('id',$onlineAppliedID->applied_online_id)->update([
                    'unique_apply_id' => $request->unique_apply_id,
                    'post_id' => $request->post_id,
                    'post_name' => $request->degination,
                    'full_name' => $request->full_name,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'spouse_name' => $request->spouse_name,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'marital_status' => $request->marital_status,
                    'nationality' => $request->nationality,
                    'national_id_no' => $request->national_id_no,
                    'mobile_number' => $request->mobile_number,
                    'email_address' => $request->email_address,
                    'totalExperince' => $request->totalExperince,
                    'present_address' => $request->present_address,
                    'permanent_address' => $request->permanent_address,
                    'ssc_exam' => $request->ssc_exam,
                    'ssc_group' => $request->ssc_group,
                    'ssc_result' => $request->ssc_result,
                    'ssc_cgpa' => $request->ssc_cgpa,
                    'ssc_scale' => $request->ssc_scale,
                    'ssc_marks' => $request->ssc_marks,
                    'ssc_board' => $request->ssc_board,
                    'ssc_passing_year' => $request->ssc_passing_year,
                    'hsc_exam' => $request->hsc_exam,
                    'hsc_group' => $request->hsc_group,
                    'hsc_result' => $request->hsc_result,
                    'hsc_cgpa' => $request->hsc_cgpa,
                    'hsc_scale' => $request->hsc_scale,
                    'hsc_marks' => $request->hsc_marks,
                    'hsc_board' => $request->hsc_board,
                    'hsc_passing_year' => $request->hsc_passing_year,
                    'honors_exam' => $request->honors_exam,
                    'honors_group' => $request->honors_group,
                    'honors_result' => $request->honors_result,
                    'honors_cgpa' => $request->honors_cgpa,
                    'honors_scale' => $request->honors_scale,
                    'honors_marks' => $request->honors_marks,
                    'honors_board' => $request->honors_board,
                    'honors_passing_year' => $request->honors_passing_year,
                    'post_graduation_exam' => $request->post_graduation_exam,
                    'post_graduation_group' => $request->post_graduation_group,
                    'post_graduation_result' => $request->post_graduation_result,
                    'post_graduation_cgpa' => $request->post_graduation_cgpa,
                    'post_graduation_scale' => $request->post_graduation_scale,
                    'post_graduation_marks' => $request->post_graduation_marks,
                    'post_graduation_board' => $request->post_graduation_board,
                    'post_graduation_passing_year' => $request->post_graduation_passing_year,
                    'other_graduation_exam' => $request->other_graduation_exam,
                    'other_graduation_group' => $request->other_graduation_group,
                    'other_graduation_result' => $request->other_graduation_result,
                    'other_graduation_cgpa' => $request->other_graduation_cgpa,
                    'other_graduation_scale' => $request->other_graduation_scale,
                    'other_graduation_marks' => $request->other_graduation_marks,
                    'other_graduation_board' => $request->other_graduation_board,
                    'other_graduation_passing_year' => $request->other_graduation_passing_year,
                    'eOrganizationNameOne' => $request->eOrganizationNameOne,
                    'edesignationOne' => $request->edesignationOne,
                    'eJobTypeOne' => $request->eJobTypeOne,
                    'eResponsibilitiesOne' => $request->eResponsibilitiesOne,
                    'eJoiningDateOne' => $request->eJoiningDateOne,
                    'eReleaseDateOne' => $request->eReleaseDateOne,
                    'eRunningDateOne' => $request->eRunningDateOne,
                    'eOrganizationNameTwo' => $request->eOrganizationNameTwo,
                    'edesignationTwo' => $request->edesignationTwo,
                    'eJobTypeTwo' => $request->eJobTypeTwo,
                    'eResponsibilitiesTwo' => $request->eResponsibilitiesTwo,
                    'eJoiningDateTwo' => $request->eJoiningDateTwo,
                    'eReleaseDateTwo' => $request->eReleaseDateTwo,
                    'eOrganizationNameThree' => $request->eOrganizationNameThree,
                    'edesignationThree' => $request->edesignationThree,
                    'eJobTypeThree' => $request->eJobTypeThree,
                    'eResponsibilitiesThree' => $request->eResponsibilitiesThree,
                    'eJoiningDateThree' => $request->eJoiningDateThree,
                    'eReleaseDateThree' => $request->eReleaseDateThree,
                    'bSpeaking' => $request->bSpeaking,
                    'bReading' => $request->bReading,
                    'bListening' => $request->bListening,
                    'bWriting' => $request->bWriting,
                    'eSpeaking' => $request->eSpeaking,
                    'eReading' => $request->eReading,
                    'eListening' => $request->eListening,
                    'eWriting' => $request->eWriting,
                    'other_language' => $request->other_language,
                    'oSpeaking' => $request->oSpeaking,
                    'oReading' => $request->oReading,
                    'oListening' => $request->oListening,
                    'oWriting' => $request->oWriting,
                    'skills' => $request->skills,
                    'referencesNameOne' => $request->referencesNameOne,
                    'referencesMobileOne' => $request->referencesMobileOne,
                    'referencesEmailOne' => $request->referencesEmailOne,
                    'referencesAddressOne' => $request->referencesAddressOne,
                    'referencesNameTwo' => $request->referencesNameTwo,
                    'referencesMobileTwo' => $request->referencesMobileTwo,
                    'referencesEmailTwo' => $request->referencesEmailTwo,
                    'referencesAddressTwo' => $request->referencesAddressTwo,
                    'photo' => $photoUrl,
                ]);
            } else {
                return back()->with('message', 'Large Photo Size ! Photo size less then 500 KB');
            }
        }

        if($request->hasFile('signature')) {
            $signatureData = Image::make($request->file('signature'));
            $signatureSize = $signatureData->filesize();
            if ($signatureSize < 40960) {
                unlink($onlineApplieds->signature);
                $signatureRandom = str_random(10);
                $signature = $request->file('signature');
                $signatureUnique = strtolower($signatureRandom .time().'.' . $signature->getClientOriginalExtension());
                $directory = 'front-end/online-apply-image/';
                $signatureUrl = $directory.$signatureUnique;
                Image::make($signature)->save($signatureUrl); //For external Package.
                DB::table('online_applies')->where('id',$onlineAppliedID->applied_online_id)->update([
                    'unique_apply_id' => $request->unique_apply_id,
                    'post_id' => $request->post_id,
                    'post_name' => $request->degination,
                    'full_name' => $request->full_name,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'spouse_name' => $request->spouse_name,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'marital_status' => $request->marital_status,
                    'nationality' => $request->nationality,
                    'national_id_no' => $request->national_id_no,
                    'mobile_number' => $request->mobile_number,
                    'email_address' => $request->email_address,
                    'totalExperince' => $request->totalExperince,
                    'present_address' => $request->present_address,
                    'permanent_address' => $request->permanent_address,
                    'ssc_exam' => $request->ssc_exam,
                    'ssc_group' => $request->ssc_group,
                    'ssc_result' => $request->ssc_result,
                    'ssc_cgpa' => $request->ssc_cgpa,
                    'ssc_scale' => $request->ssc_scale,
                    'ssc_marks' => $request->ssc_marks,
                    'ssc_board' => $request->ssc_board,
                    'ssc_passing_year' => $request->ssc_passing_year,
                    'hsc_exam' => $request->hsc_exam,
                    'hsc_group' => $request->hsc_group,
                    'hsc_result' => $request->hsc_result,
                    'hsc_cgpa' => $request->hsc_cgpa,
                    'hsc_scale' => $request->hsc_scale,
                    'hsc_marks' => $request->hsc_marks,
                    'hsc_board' => $request->hsc_board,
                    'hsc_passing_year' => $request->hsc_passing_year,
                    'honors_exam' => $request->honors_exam,
                    'honors_group' => $request->honors_group,
                    'honors_result' => $request->honors_result,
                    'honors_cgpa' => $request->honors_cgpa,
                    'honors_scale' => $request->honors_scale,
                    'honors_marks' => $request->honors_marks,
                    'honors_board' => $request->honors_board,
                    'honors_passing_year' => $request->honors_passing_year,
                    'post_graduation_exam' => $request->post_graduation_exam,
                    'post_graduation_group' => $request->post_graduation_group,
                    'post_graduation_result' => $request->post_graduation_result,
                    'post_graduation_cgpa' => $request->post_graduation_cgpa,
                    'post_graduation_scale' => $request->post_graduation_scale,
                    'post_graduation_marks' => $request->post_graduation_marks,
                    'post_graduation_board' => $request->post_graduation_board,
                    'post_graduation_passing_year' => $request->post_graduation_passing_year,
                    'other_graduation_exam' => $request->other_graduation_exam,
                    'other_graduation_group' => $request->other_graduation_group,
                    'other_graduation_result' => $request->other_graduation_result,
                    'other_graduation_cgpa' => $request->other_graduation_cgpa,
                    'other_graduation_scale' => $request->other_graduation_scale,
                    'other_graduation_marks' => $request->other_graduation_marks,
                    'other_graduation_board' => $request->other_graduation_board,
                    'other_graduation_passing_year' => $request->other_graduation_passing_year,
                    'eOrganizationNameOne' => $request->eOrganizationNameOne,
                    'edesignationOne' => $request->edesignationOne,
                    'eJobTypeOne' => $request->eJobTypeOne,
                    'eResponsibilitiesOne' => $request->eResponsibilitiesOne,
                    'eJoiningDateOne' => $request->eJoiningDateOne,
                    'eReleaseDateOne' => $request->eReleaseDateOne,
                    'eRunningDateOne' => $request->eRunningDateOne,
                    'eOrganizationNameTwo' => $request->eOrganizationNameTwo,
                    'edesignationTwo' => $request->edesignationTwo,
                    'eJobTypeTwo' => $request->eJobTypeTwo,
                    'eResponsibilitiesTwo' => $request->eResponsibilitiesTwo,
                    'eJoiningDateTwo' => $request->eJoiningDateTwo,
                    'eReleaseDateTwo' => $request->eReleaseDateTwo,
                    'eOrganizationNameThree' => $request->eOrganizationNameThree,
                    'edesignationThree' => $request->edesignationThree,
                    'eJobTypeThree' => $request->eJobTypeThree,
                    'eResponsibilitiesThree' => $request->eResponsibilitiesThree,
                    'eJoiningDateThree' => $request->eJoiningDateThree,
                    'eReleaseDateThree' => $request->eReleaseDateThree,
                    'bSpeaking' => $request->bSpeaking,
                    'bReading' => $request->bReading,
                    'bListening' => $request->bListening,
                    'bWriting' => $request->bWriting,
                    'eSpeaking' => $request->eSpeaking,
                    'eReading' => $request->eReading,
                    'eListening' => $request->eListening,
                    'eWriting' => $request->eWriting,
                    'other_language' => $request->other_language,
                    'oSpeaking' => $request->oSpeaking,
                    'oReading' => $request->oReading,
                    'oListening' => $request->oListening,
                    'oWriting' => $request->oWriting,
                    'skills' => $request->skills,
                    'referencesNameOne' => $request->referencesNameOne,
                    'referencesMobileOne' => $request->referencesMobileOne,
                    'referencesEmailOne' => $request->referencesEmailOne,
                    'referencesAddressOne' => $request->referencesAddressOne,
                    'referencesNameTwo' => $request->referencesNameTwo,
                    'referencesMobileTwo' => $request->referencesMobileTwo,
                    'referencesEmailTwo' => $request->referencesEmailTwo,
                    'referencesAddressTwo' => $request->referencesAddressTwo,
                    'signature' => $signatureUrl,
                ]);
            } else {
                return back()->with('message', 'Large Signature Size ! Signature size less then 400 KB');
            }
        }

        return redirect('manage-employee')->with('message', 'Applicant info update!');
    }

    public function singleEmployeeDetailsView($employeeId){
        $singleEmployeeDetail = DB::table('employees')
            ->LeftJoin('online_applies', 'online_applies.id', '=', 'employees.applied_online_id')
            ->select('employees.*','online_applies.*','employees.id as employeeID')
            ->where('employees.id', '=', $employeeId)
            ->first();
        //dd($singleEmployeeDetail);
        return view('back-end.employee.singleEmployeeOnlyDetails',['singleEmployeeDetail'=>$singleEmployeeDetail]);
    }

    public function searchEmployee(){
        $employess = DB::table('employees')
            ->leftJoin('online_applies','online_applies.id', '=', 'employees.applied_online_id')
            ->select('online_applies.full_name','online_applies.mobile_number', 'online_applies.email_address', 'online_applies.photo', 'employees.degination', 'employees.department_name','employees.employee_pin')
            ->orderBy('employees.id', 'desc')
            ->get();

        return view('back-end.employee.employeeSearch',[
            'employess' => $employess
        ]);
    }

}
