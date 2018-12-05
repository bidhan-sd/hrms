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

    public function appliedListFilter(Request $request)  {
        //dd($request->all());
    if($request->filter_post_name){
        $total_experience = $request->filter_total_experience;
        $filter_skills    = $request->filter_skills;
        $filter_home_town = $request->filter_home_town;

        if($total_experience == null){
            $total_experience = false;
        }
        if($filter_skills == null){
            $filter_skills = false;
        }
        if($filter_home_town == null){
            $filter_home_town = false;
        }

        $applicants = DB::table('online_applies');

        $applicants->where('post_name',$request->filter_post_name);
        $applicants->where('status',0);

        if($total_experience == true) {
            $applicants->where('totalExperince', $request->filter_total_experience);
        }
        if($filter_skills == true) {
            $applicants->where('skills','like' , '%' . $request->filter_skills . '%');
        }
        if($filter_home_town == true) {
            $applicants->where('permanent_address','like' , '%' . $request->filter_home_town . '%');
        }
        if($request->filter_gender == true) {
            $applicants->where('gender', $request->filter_gender);
        }
        if($request->filter_religion == true) {
            $applicants->where('religion', $request->filter_religion);
        }
        if($request->filter_name_of_exam == true) {

            if($request->filter_name_of_exam == 'ssc' || $request->filter_name_of_exam == 'dakhil' || $request->filter_name_of_exam == 'o level'){
                $applicants->where('ssc_exam', $request->filter_name_of_exam);
            }
            if($request->filter_name_of_exam == 'hsc' || $request->filter_name_of_exam == 'alim' || $request->filter_name_of_exam == 'a level' || $request->filter_name_of_exam == 'diploma'){
                $applicants->where('hsc_exam', $request->filter_name_of_exam);
            }
            if($request->filter_name_of_exam == 'bsc honors' || $request->filter_name_of_exam == 'bsc eng' || $request->filter_name_of_exam == 'bcom honors' || $request->filter_name_of_exam == 'ba honors' || $request->filter_name_of_exam == 'bss honors' || $request->filter_name_of_exam == 'bbs honors' || $request->filter_name_of_exam == 'bed honors' || $request->filter_name_of_exam == 'llb honors' || $request->filter_name_of_exam == 'bba' || $request->filter_name_of_exam == 'bsc' || $request->filter_name_of_exam == 'bcom' || $request->filter_name_of_exam == 'ba' || $request->filter_name_of_exam == 'bss' || $request->filter_name_of_exam == 'bbs' || $request->filter_name_of_exam == 'bed' || $request->filter_name_of_exam == 'b.pharm' || $request->filter_name_of_exam == 'b others'){
                $applicants->where('honors_exam', $request->filter_name_of_exam);
            }
            if($request->filter_name_of_exam == 'MSc' || $request->filter_name_of_exam == 'MCom' || $request->filter_name_of_exam == 'MBS' || $request->filter_name_of_exam == 'MBA' || $request->filter_name_of_exam == 'MBM' || $request->filter_name_of_exam == 'MSS' || $request->filter_name_of_exam == 'MA' || $request->filter_name_of_exam == 'MEng' || $request->filter_name_of_exam == 'MEng' || $request->filter_name_of_exam == 'MSS' || $request->filter_name_of_exam == 'MDS' || $request->filter_name_of_exam == 'MED' || $request->filter_name_of_exam == 'M.Pharm' || $request->filter_name_of_exam == 'MOthers'){
                $applicants->where('post_graduation_exam', $request->filter_name_of_exam);
            }
        }

        if($request->filter_exam_group == true) {

            if( ( $request->filter_name_of_exam == 'ssc' || $request->filter_name_of_exam == 'dakhil' || $request->filter_name_of_exam == 'o level') && ( $request->filter_exam_group == 'science' || $request->filter_exam_group == 'commerce' || $request->filter_exam_group == 'arts' || $request->filter_exam_group == 'general' || $request->filter_exam_group == 'others') ) {
                $applicants->where('ssc_group', $request->filter_exam_group);
            }
            if( ( $request->filter_name_of_exam == 'hsc' || $request->filter_name_of_exam == 'alim' || $request->filter_name_of_exam == 'a level' || $request->filter_name_of_exam == 'diploma') && ( $request->filter_exam_group == 'science' || $request->filter_exam_group == 'commerce' || $request->filter_exam_group == 'arts' || $request->filter_exam_group == 'general' || $request->filter_exam_group == 'others') ) {
                $applicants->where('hsc_group', $request->filter_exam_group);
            }
            if( ( $request->filter_name_of_exam == 'bsc honors' || $request->filter_name_of_exam == 'bsc eng' || $request->filter_name_of_exam == 'bcom honors' || $request->filter_name_of_exam == 'ba honors' || $request->filter_name_of_exam == 'bss honors' || $request->filter_name_of_exam == 'bbs honors' || $request->filter_name_of_exam == 'bed honors' || $request->filter_name_of_exam == 'llb honors' || $request->filter_name_of_exam == 'bba' || $request->filter_name_of_exam == 'bsc' || $request->filter_name_of_exam == 'bcom' || $request->filter_name_of_exam == 'ba' || $request->filter_name_of_exam == 'bss' || $request->filter_name_of_exam == 'bbs' || $request->filter_name_of_exam == 'bed' ||  $request->filter_name_of_exam == 'b.pharm' || $request->filter_name_of_exam == 'b others')
                &&(
                    $request->filter_exam_group == 'Accounting & Information System' ||
                    $request->filter_exam_group == 'Accounting' ||
                    $request->filter_exam_group == 'Agribusiness And Marketing' ||
                    $request->filter_exam_group == 'Agricultural Botany' ||
                    $request->filter_exam_group == 'Agricultural Extension And Information System' ||
                    $request->filter_exam_group == 'Agricultural Extension And Rural Development' ||
                    $request->filter_exam_group == 'Agricultural Extension Education' ||
                    $request->filter_exam_group == 'Agricultural Statistics' ||
                    $request->filter_exam_group == 'Agriculture And Mineral Sciences' ||
                    $request->filter_exam_group == 'Agriculture Chemistry' ||
                    $request->filter_exam_group == 'Agriculture Co-Operatives' ||
                    $request->filter_exam_group == 'Agriculture Economics' ||
                    $request->filter_exam_group == 'Agriculture Engineering' ||
                    $request->filter_exam_group == 'Agriculture Finance' ||
                    $request->filter_exam_group == 'Agriculture Marketing' ||
                    $request->filter_exam_group == 'Agriculture Science' ||
                    $request->filter_exam_group == 'Agriculture Soil Science' ||
                    $request->filter_exam_group == 'Agriculture' ||
                    $request->filter_exam_group == 'Agroforestry' ||
                    $request->filter_exam_group == 'Agronomy And Agricultural Extension' ||
                    $request->filter_exam_group == 'Agronomy' ||
                    $request->filter_exam_group == 'Agrotechnology' ||
                    $request->filter_exam_group == 'Al-Fiqh' ||
                    $request->filter_exam_group == 'Al-Hadith And Islamic Studies' ||
                    $request->filter_exam_group == 'Al-Quran And Islamic Studies' ||
                    $request->filter_exam_group == 'Anatomy And Histology' ||
                    $request->filter_exam_group == 'Animal Husbandry And Veterinary Science' ||
                    $request->filter_exam_group == 'Animal Husbandry' ||
                    $request->filter_exam_group == 'Animal Nutrition' ||
                    $request->filter_exam_group == 'Animal Production And Biproduction Technology' ||
                    $request->filter_exam_group == 'Animal Production And Management' ||
                    $request->filter_exam_group == 'Animal Science And Nutrition' ||
                    $request->filter_exam_group == 'Animal Science' ||
                    $request->filter_exam_group == 'Anthropology' ||
                    $request->filter_exam_group == 'Applied And Environmental Chemistry' ||
                    $request->filter_exam_group == 'Applied Chemistry And Chemical Engineering' ||
                    $request->filter_exam_group == 'Applied Chemistry' ||
                    $request->filter_exam_group == 'Applied Linguisties & Elt' ||
                    $request->filter_exam_group == 'Applied Mathematics' ||
                    $request->filter_exam_group == 'Applied Physics And Electronic Engineering' ||
                    $request->filter_exam_group == 'Applied Physics' ||
                    $request->filter_exam_group == 'Applied Sciences And Technology' ||
                    $request->filter_exam_group == 'Applied Statistics' ||
                    $request->filter_exam_group == 'Aquaculture' ||
                    $request->filter_exam_group == 'Arabic' ||
                    $request->filter_exam_group == 'Archaeology' ||
                    $request->filter_exam_group == 'Architecture' ||
                    $request->filter_exam_group == 'Arts' ||
                    $request->filter_exam_group == 'Astronomy' ||
                    $request->filter_exam_group == 'Bangla' ||
                    $request->filter_exam_group == 'Banking And Insurance' ||
                    $request->filter_exam_group == 'Banking' ||
                    $request->filter_exam_group == 'Basic Science' ||
                    $request->filter_exam_group == 'Biochemistry And Food Analysis' ||
                    $request->filter_exam_group == 'Biochemistry And Molicular Biology' ||
                    $request->filter_exam_group == 'Biochemistry' ||
                    $request->filter_exam_group == 'Biomedical Engineering' ||
                    $request->filter_exam_group == 'Biomedical Phy And Tech' ||
                    $request->filter_exam_group == 'Biotechnology And Genetic Engineering' ||
                    $request->filter_exam_group == 'Biotechnology' ||
                    $request->filter_exam_group == 'Botany And Crop Science' ||
                    $request->filter_exam_group == 'Botany' ||
                    $request->filter_exam_group == 'Buddist Studies' ||
                    $request->filter_exam_group == 'Business Administration' ||
                    $request->filter_exam_group == 'Chemical' ||
                    $request->filter_exam_group == 'Chemistry' ||
                    $request->filter_exam_group == 'Civil' ||
                    $request->filter_exam_group == 'Clinical Psychology' ||
                    $request->filter_exam_group == 'Communication Disorder' ||
                    $request->filter_exam_group == 'Community Health And Hygiene' ||
                    $request->filter_exam_group == 'Computer Science And Eng.' ||
                    $request->filter_exam_group == 'Computer Science' ||
                    $request->filter_exam_group == 'Criminology And Police Science' ||
                    $request->filter_exam_group == 'Criminology' ||
                    $request->filter_exam_group == 'Crop Botany' ||
                    $request->filter_exam_group == 'Crop Science And Technology' ||
                    $request->filter_exam_group == 'Dairy Science' ||
                    $request->filter_exam_group == 'Dawah And Islamic Studies' ||
                    $request->filter_exam_group == 'Development And Proverty Studies' ||
                    $request->filter_exam_group == 'Development Studies' ||
                    $request->filter_exam_group == 'Disaster Management' ||
                    $request->filter_exam_group == 'Disaster Risk Mgt' ||
                    $request->filter_exam_group == 'Drama And Dramatics' ||
                    $request->filter_exam_group == 'Drama And Music' ||
                    $request->filter_exam_group == 'Drama' ||
                    $request->filter_exam_group == 'Ecology' ||
                    $request->filter_exam_group == 'Economics And Sociology' ||
                    $request->filter_exam_group == 'Economics' ||
                    $request->filter_exam_group == 'Education' ||
                    $request->filter_exam_group == 'Electrical And Electronics' ||
                    $request->filter_exam_group == 'Electrical' ||
                    $request->filter_exam_group == 'Electronics And Communication Engineering' ||
                    $request->filter_exam_group == 'Electronics' ||
                    $request->filter_exam_group == 'Emergency Mgt' ||
                    $request->filter_exam_group == 'Engineering' ||
                    $request->filter_exam_group == 'English' ||
                    $request->filter_exam_group == 'Entomology' ||
                    $request->filter_exam_group == 'Environmental Sanitation' ||
                    $request->filter_exam_group == 'Environmental Science And Resource Management' ||
                    $request->filter_exam_group == 'Environmental Science' ||
                    $request->filter_exam_group == 'Epidemiology' ||
                    $request->filter_exam_group == 'Farm Power And Machinery' ||
                    $request->filter_exam_group == 'Farm Stucture And Environmental Engineering' ||
                    $request->filter_exam_group == 'Farsi Language And Literature' ||
                    $request->filter_exam_group == 'Fesheries Technology' ||
                    $request->filter_exam_group == 'Finance And Banking' ||
                    $request->filter_exam_group == 'Finance' ||
                    $request->filter_exam_group == 'Fine Art' ||
                    $request->filter_exam_group == 'Fisheries And Marine Technology' ||
                    $request->filter_exam_group == 'Fisheries Biology And Genetics' ||
                    $request->filter_exam_group == 'Fisheries Mgt' ||
                    $request->filter_exam_group == 'Fisheries' ||
                    $request->filter_exam_group == 'Folklore' ||
                    $request->filter_exam_group == 'Food And Nutrition' ||
                    $request->filter_exam_group == 'Food Technology And Engineering' ||
                    $request->filter_exam_group == 'Food Technology And Nutritional Science' ||
                    $request->filter_exam_group == 'Food Technology And Rural Industries' ||
                    $request->filter_exam_group == 'Foood Microbiology' ||
                    $request->filter_exam_group == 'Forestry And Environmental Sciences' ||
                    $request->filter_exam_group == 'Forestry' ||
                    $request->filter_exam_group == 'Foresty And Wood Technology' ||
                    $request->filter_exam_group == 'Genetic Engineering And Biotechnology' ||
                    $request->filter_exam_group == 'Genetics And Animal Breeding' ||
                    $request->filter_exam_group == 'Genetics And Plant Breeding' ||
                    $request->filter_exam_group == 'Genetics' ||
                    $request->filter_exam_group == 'Geo Information' ||
                    $request->filter_exam_group == 'Geochemistry' ||
                    $request->filter_exam_group == 'Geography' ||
                    $request->filter_exam_group == 'Geological Sciences' ||
                    $request->filter_exam_group == 'Geology And Mining' ||
                    $request->filter_exam_group == 'Geology' ||
                    $request->filter_exam_group == 'Glass And Ceramic Engineering' ||
                    $request->filter_exam_group == 'Government And Politics' ||
                    $request->filter_exam_group == 'Health Economics' ||
                    $request->filter_exam_group == 'History' ||
                    $request->filter_exam_group == 'Home Economics' ||
                    $request->filter_exam_group == 'Homeopathy' ||
                    $request->filter_exam_group == 'Horticulture' ||
                    $request->filter_exam_group == 'Human Nurition And Dietetics' ||
                    $request->filter_exam_group == 'Human Resource Management' ||
                    $request->filter_exam_group == 'Human Right' ||
                    $request->filter_exam_group == 'Humanities(Hum)' ||
                    $request->filter_exam_group == 'Industrial Production Engineering(Ipe)' ||
                    $request->filter_exam_group == 'Industrial' ||
                    $request->filter_exam_group == 'Info. Sc. And  Library Management' ||
                    $request->filter_exam_group == 'Information And Commun Eng' ||
                    $request->filter_exam_group == 'International Business' ||
                    $request->filter_exam_group == 'International Relation' ||
                    $request->filter_exam_group == 'Irrigation And Water Management' ||
                    $request->filter_exam_group == 'Is And Library Mgt' ||
                    $request->filter_exam_group == 'Islamic History And Culture' ||
                    $request->filter_exam_group == 'Islamic Philosophy' ||
                    $request->filter_exam_group == 'Islamic Studies' ||
                    $request->filter_exam_group == 'Journalism And Media Studies' ||
                    $request->filter_exam_group == 'Journalism' ||
                    $request->filter_exam_group == 'Laguages' ||
                    $request->filter_exam_group == 'Law And Muslim Jurisprudence' ||
                    $request->filter_exam_group == 'Law' ||
                    $request->filter_exam_group == 'Leather Technology' ||
                    $request->filter_exam_group == 'Life Sciences' ||
                    $request->filter_exam_group == 'Linguistics' ||
                    $request->filter_exam_group == 'Livestock' ||
                    $request->filter_exam_group == 'Management And Business Administration' ||
                    $request->filter_exam_group == 'Management And Finance' ||
                    $request->filter_exam_group == 'Management Information System' ||
                    $request->filter_exam_group == 'Management' ||
                    $request->filter_exam_group == 'Marine Fisheries And Oceanography' ||
                    $request->filter_exam_group == 'Marine' ||
                    $request->filter_exam_group == 'Marketing' ||
                    $request->filter_exam_group == 'Mass Commn. And Journalism' ||
                    $request->filter_exam_group == 'Materials And Metallurgical Engineering(Mme)' ||
                    $request->filter_exam_group == 'Materials Science' ||
                    $request->filter_exam_group == 'Mathematics' ||
                    $request->filter_exam_group == 'Mbm' ||
                    $request->filter_exam_group == 'Mechanical' ||
                    $request->filter_exam_group == 'Media And Journalism' ||
                    $request->filter_exam_group == 'Medical Sciences' ||
                    $request->filter_exam_group == 'Medicine Surgery And Obstetrics' ||
                    $request->filter_exam_group == 'Medicine' ||
                    $request->filter_exam_group == 'Microbiology And Virology' ||
                    $request->filter_exam_group == 'Microbiology' ||
                    $request->filter_exam_group == 'Modern Language' ||
                    $request->filter_exam_group == 'Music' ||
                    $request->filter_exam_group == 'Naval Architecture And Marine Engineering(Name)' ||
                    $request->filter_exam_group == 'Neuroscience' ||
                    $request->filter_exam_group == 'Nutrition And Food Technology' ||
                    $request->filter_exam_group == 'Pali(Oriental Language)' ||
                    $request->filter_exam_group == 'Parasitology' ||
                    $request->filter_exam_group == 'Pathology And Paracytology' ||
                    $request->filter_exam_group == 'Pathology' ||
                    $request->filter_exam_group == 'Peace And Conflict' ||
                    $request->filter_exam_group == 'Persian Language And Literature' ||
                    $request->filter_exam_group == 'Petroleum And Mineral Resources Engineering(Pmre)' ||
                    $request->filter_exam_group == 'Petroleum And Mining Engineering(Pme)' ||
                    $request->filter_exam_group == 'Pharmacology And Toxicology' ||
                    $request->filter_exam_group == 'Pharmacology' ||
                    $request->filter_exam_group == 'Pharmacy' ||
                    $request->filter_exam_group == 'Philosophy' ||
                    $request->filter_exam_group == 'Physical Education And Sports Science(Pess)' ||
                    $request->filter_exam_group == 'Physical Science' ||
                    $request->filter_exam_group == 'Physics' ||
                    $request->filter_exam_group == 'Physiology And Pharmacology' ||
                    $request->filter_exam_group == 'Physiology' ||
                    $request->filter_exam_group == 'Plant Pathology' ||
                    $request->filter_exam_group == 'Political Science' ||
                    $request->filter_exam_group == 'Political Studies And Public Adm' ||
                    $request->filter_exam_group == 'Population Science And Human Resource Development' ||
                    $request->filter_exam_group == 'Population Science' ||
                    $request->filter_exam_group == 'Post Havest Technology' ||
                    $request->filter_exam_group == 'Poultry Science' ||
                    $request->filter_exam_group == 'Production Economics' ||
                    $request->filter_exam_group == 'Psychology' ||
                    $request->filter_exam_group == 'Public Administration' ||
                    $request->filter_exam_group == 'Public Finance' ||
                    $request->filter_exam_group == 'Public Health' ||
                    $request->filter_exam_group == 'Resource Mgt' ||
                    $request->filter_exam_group == 'Sanskrit' ||
                    $request->filter_exam_group == 'Seed Science And Technology' ||
                    $request->filter_exam_group == 'Social Science' ||
                    $request->filter_exam_group == 'Social Studies' ||
                    $request->filter_exam_group == 'Social Welfare' ||
                    $request->filter_exam_group == 'Social Work' ||
                    $request->filter_exam_group == 'Sociology' ||
                    $request->filter_exam_group == 'Soil Science' ||
                    $request->filter_exam_group == 'Statistics' ||
                    $request->filter_exam_group == 'Surgery And Obstetrics' ||
                    $request->filter_exam_group == 'Surgery And Theriogenology' ||
                    $request->filter_exam_group == 'Television And Film' ||
                    $request->filter_exam_group == 'Textile Technology' ||
                    $request->filter_exam_group == 'Theatre And Performance Studies' ||
                    $request->filter_exam_group == 'Theatre' ||
                    $request->filter_exam_group == 'Tourism And Hospitality Mgt' ||
                    $request->filter_exam_group == 'Urban And Regional Planning(Urp)' ||
                    $request->filter_exam_group == 'Urban And Rural Planning' ||
                    $request->filter_exam_group == 'Urdu' ||
                    $request->filter_exam_group == 'Vetenary Science' ||
                    $request->filter_exam_group == 'Water Resources Engineering(Wre)' ||
                    $request->filter_exam_group == 'Water Science' ||
                    $request->filter_exam_group == 'Womens And Gender' ||
                    $request->filter_exam_group == 'World Religions And Culture' ||
                    $request->filter_exam_group == 'Zoology' ||
                    $request->filter_exam_group == 'Others'
                )
            ) {
                $applicants->where('honors_group', $request->filter_exam_group);
            }
            if( ( $request->filter_name_of_exam == 'MSc' || $request->filter_name_of_exam == 'MCom' || $request->filter_name_of_exam == 'MBS' || $request->filter_name_of_exam == 'MBA' || $request->filter_name_of_exam == 'MBM' || $request->filter_name_of_exam == 'MSS' || $request->filter_name_of_exam == 'MA' || $request->filter_name_of_exam == 'MEng' || $request->filter_name_of_exam == 'MSS' || $request->filter_name_of_exam == 'MDS' || $request->filter_name_of_exam == 'MED' || $request->filter_name_of_exam == 'M.Pharm' || $request->filter_name_of_exam == 'MOthers' )
                &&(
                    $request->filter_exam_group == 'Accounting & Information System' ||
                    $request->filter_exam_group == 'Accounting' ||
                    $request->filter_exam_group == 'Agribusiness And Marketing' ||
                    $request->filter_exam_group == 'Agricultural Botany' ||
                    $request->filter_exam_group == 'Agricultural Extension And Information System' ||
                    $request->filter_exam_group == 'Agricultural Extension And Rural Development' ||
                    $request->filter_exam_group == 'Agricultural Extension Education' ||
                    $request->filter_exam_group == 'Agricultural Statistics' ||
                    $request->filter_exam_group == 'Agriculture And Mineral Sciences' ||
                    $request->filter_exam_group == 'Agriculture Chemistry' ||
                    $request->filter_exam_group == 'Agriculture Co-Operatives' ||
                    $request->filter_exam_group == 'Agriculture Economics' ||
                    $request->filter_exam_group == 'Agriculture Engineering' ||
                    $request->filter_exam_group == 'Agriculture Finance' ||
                    $request->filter_exam_group == 'Agriculture Marketing' ||
                    $request->filter_exam_group == 'Agriculture Science' ||
                    $request->filter_exam_group == 'Agriculture Soil Science' ||
                    $request->filter_exam_group == 'Agriculture' ||
                    $request->filter_exam_group == 'Agroforestry' ||
                    $request->filter_exam_group == 'Agronomy And Agricultural Extension' ||
                    $request->filter_exam_group == 'Agronomy' ||
                    $request->filter_exam_group == 'Agrotechnology' ||
                    $request->filter_exam_group == 'Al-Fiqh' ||
                    $request->filter_exam_group == 'Al-Hadith And Islamic Studies' ||
                    $request->filter_exam_group == 'Al-Quran And Islamic Studies' ||
                    $request->filter_exam_group == 'Anatomy And Histology' ||
                    $request->filter_exam_group == 'Animal Husbandry And Veterinary Science' ||
                    $request->filter_exam_group == 'Animal Husbandry' ||
                    $request->filter_exam_group == 'Animal Nutrition' ||
                    $request->filter_exam_group == 'Animal Production And Biproduction Technology' ||
                    $request->filter_exam_group == 'Animal Production And Management' ||
                    $request->filter_exam_group == 'Animal Science And Nutrition' ||
                    $request->filter_exam_group == 'Animal Science' ||
                    $request->filter_exam_group == 'Anthropology' ||
                    $request->filter_exam_group == 'Applied And Environmental Chemistry' ||
                    $request->filter_exam_group == 'Applied Chemistry And Chemical Engineering' ||
                    $request->filter_exam_group == 'Applied Chemistry' ||
                    $request->filter_exam_group == 'Applied Linguisties & Elt' ||
                    $request->filter_exam_group == 'Applied Mathematics' ||
                    $request->filter_exam_group == 'Applied Physics And Electronic Engineering' ||
                    $request->filter_exam_group == 'Applied Physics' ||
                    $request->filter_exam_group == 'Applied Sciences And Technology' ||
                    $request->filter_exam_group == 'Applied Statistics' ||
                    $request->filter_exam_group == 'Aquaculture' ||
                    $request->filter_exam_group == 'Arabic' ||
                    $request->filter_exam_group == 'Archaeology' ||
                    $request->filter_exam_group == 'Architecture' ||
                    $request->filter_exam_group == 'Arts' ||
                    $request->filter_exam_group == 'Astronomy' ||
                    $request->filter_exam_group == 'Bangla' ||
                    $request->filter_exam_group == 'Banking And Insurance' ||
                    $request->filter_exam_group == 'Banking' ||
                    $request->filter_exam_group == 'Basic Science' ||
                    $request->filter_exam_group == 'Biochemistry And Food Analysis' ||
                    $request->filter_exam_group == 'Biochemistry And Molicular Biology' ||
                    $request->filter_exam_group == 'Biochemistry' ||
                    $request->filter_exam_group == 'Biomedical Engineering' ||
                    $request->filter_exam_group == 'Biomedical Phy And Tech' ||
                    $request->filter_exam_group == 'Biotechnology And Genetic Engineering' ||
                    $request->filter_exam_group == 'Biotechnology' ||
                    $request->filter_exam_group == 'Botany And Crop Science' ||
                    $request->filter_exam_group == 'Botany' ||
                    $request->filter_exam_group == 'Buddist Studies' ||
                    $request->filter_exam_group == 'Business Administration' ||
                    $request->filter_exam_group == 'Chemical' ||
                    $request->filter_exam_group == 'Chemistry' ||
                    $request->filter_exam_group == 'Civil' ||
                    $request->filter_exam_group == 'Clinical Psychology' ||
                    $request->filter_exam_group == 'Communication Disorder' ||
                    $request->filter_exam_group == 'Community Health And Hygiene' ||
                    $request->filter_exam_group == 'Computer Science And Eng.' ||
                    $request->filter_exam_group == 'Computer Science' ||
                    $request->filter_exam_group == 'Criminology And Police Science' ||
                    $request->filter_exam_group == 'Criminology' ||
                    $request->filter_exam_group == 'Crop Botany' ||
                    $request->filter_exam_group == 'Crop Science And Technology' ||
                    $request->filter_exam_group == 'Dairy Science' ||
                    $request->filter_exam_group == 'Dawah And Islamic Studies' ||
                    $request->filter_exam_group == 'Development And Proverty Studies' ||
                    $request->filter_exam_group == 'Development Studies' ||
                    $request->filter_exam_group == 'Disaster Management' ||
                    $request->filter_exam_group == 'Disaster Risk Mgt' ||
                    $request->filter_exam_group == 'Drama And Dramatics' ||
                    $request->filter_exam_group == 'Drama And Music' ||
                    $request->filter_exam_group == 'Drama' ||
                    $request->filter_exam_group == 'Ecology' ||
                    $request->filter_exam_group == 'Economics And Sociology' ||
                    $request->filter_exam_group == 'Economics' ||
                    $request->filter_exam_group == 'Education' ||
                    $request->filter_exam_group == 'Electrical And Electronics' ||
                    $request->filter_exam_group == 'Electrical' ||
                    $request->filter_exam_group == 'Electronics And Communication Engineering' ||
                    $request->filter_exam_group == 'Electronics' ||
                    $request->filter_exam_group == 'Emergency Mgt' ||
                    $request->filter_exam_group == 'Engineering' ||
                    $request->filter_exam_group == 'English' ||
                    $request->filter_exam_group == 'Entomology' ||
                    $request->filter_exam_group == 'Environmental Sanitation' ||
                    $request->filter_exam_group == 'Environmental Science And Resource Management' ||
                    $request->filter_exam_group == 'Environmental Science' ||
                    $request->filter_exam_group == 'Epidemiology' ||
                    $request->filter_exam_group == 'Farm Power And Machinery' ||
                    $request->filter_exam_group == 'Farm Stucture And Environmental Engineering' ||
                    $request->filter_exam_group == 'Farsi Language And Literature' ||
                    $request->filter_exam_group == 'Fesheries Technology' ||
                    $request->filter_exam_group == 'Finance And Banking' ||
                    $request->filter_exam_group == 'Finance' ||
                    $request->filter_exam_group == 'Fine Art' ||
                    $request->filter_exam_group == 'Fisheries And Marine Technology' ||
                    $request->filter_exam_group == 'Fisheries Biology And Genetics' ||
                    $request->filter_exam_group == 'Fisheries Mgt' ||
                    $request->filter_exam_group == 'Fisheries' ||
                    $request->filter_exam_group == 'Folklore' ||
                    $request->filter_exam_group == 'Food And Nutrition' ||
                    $request->filter_exam_group == 'Food Technology And Engineering' ||
                    $request->filter_exam_group == 'Food Technology And Nutritional Science' ||
                    $request->filter_exam_group == 'Food Technology And Rural Industries' ||
                    $request->filter_exam_group == 'Foood Microbiology' ||
                    $request->filter_exam_group == 'Forestry And Environmental Sciences' ||
                    $request->filter_exam_group == 'Forestry' ||
                    $request->filter_exam_group == 'Foresty And Wood Technology' ||
                    $request->filter_exam_group == 'Genetic Engineering And Biotechnology' ||
                    $request->filter_exam_group == 'Genetics And Animal Breeding' ||
                    $request->filter_exam_group == 'Genetics And Plant Breeding' ||
                    $request->filter_exam_group == 'Genetics' ||
                    $request->filter_exam_group == 'Geo Information' ||
                    $request->filter_exam_group == 'Geochemistry' ||
                    $request->filter_exam_group == 'Geography' ||
                    $request->filter_exam_group == 'Geological Sciences' ||
                    $request->filter_exam_group == 'Geology And Mining' ||
                    $request->filter_exam_group == 'Geology' ||
                    $request->filter_exam_group == 'Glass And Ceramic Engineering' ||
                    $request->filter_exam_group == 'Government And Politics' ||
                    $request->filter_exam_group == 'Health Economics' ||
                    $request->filter_exam_group == 'History' ||
                    $request->filter_exam_group == 'Home Economics' ||
                    $request->filter_exam_group == 'Homeopathy' ||
                    $request->filter_exam_group == 'Horticulture' ||
                    $request->filter_exam_group == 'Human Nurition And Dietetics' ||
                    $request->filter_exam_group == 'Human Resource Management' ||
                    $request->filter_exam_group == 'Human Right' ||
                    $request->filter_exam_group == 'Humanities(Hum)' ||
                    $request->filter_exam_group == 'Industrial Production Engineering(Ipe)' ||
                    $request->filter_exam_group == 'Industrial' ||
                    $request->filter_exam_group == 'Info. Sc. And  Library Management' ||
                    $request->filter_exam_group == 'Information And Commun Eng' ||
                    $request->filter_exam_group == 'International Business' ||
                    $request->filter_exam_group == 'International Relation' ||
                    $request->filter_exam_group == 'Irrigation And Water Management' ||
                    $request->filter_exam_group == 'Is And Library Mgt' ||
                    $request->filter_exam_group == 'Islamic History And Culture' ||
                    $request->filter_exam_group == 'Islamic Philosophy' ||
                    $request->filter_exam_group == 'Islamic Studies' ||
                    $request->filter_exam_group == 'Journalism And Media Studies' ||
                    $request->filter_exam_group == 'Journalism' ||
                    $request->filter_exam_group == 'Laguages' ||
                    $request->filter_exam_group == 'Law And Muslim Jurisprudence' ||
                    $request->filter_exam_group == 'Law' ||
                    $request->filter_exam_group == 'Leather Technology' ||
                    $request->filter_exam_group == 'Life Sciences' ||
                    $request->filter_exam_group == 'Linguistics' ||
                    $request->filter_exam_group == 'Livestock' ||
                    $request->filter_exam_group == 'Management And Business Administration' ||
                    $request->filter_exam_group == 'Management And Finance' ||
                    $request->filter_exam_group == 'Management Information System' ||
                    $request->filter_exam_group == 'Management' ||
                    $request->filter_exam_group == 'Marine Fisheries And Oceanography' ||
                    $request->filter_exam_group == 'Marine' ||
                    $request->filter_exam_group == 'Marketing' ||
                    $request->filter_exam_group == 'Mass Commn. And Journalism' ||
                    $request->filter_exam_group == 'Materials And Metallurgical Engineering(Mme)' ||
                    $request->filter_exam_group == 'Materials Science' ||
                    $request->filter_exam_group == 'Mathematics' ||
                    $request->filter_exam_group == 'Mbm' ||
                    $request->filter_exam_group == 'Mechanical' ||
                    $request->filter_exam_group == 'Media And Journalism' ||
                    $request->filter_exam_group == 'Medical Sciences' ||
                    $request->filter_exam_group == 'Medicine Surgery And Obstetrics' ||
                    $request->filter_exam_group == 'Medicine' ||
                    $request->filter_exam_group == 'Microbiology And Virology' ||
                    $request->filter_exam_group == 'Microbiology' ||
                    $request->filter_exam_group == 'Modern Language' ||
                    $request->filter_exam_group == 'Music' ||
                    $request->filter_exam_group == 'Naval Architecture And Marine Engineering(Name)' ||
                    $request->filter_exam_group == 'Neuroscience' ||
                    $request->filter_exam_group == 'Nutrition And Food Technology' ||
                    $request->filter_exam_group == 'Pali(Oriental Language)' ||
                    $request->filter_exam_group == 'Parasitology' ||
                    $request->filter_exam_group == 'Pathology And Paracytology' ||
                    $request->filter_exam_group == 'Pathology' ||
                    $request->filter_exam_group == 'Peace And Conflict' ||
                    $request->filter_exam_group == 'Persian Language And Literature' ||
                    $request->filter_exam_group == 'Petroleum And Mineral Resources Engineering(Pmre)' ||
                    $request->filter_exam_group == 'Petroleum And Mining Engineering(Pme)' ||
                    $request->filter_exam_group == 'Pharmacology And Toxicology' ||
                    $request->filter_exam_group == 'Pharmacology' ||
                    $request->filter_exam_group == 'Pharmacy' ||
                    $request->filter_exam_group == 'Philosophy' ||
                    $request->filter_exam_group == 'Physical Education And Sports Science(Pess)' ||
                    $request->filter_exam_group == 'Physical Science' ||
                    $request->filter_exam_group == 'Physics' ||
                    $request->filter_exam_group == 'Physiology And Pharmacology' ||
                    $request->filter_exam_group == 'Physiology' ||
                    $request->filter_exam_group == 'Plant Pathology' ||
                    $request->filter_exam_group == 'Political Science' ||
                    $request->filter_exam_group == 'Political Studies And Public Adm' ||
                    $request->filter_exam_group == 'Population Science And Human Resource Development' ||
                    $request->filter_exam_group == 'Population Science' ||
                    $request->filter_exam_group == 'Post Havest Technology' ||
                    $request->filter_exam_group == 'Poultry Science' ||
                    $request->filter_exam_group == 'Production Economics' ||
                    $request->filter_exam_group == 'Psychology' ||
                    $request->filter_exam_group == 'Public Administration' ||
                    $request->filter_exam_group == 'Public Finance' ||
                    $request->filter_exam_group == 'Public Health' ||
                    $request->filter_exam_group == 'Resource Mgt' ||
                    $request->filter_exam_group == 'Sanskrit' ||
                    $request->filter_exam_group == 'Seed Science And Technology' ||
                    $request->filter_exam_group == 'Social Science' ||
                    $request->filter_exam_group == 'Social Studies' ||
                    $request->filter_exam_group == 'Social Welfare' ||
                    $request->filter_exam_group == 'Social Work' ||
                    $request->filter_exam_group == 'Sociology' ||
                    $request->filter_exam_group == 'Soil Science' ||
                    $request->filter_exam_group == 'Statistics' ||
                    $request->filter_exam_group == 'Surgery And Obstetrics' ||
                    $request->filter_exam_group == 'Surgery And Theriogenology' ||
                    $request->filter_exam_group == 'Television And Film' ||
                    $request->filter_exam_group == 'Textile Technology' ||
                    $request->filter_exam_group == 'Theatre And Performance Studies' ||
                    $request->filter_exam_group == 'Theatre' ||
                    $request->filter_exam_group == 'Tourism And Hospitality Mgt' ||
                    $request->filter_exam_group == 'Urban And Regional Planning(Urp)' ||
                    $request->filter_exam_group == 'Urban And Rural Planning' ||
                    $request->filter_exam_group == 'Urdu' ||
                    $request->filter_exam_group == 'Vetenary Science' ||
                    $request->filter_exam_group == 'Water Resources Engineering(Wre)' ||
                    $request->filter_exam_group == 'Water Science' ||
                    $request->filter_exam_group == 'Womens And Gender' ||
                    $request->filter_exam_group == 'World Religions And Culture' ||
                    $request->filter_exam_group == 'Zoology' ||
                    $request->filter_exam_group == 'Others'
                ) ) {
                $applicants->where('post_graduation_group', $request->filter_exam_group);
            }
        }

        $applicants = $applicants->get();

        //dd($applicants->toSql(), $applicants->getBindings());
        //dd($applicants->get());
        return view('back-end.applied-list.searchList',[
            'applicants'=> $applicants
        ]);

       }else{
           return back()->with("message","You must have select post name !");
       }

    }
}
