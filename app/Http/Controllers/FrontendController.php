<?php

namespace App\Http\Controllers;
use Image;
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
    public function applyOnline($id,$post_name){
        return view('front-end.career.applyOnline',['id'=>$id,'post_name' => $post_name]);
    }
    protected function validationOnlineApply($request){
        $this->validate($request,[
            'post_name'   => 'required|regex:/^[\pL\s\-]+/u',
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
            'photo'  => 'required|mimes:jpeg,png,jpg',
            'signature'  => 'required|mimes:jpeg,png,jpg',
        ]);
    }


    public function saveOnlineApply(Request $request){
        //$this->validationOnlineApply($request);

        if($request->hasFile('photo') && $request->hasFile('signature')) {

            $all_applications = $users = DB::table('online_applies')->where('post_id', '=', $request->post_id)->where('post_name', '=', $request->post_name)->get();

            foreach($all_applications as $application){
                if($application->full_name == $request->full_name && $application->father_name && $request->father_name && $application->mother_name == $request->mother_name && $application->dob == $request->dob && $application->mobile_number == $request->mobile_number && $application->email_address == $request->email_address){
                    return redirect('career')->with('message','Already applied this post');
                }
            }

            $photoData = Image::make($request->file('photo'));
            $signatureData = Image::make($request->file('signature'));
            $photoSize = $photoData->filesize();
            $signatureSize = $signatureData->filesize();
            //return [$photoSize,$signatureSize];

            if ($photoSize < 512000) {
                if ($signatureSize < 40960) {
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

                    DB::table('online_applies')->insert([

                        'unique_apply_id' => str_random(20),
                        'post_id' => $request->post_id,
                        'post_name' => $request->post_name,
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
                        'status' => 0,
                    ]);

                    return redirect('career')->with('message', 'Application Completed !');

                } else {
                    return redirect('career')->with('message', 'Large Signature Size ! Signature size less then 400 KB');
                }
            } else {
                return redirect('career')->with('message', 'Large Photo Size ! Photo size less then 500 KB');
            }
        }
    }
}
