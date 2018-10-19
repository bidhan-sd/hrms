@extends('front-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="applyOnlineContent">
                    {{ Form::open(['route'=>'save-onlineApply-one','method'=>'POST','class'=>'form-horizontal','name'=>'onlineApplyFormTwo','id'=>'onlineApplyFormTwo']) }}
                    <div class="form-group">

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Secondary</legend>
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="ssc_board">Education Board<span class="required text-danger">*</span></label>
                                    <select name="ssc_board" class="form-control">
                                        <option> --- Select Education Board--- </option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Barishal">Dinajpur</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Madrasah">Madrasah</option>
                                        <option value="Technical">Technical</option>
                                        <option value="dibs">DIBS(Dhaka)</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_roll">Roll <span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_roll" name="ssc_roll" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_reg">Reg: No <span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_reg" name="ssc_reg" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_passingYear">Year of Passing<span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_passingYear" name="ssc_passingYear" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="ssc_group">Concentration/ Major/Group <span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_group" name="ssc_group" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_instituteName">Institute Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_instituteName" name="ssc_instituteName" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_result">Result<span class="required text-danger">*</span></label>
                                    <select name="ssc_result" class="form-control">
                                        <option> --- Select Result Type--- </option>
                                        <option value="First Division">First Division / Class</option>
                                        <option value="Second Division">Second Division / Class</option>
                                        <option value="Third Division">Third Division / Class</option>
                                        <option value="Grade">Grade</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_marks">Marks (%)<span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_marks" name="ssc_marks" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="ssc_cgpa">CGPA<span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_cgpa" name="ssc_cgpa" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="ssc_scale">Scale<span class="required text-danger">*</span></label>
                                    <input type="text" id="ssc_scale" name="ssc_scale" required="required" class="form-control">
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Higher Secondary</legend>
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="hsc_board">Education Board<span class="required text-danger">*</span></label>
                                    <select name="hsc_board" class="form-control">
                                        <option> --- Select Education Board--- </option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Barishal">Dinajpur</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Sylhet">Sylhet</option>
                                        <option value="Madrasah">Madrasah</option>
                                        <option value="Technical">Technical</option>
                                        <option value="dibs">DIBS(Dhaka)</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_roll">Roll <span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_roll" name="hsc_roll" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_reg">Reg: No <span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_reg" name="hsc_reg" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_passingYear">Year of Passing<span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_passingYear" name="hsc_passingYear" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="hsc_group">Concentration/ Major/Group <span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_group" name="hsc_group" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_instituteName">Institute Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_instituteName" name="hsc_instituteName" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_result">Result<span class="required text-danger">*</span></label>
                                    <select name="hsc_result" class="form-control">
                                        <option> --- Select Result Type--- </option>
                                        <option value="First Division">First Division / Class</option>
                                        <option value="Second Division">Second Division / Class</option>
                                        <option value="Third Division">Third Division / Class</option>
                                        <option value="Grade">Grade</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_marks">Marks (%)<span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_marks" name="hsc_marks" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="hsc_cgpa">CGPA<span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_cgpa" name="hsc_cgpa" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="hsc_scale">Scale<span class="required text-danger">*</span></label>
                                    <input type="text" id="hsc_scale" name="hsc_scale" required="required" class="form-control">
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Bachelor / Honors</legend>
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="honors_title">Exam/Degree Title<span class="required text-danger">*</span></label>
                                    <select class="form-control" name="honors_title" onchange="DisableOtherEduType();">
                                        <option value="Bachelor of Science (BSc)">Bachelor of Science (BSc)</option>
                                        <option value="Bachelor of Arts (BA)">Bachelor of Arts (BA)</option>
                                        <option value="Bachelor of Commerce (BCom)">Bachelor of Commerce (BCom)</option>
                                        <option value="Bachelor of Commerce (Pass)">Bachelor of Commerce (Pass)</option>
                                        <option value="Bachelor of Business Administration (BBA)">Bachelor of Business Administration (BBA)</option>
                                        <option value="Bachelor of Medicine and Bachelor of Surgery(MBBS)">Bachelor of Medicine and Bachelor of Surgery(MBBS)</option>
                                        <option value="Bachelor of Dental Surgery (BDS)">Bachelor of Dental Surgery (BDS)</option>
                                        <option value="Bachelor of Architecture (B.Arch)">Bachelor of Architecture (B.Arch)</option>
                                        <option value="Bachelor of Pharmacy (B.Pharm)">Bachelor of Pharmacy (B.Pharm)</option>
                                        <option value="Bachelor of Education (B.Ed)">Bachelor of Education (B.Ed)</option>
                                        <option value="Bachelor of Physical Education (BPEd)">Bachelor of Physical Education (BPEd)</option>
                                        <option value="Bachelor of Law (LLB)">Bachelor of Law (LLB)</option>
                                        <option value="Doctor of Veterinary Medicine (DVM)">Doctor of Veterinary Medicine (DVM)</option>
                                        <option value="Bachelor of Social Science (BSS)">Bachelor of Social Science (BSS)</option>
                                        <option value="Bachelor of Fine Arts (B.F.A)">Bachelor of Fine Arts (B.F.A)</option>
                                        <option value="Bachelor of Business Studies (BBS)">Bachelor of Business Studies (BBS)</option>
                                        <option value="Bachelor of Computer Application (BCA)">Bachelor of Computer Application (BCA)</option>
                                        <option value="Fazil (Madrasah)">Fazil (Madrasah)</option>
                                        <option value="Bachelor in Engineering (BEngg)">Bachelor in Engineering (BEngg)</option>
                                        <option value="others">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_group">Concentration/ Major/Group <span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_group" name="honors_group" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_instituteName">Institute Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_instituteName" name="honors_instituteName" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_passingYear">Year of Passing<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_passingYear" name="honors_passingYear" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="honors_duration">Duration (Years)<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_duration" name="honors_duration" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_result">Result<span class="required text-danger">*</span></label>
                                    <select name="honors_result" class="form-control">
                                        <option> --- Select Result Type--- </option>
                                        <option value="First Division">First Division / Class</option>
                                        <option value="Second Division">Second Division / Class</option>
                                        <option value="Third Division">Third Division / Class</option>
                                        <option value="Grade">Grade</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_cgpa">CGPA<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_cgpa" name="honors_cgpa" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="honors_scale">Scale<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_scale" name="honors_scale" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="honors_marks">Marks (%)<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_marks" name="honors_marks" required="required" class="form-control">
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Masters</legend>
                            <div class="form-group row">

                                <div class="col-md-3">
                                    <label for="masters_title">Exam/Degree Title<span class="required text-danger">*</span></label>
                                    <select class="form-control" name="masters_title" id="masters_title" onchange="DisableOtherEduType();">
                                        <option value="Master of Science (MSc)">Master of Science (MSc)</option>
                                        <option value="Master of Arts (MA)">Master of Arts (MA)</option>
                                        <option value="Master of Commerce (MCom)">Master of Commerce (MCom)</option>
                                        <option value="Master of Business Administration (MBA)">Master of Business Administration (MBA)</option>
                                        <option value="Master of Architecture (M.Arch)">Master of Architecture (M.Arch)</option>
                                        <option value="Master of Pharmacy (M.Pharm)">Master of Pharmacy (M.Pharm)</option>
                                        <option value="Master of Education (M.Ed)">Master of Education (M.Ed)</option>
                                        <option value="Master of Law (LLM)">Master of Law (LLM)</option>
                                        <option value="Master of Social Science (MSS)">Master of Social Science (MSS)</option>
                                        <option value="Master of Fine Arts (M.F.A)">Master of Fine Arts (M.F.A)</option>
                                        <option value="Master of Philosophy (M.Phil)">Master of Philosophy (M.Phil)</option>
                                        <option value="Master of Business Management (MBM)">Master of Business Management (MBM)</option>
                                        <option value="Master of Development Studies (MDS)">Master of Development Studies (MDS)</option>
                                        <option value="Master of Business Studies (MBS)">Master of Business Studies (MBS)</option>
                                        <option value="Masters in Computer Application (MCA)">Masters in Computer Application (MCA)</option>
                                        <option value="Executive Master of Business Administration (EMBA)">Executive Master of Business Administration (EMBA)</option>
                                        <option value="Fellowship of the College of Physicians and Surgeons (FCPS)">Fellowship of the College of Physicians and Surgeons (FCPS)</option>
                                        <option value="Kamil (Madrasah)">Kamil (Madrasah)</option>
                                        <option value="Masters in Engineering (MEngg)">Masters in Engineering (MEngg)</option>
                                        <option value="Masters in Bank Management (MBM)">Masters in Bank Management (MBM)</option>
                                        <option value="Masters in Information Systems Security (MISS)">Masters in Information Systems Security (MISS)</option>
                                        <option value="Master of Information &amp; Communication Technology (MICT)">Master of Information &amp; Communication Technology (MICT)</option>
                                        <option value="others" undefined="">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_group">Concentration/ Major/Group <span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_group" name="masters_group" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_instituteName">Institute Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_instituteName" name="masters_instituteName" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_passingYear">Year of Passing<span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_passingYear" name="masters_passingYear" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="masters_duration">Duration (Years)<span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_duration" name="masters_duration" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_result">Result<span class="required text-danger">*</span></label>
                                    <select name="masters_result" class="form-control">
                                        <option> --- Select Result Type--- </option>
                                        <option value="First Division">First Division / Class</option>
                                        <option value="Second Division">Second Division / Class</option>
                                        <option value="Third Division">Third Division / Class</option>
                                        <option value="Grade">Grade</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_cgpa">CGPA<span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_cgpa" name="masters_cgpa" required="required" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="masters_scale">Scale<span class="required text-danger">*</span></label>
                                    <input type="text" id="masters_scale" name="masters_scale" required="required" class="form-control">
                                </div>

                                <div class="mt-3 col-md-12"></div>

                                <div class="col-md-3">
                                    <label for="masters_marks">Marks (%)<span class="required text-danger">*</span></label>
                                    <input type="text" id="honors_marks" name="masters_marks" required="required" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                     {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection