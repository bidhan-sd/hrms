@extends('back-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">

                <div class="applyOnlineContent">

                    <div class="form-group">
                        <div class="bg-success  p-2">
                            <h4 class="text-white font-weight-bold m-0">Name of the Position :
                                <span class="text-warning" style="font-size:17px;text-align:left !important;">{{ $singleEmployeeDetail->degination }}</span>

                        </div>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Office Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <b>Degination</b> {{ ucwords($singleEmployeeDetail->degination) }}
                                </div>

                                <div class="col-md-4">
                                    <b>Department</b> {{ ucwords($singleEmployeeDetail->department_name) }}
                                </div>

                                <div class="col-md-2">
                                    <b>Employee Pin</b> {{ $singleEmployeeDetail->employee_pin }}
                                </div>
                                <div class="col-md-2">
                                    <b>Joining Data</b> {{ $singleEmployeeDetail->joining_date }}
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Personal Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <b>Full Name</b> {{ ucwords($singleEmployeeDetail->full_name) }}
                                </div>
                                <div class="col-md-3">
                                    <b>Father's Name</b> {{ ucwords($singleEmployeeDetail->father_name) }}
                                </div>
                                <div class="col-md-3">
                                    <b>Mother's Name</b> {{ ucwords($singleEmployeeDetail->mother_name) }}
                                </div>
                                <div class="col-md-3">
                                    <b>Spouse Name</b> {{ ucwords($singleEmployeeDetail->spouse_name) }}
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <b>Date of birth</b> {{ $singleEmployeeDetail->dob }}
                                </div>
                                <div class="col-md-3">
                                    <b>Gender</b> {{ ucwords($singleEmployeeDetail->gender) }}
                                </div>
                                <div class="col-md-3">
                                    <b>Religion</b> {{ ucwords($singleEmployeeDetail->religion) }}
                                </div>
                                <div class="col-md-3">
                                    <b>Marital Status</b> {{ ucwords($singleEmployeeDetail->marital_status) }}
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <b>Nationality</b> {{ ucwords($singleEmployeeDetail->nationality) }}
                                </div>
                                <div class="col-md-3">
                                    <b>National Id No</b> {{ $singleEmployeeDetail->national_id_no }}
                                </div>
                                <div class="col-md-3">
                                    <b>Mobile</b> 0{{ $singleEmployeeDetail->mobile_number }}
                                </div>
                                <div class="col-md-3">
                                    <b>Email Address</b> {{ $singleEmployeeDetail->email_address }}
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-4">
                                    <b>Total Year of Experience</b> {{ $singleEmployeeDetail->totalExperince }}
                                </div>
                                <div class="col-md-4">
                                    <b>Present / Mailing Address</b> {{ ucwords($singleEmployeeDetail->present_address) }}
                                </div>
                                <div class="col-md-4">
                                    <b>Permanent Address</b> {{ ucwords($singleEmployeeDetail->permanent_address) }}
                                </div>
                            </div>

                        </fieldset>


                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Educational Qualification (Board/University & Year of Passing)<span class="required text-danger">*</span></legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                <tr>
                                    <th valign="middle" scope="col">Level of Education</th>
                                    <th scope="col">Name of Examination</th>
                                    <th scope="col">Group | Subject</th>
                                    <th scope="col">Division | Grade </th>
                                    <th scope="col" colspan="3">Grade<br/><hr style="background-color:#f5f5f5;margin-top:1px;margin-bottom:1px;"/>
                                        CGPA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scale &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Marks %</th>
                                    <th scope="col">Board | University</th>
                                    <th scope="col">Passing Year [YYYY]</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>SSC/Equivalent</td>
                                    <td>
                                        @if($singleEmployeeDetail->ssc_exam)
                                            {{ ucwords($singleEmployeeDetail->ssc_exam )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->ssc_group)
                                            {{ ucwords($singleEmployeeDetail->ssc_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->ssc_result)
                                            {{ ucwords($singleEmployeeDetail->ssc_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->ssc_cgpa)
                                            {{ ucwords($singleEmployeeDetail->ssc_cgpa )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->ssc_scale)
                                            {{ ucwords($singleEmployeeDetail->ssc_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleEmployeeDetail->ssc_marks)
                                            {{ ucwords($singleEmployeeDetail->ssc_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->ssc_board)
                                            {{ ucwords($singleEmployeeDetail->ssc_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->ssc_passing_year)
                                            {{ ucwords($singleEmployeeDetail->ssc_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>HSC/Equivalent</td>
                                    <td>
                                        @if($singleEmployeeDetail->hsc_exam)
                                            {{ ucwords($singleEmployeeDetail->hsc_exam )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->hsc_group)
                                            {{ ucwords($singleEmployeeDetail->hsc_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->hsc_result)
                                            {{ ucwords($singleEmployeeDetail->hsc_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->hsc_cgpa)
                                            {{ $singleEmployeeDetail->hsc_cgpa }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->hsc_scale)
                                            {{ ucwords($singleEmployeeDetail->hsc_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleEmployeeDetail->hsc_marks)
                                            {{ ucwords($singleEmployeeDetail->hsc_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->hsc_board)
                                            {{ ucwords($singleEmployeeDetail->hsc_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->hsc_passing_year)
                                            {{ ucwords($singleEmployeeDetail->hsc_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>Graduation</td>
                                    <td>
                                        @if($singleEmployeeDetail->honors_exam)
                                            {{ ucwords($singleEmployeeDetail->honors_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->honors_group)
                                            {{ ucwords($singleEmployeeDetail->honors_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->honors_result)
                                            {{ ucwords($singleEmployeeDetail->honors_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->honors_cgpa)
                                            {{ ucwords($singleEmployeeDetail->honors_cgpa )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->honors_scale)
                                            {{ ucwords($singleEmployeeDetail->honors_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleEmployeeDetail->honors_marks)
                                            {{ ucwords($singleEmployeeDetail->honors_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->honors_board)
                                            {{ ucwords($singleEmployeeDetail->honors_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->honors_passing_year)
                                            {{ ucwords($singleEmployeeDetail->honors_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post Graduation</td>
                                    <td>
                                        @if($singleEmployeeDetail->post_graduation_exam)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->post_graduation_group)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_group) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->post_graduation_result)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_result) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->post_graduation_cgpa)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_cgpa) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->post_graduation_scale)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_scale) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleEmployeeDetail->post_graduation_marks)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_marks) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->post_graduation_board)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_board) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->post_graduation_passing_year)
                                            {{ ucwords($singleEmployeeDetail->post_graduation_passing_year) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>
                                        @if($singleEmployeeDetail->other_graduation_exam)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->other_graduation_group)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_group) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleEmployeeDetail->other_graduation_result)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_result) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->other_graduation_cgpa)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_cgpa) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleEmployeeDetail->other_graduation_scale)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_scale) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleEmployeeDetail->other_graduation_marks)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_marks) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->other_graduation_board)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_board) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->other_graduation_passing_year)
                                            {{ ucwords($singleEmployeeDetail->other_graduation_passing_year) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Experience(If Any)</legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                <tr>
                                    <th scope="col" width="15%">Organization Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Job Type</th>
                                    <th scope="col" width="25%">Responsibilities</th>
                                    <th scope="col">Joining Date</th>
                                    <th scope="col">Release Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        @if($singleEmployeeDetail->eOrganizationNameOne)
                                            {{ ucwords($singleEmployeeDetail->eOrganizationNameOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->edesignationOne)
                                            {{ ucwords($singleEmployeeDetail->edesignationOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eJobTypeOne)
                                            {{ ucwords($singleEmployeeDetail->eJobTypeOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eResponsibilitiesOne)
                                            {{ ucwords($singleEmployeeDetail->eResponsibilitiesOne) }}
                                        @else
                                            None
                                    @endif
                                    <td>
                                        @if($singleEmployeeDetail->eJoiningDateOne)
                                            {{ ucwords($singleEmployeeDetail->eJoiningDateOne) }}
                                        @else
                                            None
                                    @endif
                                    <td>
                                        @if($singleEmployeeDetail->eReleaseDateOne)
                                            {{ ucwords($singleEmployeeDetail->eReleaseDateOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleEmployeeDetail->eOrganizationNameTwo)
                                            {{ ucwords($singleEmployeeDetail->eOrganizationNameTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->edesignationTwo)
                                            {{ ucwords($singleEmployeeDetail->edesignationTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eJobTypeTwo)
                                            {{ ucwords($singleEmployeeDetail->eJobTypeTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eResponsibilitiesTwo)
                                            {{ ucwords($singleEmployeeDetail->eResponsibilitiesTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eJoiningDateTwo)
                                            {{ ucwords($singleEmployeeDetail->eJoiningDateTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eReleaseDateTwo)
                                            {{ ucwords($singleEmployeeDetail->eReleaseDateTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleEmployeeDetail->eOrganizationNameThree)
                                            {{ ucwords($singleEmployeeDetail->eOrganizationNameThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->edesignationThree)
                                            {{ ucwords($singleEmployeeDetail->edesignationThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eJobTypeThree)
                                            {{ ucwords($singleEmployeeDetail->eJobTypeThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eResponsibilitiesThree)
                                            {{ ucwords($singleEmployeeDetail->eResponsibilitiesThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eJoiningDateThree)
                                            {{ ucwords($singleEmployeeDetail->eJoiningDateThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eReleaseDateThree)
                                            {{ ucwords($singleEmployeeDetail->eReleaseDateThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Language Proficiency</legend>
                            <table width="100%" class="table table-bordered table-striped text-center table-hover">
                                <thead class="bg-light text-dark">
                                <tr>
                                    <th scope="col">Language Name</th>
                                    <th scope="col">Speaking</th>
                                    <th scope="col">Reading</th>
                                    <th scope="col">Listening</th>
                                    <th scope="col">Writing</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Bangla</td>
                                    <td>
                                        @if($singleEmployeeDetail->bSpeaking)
                                            {{ ucwords($singleEmployeeDetail->bSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->bReading)
                                            {{ ucwords($singleEmployeeDetail->bReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->bListening)
                                            {{ ucwords($singleEmployeeDetail->bListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->bWriting)
                                            {{ ucwords($singleEmployeeDetail->bWriting) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>English</td>
                                    <td>
                                        @if($singleEmployeeDetail->eSpeaking)
                                            {{ ucwords($singleEmployeeDetail->eSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eReading)
                                            {{ ucwords($singleEmployeeDetail->eReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->eListening)
                                            {{ ucwords($singleEmployeeDetail->eListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->bWriting)
                                            {{ ucwords($singleEmployeeDetail->bWriting) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleEmployeeDetail->other_language)
                                            {{ ucwords($singleEmployeeDetail->other_language) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->oSpeaking)
                                            {{ ucwords($singleEmployeeDetail->oSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->oReading)
                                            {{ ucwords($singleEmployeeDetail->oReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->oListening)
                                            {{ ucwords($singleEmployeeDetail->oListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleEmployeeDetail->oWriting)
                                            {{ ucwords($singleEmployeeDetail->oWriting) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>

                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Skills</legend>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    @if($singleEmployeeDetail->skills)
                                        {{ ucwords($singleEmployeeDetail->skills) }}
                                    @else
                                        None
                                    @endif
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">References (Name, Address)</legend>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="font-weight-bold text-secondary">References 1</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-6">
                                            <b>Name : </b>
                                            @if($singleEmployeeDetail->referencesNameOne)
                                                {{ ucwords($singleEmployeeDetail->referencesNameOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <b >Mobile : </b>
                                            @if($singleEmployeeDetail->referencesMobileOne)
                                                {{ ucwords($singleEmployeeDetail->referencesMobileOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label>Email : </label>
                                            @if($singleEmployeeDetail->referencesEmailOne)
                                                {{ ucwords($singleEmployeeDetail->referencesEmailOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Address : </b>
                                            @if($singleEmployeeDetail->referencesAddressOne)
                                                {{ ucwords($singleEmployeeDetail->referencesAddressOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="font-weight-bold text-secondary">References 2</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-6">
                                            <b>Name : </b>
                                            @if($singleEmployeeDetail->referencesNameTwo)
                                                {{ ucwords($singleEmployeeDetail->referencesNameTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <b>Mobile : </b>
                                            @if($singleEmployeeDetail->referencesMobileTwo)
                                                {{ ucwords($singleEmployeeDetail->referencesMobileTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Email : </b>
                                            @if($singleEmployeeDetail->referencesEmailTwo)
                                                {{ ucwords($singleEmployeeDetail->referencesEmailTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Address : </b>
                                            @if($singleEmployeeDetail->referencesAddressTwo)
                                                {{ ucwords($singleEmployeeDetail->referencesAddressTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Photogrphy <span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-5">

                                    <div class="form-group text-center">
                                        <img
                                            @if($singleEmployeeDetail->photo)
                                            src="{{ asset($singleEmployeeDetail->photo) }}"
                                            @else
                                            None
                                            @endif
                                            alt="User Photo" width="200"
                                            />
                                    </div>

                                </div>
                                <div class="col-md-5 offset-md-1">

                                    <div class="form-group text-center signature">
                                        <p><b>Signature :</b> </p>
                                        <img
                                                @if($singleEmployeeDetail->signature)
                                                src="{{ asset($singleEmployeeDetail->signature) }}"
                                                @else
                                                None
                                                @endif
                                                alt="User Photo" width="300"
                                                />
                                    </div>

                                </div>
                            </div>
                        </fieldset>


                    </div>
                    
                </div>
            </div>
        </div>
        <script>
            document.forms['singleEmployeeInfoUpdate'].elements['gender'].value = '{{ $singleEmployeeDetail->gender }}';
            document.forms['singleEmployeeInfoUpdate'].elements['marital_status'].value = '{{ $singleEmployeeDetail->marital_status }}';
        </script>
    </div>
@endsection