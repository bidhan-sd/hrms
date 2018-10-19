<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdvertisementController extends Controller {

    public function manageAdvertisement(){
        $advertisements = DB::table('advertisements')
            ->select('id', 'post_name','advertisement_date','deadline','publication_status')
            ->orderBy('id', 'desc')
            ->get();
        return view('back-end.advertisement.manage', [
            'advertisements'=>$advertisements
        ]);
    }

    public function createAdvertisement(){
        return view('back-end.advertisement.index');
    }

    protected function advertisementInfoValidate($request){
        $this->validate($request,[
            'post_name' => 'required|regex:/^[\pL\s\-]+/u',
            'company_name' => 'required|regex:/^[\pL\s\-]+/u',
            'vacancy' => 'required|numeric|min:1',
            'job_responsibilities' => 'required',
            'employee_status' => 'required|regex:/^[\pL\s\-]+/u',
            'educational_requirement' => 'required',
            'experience_requirement' => 'required',
            'additional_requirement' => 'required',
            'gender' => 'required',
            'job_location' => 'required|regex:/^[\pL\s\-]+/u',
            'salary' => 'required',
            'other_benefit' => 'required',
            'advertisement_date' => 'required',
            'deadline' => 'required',
            'company_info' => 'required',
            'publication_status' => 'required',
        ]);
    }

    protected function saveAdvertisementInfo($request){
        DB::table('advertisements')->insert([
            'post_name' => $request->post_name,
            'company_name' => $request->company_name,
            'vacancy' => $request->vacancy,
            'job_responsibilities' => $request->job_responsibilities,
            'employee_status' => $request->employee_status,
            'educational_requirement' => $request->educational_requirement,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'gender' => $request->gender,
            'job_location' => $request->job_location,
            'salary' => $request->salary,
            'other_benefit' => $request->other_benefit,
            'advertisement_date' => $request->advertisement_date,
            'deadline' => $request->deadline,
            'company_info' => $request->company_info,
            'publication_status' => $request->publication_status,
        ]);
    }

    public function saveAdvertisement(Request $request){
        $this->advertisementInfoValidate($request);
        $this->saveAdvertisementInfo($request);
        return redirect('create-advertisement')->with('message','Advertisement Info Saved!');
    }

    public function singleAdvertisement($id){
        $advertisement = DB::table('advertisements')->select()->where('id', '=', $id)->first();
        return view('back-end.advertisement.single',['advertisement'=>$advertisement]);
    }

    public function unpublishedAdvertisement($id){
        DB::table('advertisements')->where('id', $id)->update(['publication_status' => 0]);
        return redirect('manage-advertisement')->with('message','Unpublished Advertisement!');
    }

    public function publishedAdvertisement($id){
        DB::table('advertisements')->where('id', $id)->update(['publication_status' => 1]);
        return redirect('manage-advertisement')->with('message','Published Advertisement!');
    }

    public function editAdvertisement($id){
        $singleAdvertisement = DB::table('advertisements')->select()->where('id', $id)->first();
        return view('back-end.advertisement.edit',['singleAdvertisement'=> $singleAdvertisement]);
    }

    protected function updateAdvertisementInfo($request){
        DB::table('advertisements')->where('id',$request->id)->update([
            'post_name' => $request->post_name,
            'company_name' => $request->company_name,
            'vacancy' => $request->vacancy,
            'job_responsibilities' => $request->job_responsibilities,
            'employee_status' => $request->employee_status,
            'educational_requirement' => $request->educational_requirement,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'gender' => $request->gender,
            'job_location' => $request->job_location,
            'salary' => $request->salary,
            'other_benefit' => $request->other_benefit,
            'advertisement_date' => $request->advertisement_date,
            'deadline' => $request->deadline,
            'company_info' => $request->company_info,
            'publication_status' => $request->publication_status,
        ]);
    }

    public function updateAdvertisement(Request $request){
        $this->advertisementInfoValidate($request);
        $this->updateAdvertisementInfo($request);
        return redirect('manage-advertisement')->with('message','Advertisement Updated!');
    }

    public function deleteAdvertisement($id){
        DB::table('advertisements')->where('id', '=', $id)->delete();
        return redirect('manage-advertisement')->with('message','Advertisements Deleted.');
    }

    public function appliedList(){
        $applied_lists = DB::table('online_applies')
            ->select('id', 'unique_apply_id','post_id','post_name','totalExperince','skills','photo')
            ->where('status', '=', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('back-end.applied-list.manage',[
            'applied_lists'=>$applied_lists
        ]);
    }

    public function saveShortList(Request $request){
        $shortListIds = $request->checkSingle;
        //dd($shortListIds);
        foreach($shortListIds as $shortListId){

            DB::table('online_applies')->where('id',$shortListId)->update([
                'status' => 1,
            ]);
        }

        foreach($shortListIds as $shortListId){
            DB::table('short_lists')->insert([
                'online_applied_id' => $shortListId,
                'publication_status' => 0,
            ]);
        }

        return back()->with('message',"Send to Short List !");
    }

    public function shortList(){

        $shortLists = DB::table('short_lists')
            ->leftJoin('online_applies', 'online_applies.id', '=', 'short_lists.online_applied_id')
            ->where('status','=',1)
            ->where('publication_status','=',0)
            ->get();

        //return $shortLists;

        return view('back-end.applied-list.shortList',[
            'shortLists'=>$shortLists
        ]);
    }

    public function saveWrittenList(Request $request){
        $writtenListIds = $request->checkSingle;
        //dd($shortListIds);
        foreach($writtenListIds as $writtenListId){

            DB::table('online_applies')->where('id',$writtenListId)->update([
                'status' => 2,
            ]);
        }

        foreach($writtenListIds as $writtenListId){
            DB::table('short_lists')->where('online_applied_id',$writtenListId)->update([
                'publication_status' => 1,
            ]);
        }

        foreach($writtenListIds as $writtenListId){
            DB::table('written_lists')->insert([
                'online_applied_id' => $writtenListId,
                'publication_status' => 0,
            ]);
        }

        return back()->with('message',"Send to Written List");
    }


    public function writtentList(){

        $writtenLists = DB::table('written_lists')
            ->leftJoin('online_applies', 'online_applies.id', '=', 'written_lists.online_applied_id')
            ->where('status','=',2)
            ->where('publication_status','=',0)
            ->get();

        //return $shortLists;

        return view('back-end.applied-list.writtenList',[
            'writtenLists'=>$writtenLists
        ]);
    }


    public function saveVavaList(Request $request){

        $vivaListIds = $request->checkSingle;
        //dd($vivaListIds);
        foreach($vivaListIds as $vivaListId){

            DB::table('online_applies')->where('id',$vivaListId)->update([
                'status' => 3,
            ]);
        }

        foreach($vivaListIds as $vivaListId){
            DB::table('written_lists')->where('online_applied_id',$vivaListId)->update([
                'publication_status' => 1,
            ]);
        }

        foreach($vivaListIds as $vivaListId){
            DB::table('viva_lists')->insert([
                'online_applied_id' => $vivaListId,
                'publication_status' => 0,
            ]);
        }

        return back()->with('message',"Send to Viva List");
    }

    public function vivaList(){

        $vivaLists = DB::table('viva_lists')
            ->leftJoin('online_applies', 'online_applies.id', '=', 'viva_lists.online_applied_id')
            ->where('status','=',3)
            ->where('publication_status','=',0)
            ->get();

        //return $vivaLists;

        return view('back-end.applied-list.vivaList',[
            'vivaLists'=>$vivaLists
        ]);
    }
    public function saveFinalList(Request $request){

        $finalListIds = $request->checkSingle;
        //dd($vivaListIds);
        foreach($finalListIds as $finalListId){

            DB::table('online_applies')->where('id',$finalListId)->update([
                'status' => 4,
            ]);
        }

        foreach($finalListIds as $finalListId){
            DB::table('viva_lists')->where('online_applied_id',$finalListId)->update([
                'publication_status' => 1,
            ]);
        }

        foreach($finalListIds as $finalListId){
            DB::table('final_lists')->insert([
                'online_applied_id' => $finalListId,
                'publication_status' => 0,
            ]);
        }

        return back()->with('message',"Send to Final List");
    }

    public function finalList(){

        $finalLists = DB::table('final_lists')
            ->leftJoin('online_applies', 'online_applies.id', '=', 'final_lists.online_applied_id')
            ->where('status','=',4)
            ->where('publication_status','=',0)
            ->get();

        //return $vivaLists;

        return view('back-end.applied-list.finalList',[
            'finalLists'=>$finalLists
        ]);
    }
}
