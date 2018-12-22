@extends('back-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="applyOnlineContent">
                    <div class="form-group">

                        <div class="bg-success  p-2">
                            <h class="text-white font-weight-bold m-0">Name of the Position :
                                <span class="text-warning" style="font-size:17px;text-align:left !important;">{{ $singleAppliedDetail->post_name }}</span>
                        </div>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Personal Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <b>Full Name</b> : {{ $singleAppliedDetail->full_name }}
                                </div>
                                <div class="col-md-3">
                                    <b>Father Name</b> : {{ $singleAppliedDetail->father_name }}
                                </div>
                                <div class="col-md-3">
                                    <b>Mother Name</b> : {{ $singleAppliedDetail->mother_name }}
                                </div>
                                <div class="col-md-3">
                                    <b>Spouse Name</b> :
                                    @if( $singleAppliedDetail->spouse_name )
                                        {{ $singleAppliedDetail->spouse_name  }}
                                    @else
                                        None
                                    @endif
                                </div>

                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <b>Date of birth </b> :  @if( $singleAppliedDetail->dob) {{ $singleAppliedDetail->dob }} @endif
                                </div>
                                <div class="col-md-3">
                                    <b>Gender </b> :  {{ $singleAppliedDetail->gender }}
                                </div>
                                <div class="col-md-3">
                                    <b>Religion </b> :  {{ $singleAppliedDetail->religion }}
                                </div>
                                <div class="col-md-3">
                                    <b>Marital Status </b> : {{ $singleAppliedDetail->marital_status }}
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <b>Nationality </b> : {{ $singleAppliedDetail->nationality }}
                                </div>
                                <div class="col-md-3">
                                    <b for="national_id_no">National Id No</b> :
                                    @if($singleAppliedDetail->national_id_no)
                                        {{ $singleAppliedDetail->national_id_no }}
                                        @else
                                    None
                                        @endif
                                </div>
                                <div class="col-md-3">
                                    <b>Mobile</b> : 0{{ $singleAppliedDetail->mobile_number }}
                                </div>
                                <div class="col-md-3">
                                    <b>Email Address </b> : {{ $singleAppliedDetail->email_address }}
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <b>Total Year of Experience</b> : {{ $singleAppliedDetail->totalExperince }}
                                </div>
                                <div class="col-md-5">
                                    <b>Present / Mailing Address </b> : {{ $singleAppliedDetail->present_address }}
                                </div>
                                <div class="col-md-4">
                                    <b>Permanent Address</b> : {{ $singleAppliedDetail->permanent_address }}
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
                                        @if($singleAppliedDetail->ssc_exam)
                                            {{ ucwords($singleAppliedDetail->ssc_exam )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->ssc_group)
                                            {{ ucwords($singleAppliedDetail->ssc_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->ssc_result)
                                            {{ ucwords($singleAppliedDetail->ssc_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->ssc_cgpa)
                                            {{ ucwords($singleAppliedDetail->ssc_cgpa )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->ssc_scale)
                                            {{ ucwords($singleAppliedDetail->ssc_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleAppliedDetail->ssc_marks)
                                            {{ ucwords($singleAppliedDetail->ssc_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->ssc_board)
                                            {{ ucwords($singleAppliedDetail->ssc_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->ssc_passing_year)
                                            {{ ucwords($singleAppliedDetail->ssc_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>HSC/Equivalent</td>
                                    <td>
                                        @if($singleAppliedDetail->hsc_exam)
                                            {{ ucwords($singleAppliedDetail->hsc_exam )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->hsc_group)
                                            {{ ucwords($singleAppliedDetail->hsc_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->hsc_result)
                                            {{ ucwords($singleAppliedDetail->hsc_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->hsc_cgpa)
                                            {{ $singleAppliedDetail->hsc_cgpa }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->hsc_scale)
                                            {{ ucwords($singleAppliedDetail->hsc_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleAppliedDetail->hsc_marks)
                                            {{ ucwords($singleAppliedDetail->hsc_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->hsc_board)
                                            {{ ucwords($singleAppliedDetail->hsc_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->hsc_passing_year)
                                            {{ ucwords($singleAppliedDetail->hsc_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>Graduation</td>
                                    <td>
                                        @if($singleAppliedDetail->honors_exam)
                                            {{ ucwords($singleAppliedDetail->honors_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->honors_group)
                                            {{ ucwords($singleAppliedDetail->honors_group )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->honors_result)
                                            {{ ucwords($singleAppliedDetail->honors_result )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->honors_cgpa)
                                            {{ ucwords($singleAppliedDetail->honors_cgpa )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->honors_scale)
                                            {{ ucwords($singleAppliedDetail->honors_scale )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleAppliedDetail->honors_marks)
                                            {{ ucwords($singleAppliedDetail->honors_marks )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->honors_board)
                                            {{ ucwords($singleAppliedDetail->honors_board )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->honors_passing_year)
                                            {{ ucwords($singleAppliedDetail->honors_passing_year )}}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Post Graduation</td>
                                    <td>
                                        @if($singleAppliedDetail->post_graduation_exam)
                                            {{ ucwords($singleAppliedDetail->post_graduation_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->post_graduation_group)
                                            {{ ucwords($singleAppliedDetail->post_graduation_group) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->post_graduation_result)
                                            {{ ucwords($singleAppliedDetail->post_graduation_result) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->post_graduation_cgpa)
                                            {{ ucwords($singleAppliedDetail->post_graduation_cgpa) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->post_graduation_scale)
                                            {{ ucwords($singleAppliedDetail->post_graduation_scale) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleAppliedDetail->post_graduation_marks)
                                            {{ ucwords($singleAppliedDetail->post_graduation_marks) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->post_graduation_board)
                                            {{ ucwords($singleAppliedDetail->post_graduation_board) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->post_graduation_passing_year)
                                            {{ ucwords($singleAppliedDetail->post_graduation_passing_year) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>
                                        @if($singleAppliedDetail->other_graduation_exam)
                                            {{ ucwords($singleAppliedDetail->other_graduation_exam) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->other_graduation_group)
                                            {{ ucwords($singleAppliedDetail->other_graduation_group) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="12%">
                                        @if($singleAppliedDetail->other_graduation_result)
                                            {{ ucwords($singleAppliedDetail->other_graduation_result) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->other_graduation_cgpa)
                                            {{ ucwords($singleAppliedDetail->other_graduation_cgpa) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="8%">
                                        @if($singleAppliedDetail->other_graduation_scale)
                                            {{ ucwords($singleAppliedDetail->other_graduation_scale) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td width="11%">
                                        @if($singleAppliedDetail->other_graduation_marks)
                                            {{ ucwords($singleAppliedDetail->other_graduation_marks) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->other_graduation_board)
                                            {{ ucwords($singleAppliedDetail->other_graduation_board) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->other_graduation_passing_year)
                                            {{ ucwords($singleAppliedDetail->other_graduation_passing_year) }}
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
                                        @if($singleAppliedDetail->eOrganizationNameOne)
                                            {{ ucwords($singleAppliedDetail->eOrganizationNameOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->edesignationOne)
                                            {{ ucwords($singleAppliedDetail->edesignationOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eJobTypeOne)
                                            {{ ucwords($singleAppliedDetail->eJobTypeOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eResponsibilitiesOne)
                                            {{ ucwords($singleAppliedDetail->eResponsibilitiesOne) }}
                                        @else
                                            None
                                        @endif
                                    <td>
                                        @if($singleAppliedDetail->eJoiningDateOne)
                                            {{ ucwords($singleAppliedDetail->eJoiningDateOne) }}
                                        @else
                                            None
                                        @endif
                                    <td>
                                        @if($singleAppliedDetail->eReleaseDateOne)
                                            {{ ucwords($singleAppliedDetail->eReleaseDateOne) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleAppliedDetail->eOrganizationNameTwo)
                                            {{ ucwords($singleAppliedDetail->eOrganizationNameTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->edesignationTwo)
                                            {{ ucwords($singleAppliedDetail->edesignationTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eJobTypeTwo)
                                            {{ ucwords($singleAppliedDetail->eJobTypeTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eResponsibilitiesTwo)
                                            {{ ucwords($singleAppliedDetail->eResponsibilitiesTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eJoiningDateTwo)
                                            {{ ucwords($singleAppliedDetail->eJoiningDateTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eReleaseDateTwo)
                                            {{ ucwords($singleAppliedDetail->eReleaseDateTwo) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleAppliedDetail->eOrganizationNameThree)
                                            {{ ucwords($singleAppliedDetail->eOrganizationNameThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->edesignationThree)
                                            {{ ucwords($singleAppliedDetail->edesignationThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eJobTypeThree)
                                            {{ ucwords($singleAppliedDetail->eJobTypeThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eResponsibilitiesThree)
                                            {{ ucwords($singleAppliedDetail->eResponsibilitiesThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eJoiningDateThree)
                                            {{ ucwords($singleAppliedDetail->eJoiningDateThree) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eReleaseDateThree)
                                            {{ ucwords($singleAppliedDetail->eReleaseDateThree) }}
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
                                        @if($singleAppliedDetail->bSpeaking)
                                            {{ ucwords($singleAppliedDetail->bSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->bReading)
                                            {{ ucwords($singleAppliedDetail->bReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->bListening)
                                            {{ ucwords($singleAppliedDetail->bListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->bWriting)
                                            {{ ucwords($singleAppliedDetail->bWriting) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>English</td>
                                    <td>
                                        @if($singleAppliedDetail->eSpeaking)
                                            {{ ucwords($singleAppliedDetail->eSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eReading)
                                            {{ ucwords($singleAppliedDetail->eReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->eListening)
                                            {{ ucwords($singleAppliedDetail->eListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->bWriting)
                                            {{ ucwords($singleAppliedDetail->bWriting) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($singleAppliedDetail->other_language)
                                            {{ ucwords($singleAppliedDetail->other_language) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->oSpeaking)
                                            {{ ucwords($singleAppliedDetail->oSpeaking) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->oReading)
                                            {{ ucwords($singleAppliedDetail->oReading) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->oListening)
                                            {{ ucwords($singleAppliedDetail->oListening) }}
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        @if($singleAppliedDetail->oWriting)
                                            {{ ucwords($singleAppliedDetail->oWriting) }}
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
                                    @if($singleAppliedDetail->skills)
                                        {{ ucwords($singleAppliedDetail->skills) }}
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
                                                @if($singleAppliedDetail->referencesNameOne)
                                                    {{ ucwords($singleAppliedDetail->referencesNameOne) }}
                                                @else
                                                    None
                                                @endif
                                        </div>
                                        <div class="col-md-6">
                                            <b >Mobile : </b>
                                            @if($singleAppliedDetail->referencesMobileOne)
                                                {{ ucwords($singleAppliedDetail->referencesMobileOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label>Email : </label>
                                            @if($singleAppliedDetail->referencesEmailOne)
                                                {{ ucwords($singleAppliedDetail->referencesEmailOne) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Address : </b>
                                            @if($singleAppliedDetail->referencesAddressOne)
                                                {{ ucwords($singleAppliedDetail->referencesAddressOne) }}
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
                                            @if($singleAppliedDetail->referencesNameTwo)
                                                {{ ucwords($singleAppliedDetail->referencesNameTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <b>Mobile : </b>
                                            @if($singleAppliedDetail->referencesMobileTwo)
                                                {{ ucwords($singleAppliedDetail->referencesMobileTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Email : </b>
                                            @if($singleAppliedDetail->referencesEmailTwo)
                                                {{ ucwords($singleAppliedDetail->referencesEmailTwo) }}
                                            @else
                                                None
                                            @endif
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <b>Address : </b>
                                            @if($singleAppliedDetail->referencesAddressTwo)
                                                {{ ucwords($singleAppliedDetail->referencesAddressTwo) }}
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
                                            @if($singleAppliedDetail->photo)
                                            src="{{ asset($singleAppliedDetail->photo) }}"
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
                                            @if($singleAppliedDetail->signature)
                                            src="{{ asset($singleAppliedDetail->signature) }}"
                                            @else
                                            None
                                            @endif
                                            alt="User Photo" width="100"
                                        />
                                    </div>

                                </div>
                            </div>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection