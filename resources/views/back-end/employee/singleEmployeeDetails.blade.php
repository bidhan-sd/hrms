@extends('back-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">

                <div class="applyOnlineContent">
                    <?php $message = Session::get('message') ?>

                    @if(isset($message))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                            {{ $message }}
                        </div>
                    @endif

                    {{ Form::open(['route'=>'update-singleEmployee-info','method'=>'POST','class'=>'form-horizontal','name'=>'singleEmployeeInfoUpdate','id'=>'singleEmployeeInfoUpdate','enctype'=>'multipart/form-data']) }}
                    <div class="form-group">
                        <div class="bg-success  p-2">
                            <h4 class="text-white font-weight-bold m-0">Name of the Position :
                                <span class="text-warning" style="font-size:17px;text-align:left !important;">{{ $singleEmployeeDetail->degination }}</span>
                                <b style="font-size:13px;float:right;margin-top:5px">You must fill Red (<span class="text-danger">*</span>) Indicates incorrect information.</b></h4>
                            <input type="hidden" name="employeeID" value="{{ $singleEmployeeDetail->employeeID }}" readonly/>
                            <input type="hidden" name="post_id" value="{{ $singleEmployeeDetail->post_id }}" readonly/>
                            <input type="hidden" name="unique_apply_id" value="{{ $singleEmployeeDetail->unique_apply_id }}" readonly/>
                        </div>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Office Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="degination">Degination<span class="required text-danger">*</span></label>
                                    <select name="degination" id="degination" class="form-control">
                                        <?php $post_names = \App\Advertisement::select('post_name')->where('publication_status',1)->get() ?>
                                        @foreach($post_names as $post_name)
                                            <option <?php if($post_name->post_name == $singleEmployeeDetail->degination){ echo ' selected="selected"';} ?> value="{{ $post_name->post_name }}">{{ ucfirst($post_name->post_name) }}</option>
                                        @endforeach
                                    </select>
                                    <span id="degination_check" class="text-danger">{{ $errors->has('degination') ? $errors->first('degination') : ' ' }}</span>
                                </div>
                                {{--<div class="col-md-3">
                                    <label for="degination">Degination<span class="required text-danger">*</span></label>
                                    <input type="text" id="degination" name="degination" value="{{ $singleEmployeeDetail->degination }}" class="form-control">
                                    <span id="degination_check" class="text-danger">{{ $errors->has('degination') ? $errors->first('degination') : ' ' }}</span>
                                </div>--}}

                                <div class="col-md-3">
                                    <label for="department_name">Department Name <span class="required text-danger">*</span></label>
                                    <select name="department_name" id="department_name" class="form-control">
                                        <?php $department_names = App\Department::select('department_name')->where('publication_status',1)->get() ?>
                                        @foreach($department_names as $department_name)
                                            <option <?php if(strtolower($department_name->department_name) == $singleEmployeeDetail->department_name){ echo ' selected="selected"';} ?> value="{{ strtolower($department_name->department_name) }}">{{ ucfirst($department_name->department_name) }}</option>
                                        @endforeach
                                    </select>
                                    <span id="department_name_error" class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : ' ' }}</span>
                                </div>

                                <div class="col-md-3">
                                    <label for="employee_pin">Employee Pin<span class="required text-danger">*</span></label>
                                    <input type="text" id="employee_pin" name="employee_pin" value="{{ $singleEmployeeDetail->employee_pin }}" class="form-control">
                                    <span id="employee_pin_check" class="text-danger">{{ $errors->has('employee_pin') ? $errors->first('employee_pin') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="joining_date">Joining Date<span class="required text-danger">*</span></label>
                                    <input type="date" id="joining_date" name="joining_date" value="{{ $singleEmployeeDetail->joining_date }}" class="form-control">
                                    <span id="joining_date_check" class="text-danger">{{ $errors->has('joining_date') ? $errors->first('joining_date') : ' ' }}</span>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Personal Info<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="full_name">Full Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="full_name" name="full_name" value="{{ $singleEmployeeDetail->full_name }}" class="form-control">
                                    <span id="full_name_check" class="text-danger">{{ $errors->has('full_name') ? $errors->first('full_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="father_name">Father's Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="father_name" name="father_name" value="{{ $singleEmployeeDetail->father_name }}" class="form-control">
                                    <span id="father_name_check" class="text-danger">{{ $errors->has('father_name') ? $errors->first('father_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="mother_name">Mother's Name<span class="required text-danger">*</span></label>
                                    <input type="text" id="mother_name" name="mother_name" value="{{ $singleEmployeeDetail->mother_name }}" class="form-control">
                                    <span id="mother_name_check" class="text-danger">{{ $errors->has('mother_name') ? $errors->first('mother_name') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="spouse_name">Spouse Name</label>
                                    <input type="text" id="spouse_name" name="spouse_name" value="{{ $singleEmployeeDetail->spouse_name }}" class="form-control">
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="dob">Date of birth<span class="required text-danger">*</span></label>
                                    <input type="date" id="dob" name="dob" value="{{ $singleEmployeeDetail->dob }}" class="form-control">
                                    <span id="dob_check" class="text-danger">{{ $errors->has('dob') ? $errors->first('dob') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender">Gender<span class="required text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0"> --- Select Gender --- </option>
                                        <option value="male"  @if($singleEmployeeDetail->gender == 'male') selected="selected" @endif >Male</option>
                                        <option value="female" @if($singleEmployeeDetail->gender == 'female') selected="selected" @endif >Female</option>
                                        <option value="other" @if($singleEmployeeDetail->gender == 'other') selected="selected" @endif >Other</option>
                                    </select>
                                    <span id="gender_check" class="text-danger">{{ $errors->has('gender') ? $errors->first('gender') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="religion">Religion <span class="required text-danger">*</span></label>
                                    <input type="text" id="religion" name="religion" value="{{ $singleEmployeeDetail->religion }}" class="form-control">
                                    <span id="religion_check" class="text-danger">{{ $errors->has('religion') ? $errors->first('religion') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="marital_status">Marital Status<span class="required text-danger">*</span></label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="0"> --- Select Gender --- </option>
                                        <option value="unmarried" @if($singleEmployeeDetail->marital_status == 'unmarried') selected="selected" @endif >Unmarried</option>
                                        <option value="married" @if($singleEmployeeDetail->marital_status == 'married') selected="selected" @endif >Married</option>
                                        <option value="single" @if($singleEmployeeDetail->marital_status == 'single') selected="selected" @endif >Single</option>
                                    </select>
                                    <span id="marital_status_check" class="text-danger">{{ $errors->has('marital_status') ? $errors->first('marital_status') : ' ' }}</span>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="nationality">Nationality<span class="required text-danger">*</span></label>
                                    <input type="text" id="nationality" name="nationality" value="{{ $singleEmployeeDetail->nationality }}" class="form-control">
                                    <span id="nationality_check" class="text-danger">{{ $errors->has('nationality') ? $errors->first('nationality') : ' ' }}</span>
                                </div>
                                <div class="col-md-3">
                                    <label for="national_id_no">National Id No</label>
                                    <input type="text" id="national_id_no" name="national_id_no" value="{{ $singleEmployeeDetail->national_id_no }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="mobile_number">Mobile<span class="required text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" readonly value="+88" class="form-control">
                                        </div>
                                        <div class="col-md-8 customClass">
                                            <input type="text" id="mobile_number" maxlength="11" name="mobile_number" value="0{{ $singleEmployeeDetail->mobile_number }}" class="form-control" placeholder="phone will 11 digit">
                                            <span id="mobile_number_check" class="text-danger">{{ $errors->has('mobile_number') ? $errors->first('mobile_number') : ' ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Email Address<span class="required text-danger">*</span></label>
                                    <input type="email" id="email_address" name="email_address" value="{{ $singleEmployeeDetail->email_address }}" class="form-control">
                                    <span id="email_address_check" class="text-danger">{{ $errors->has('email_address') ? $errors->first('email_address') : ' ' }}</span>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-4">
                                    <label for="totalExperince">Total Year of Experience</label>
                                    <input type="number" name="totalExperince" value="{{ $singleEmployeeDetail->totalExperince }}" id="totalExperince" placeholder="i.e: 5" maxlength="2" class="form-control"/>
                                    <span id="totalExperince_check" class="text-danger"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="present_address">Present / Mailing Address<span class="required text-danger">*</span></label>
                                    <textarea name="present_address" id="present_address" class="form-control">{{ $singleEmployeeDetail->present_address }}</textarea>
                                    <span id="present_address_check" class="text-danger">{{ $errors->has('present_address') ? $errors->first('present_address') : ' ' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="permanent_address">Permanent Address<span class="required text-danger">*</span></label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control">{{ $singleEmployeeDetail->permanent_address }}</textarea>
                                    <span id="permanent_address_check" class="text-danger">{{ $errors->has('permanent_address') ? $errors->first('permanent_address') : ' ' }}</span>
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
                                    <td>SSC/Equivalent<span class="text-danger">*</span></td>
                                    <td>
                                        <select name="ssc_exam" id="ssc_exam" class="form-control">
                                            <option @if($singleEmployeeDetail->ssc_exam == 'ssc') selected="selected" @endif value="ssc">SSC</option>
                                            <option @if($singleEmployeeDetail->ssc_exam == 'dakhil') selected="selected" @endif value="dakhil">Dakhil</option>
                                            <option @if($singleEmployeeDetail->ssc_exam == 'o level') selected="selected" @endif value="o level">O level</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="ssc_group" id="ssc_group" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->ssc_group == 'science') selected="selected" @endif value="science">Science</option>
                                            <option @if($singleEmployeeDetail->ssc_group == 'commerce') selected="selected" @endif value="commerce">Commerce</option>
                                            <option @if($singleEmployeeDetail->ssc_group == 'arts') selected="selected" @endif value="arts">Arts</option>
                                            <option @if($singleEmployeeDetail->ssc_group == 'general') selected="selected" @endif value="general">General</option>
                                            <option @if($singleEmployeeDetail->ssc_group == 'others') selected="selected" @endif value="others">Others</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </td>
                                    <td width="12%">
                                        <select name="ssc_result" id="ssc_result" class="form-control">
                                            <option value="0"> Select </option>
                                            <option @if($singleEmployeeDetail->ssc_result == 'grade') selected="selected" @endif value="grade"> Grade </option>
                                            <option @if($singleEmployeeDetail->ssc_result == 'first') selected="selected" @endif value="first"> First </option>
                                            <option @if($singleEmployeeDetail->ssc_result == 'second') selected="selected" @endif value="second"> Second </option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" value="{{ $singleEmployeeDetail->ssc_cgpa }}" placeholder="cgpa" type="text" name="ssc_cgpa" id="ssc_cgpa" />
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" value="{{ $singleEmployeeDetail->ssc_scale }}" placeholder="scal" type="number" maxlength="1" min="4" max="5" name="ssc_scale" id="ssc_scale" />
                                    </td>
                                    <td width="11%">
                                        <input  class="form-control" value="{{ $singleEmployeeDetail->ssc_marks }}" placeholder="marks %" type="text" name="ssc_marks" id="ssc_marks"/>
                                    </td>
                                    <td>
                                        <select required name="ssc_board" id="ssc_board" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'barishal') selected="selected" @endif value="barishal">Barishal</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'chattogram') selected="selected" @endif value="chattogram">Chattogram</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'cumilla') selected="selected" @endif value="cumilla">Cumilla</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'dhaka') selected="selected" @endif value="dhaka">Dhaka</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'dinajpur') selected="selected" @endif value="dinajpur">Dinajpur</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'jashore') selected="selected" @endif value="jashore">Jashore</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'rajshahi') selected="selected" @endif value="rajshahi">Rajshahi</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'sylhet') selected="selected" @endif value="sylhet">Sylhet</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'madrasah') selected="selected" @endif value="madrasah">Madrasah</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'technical') selected="selected" @endif value="technical">Technical</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'dibs (Dhaka)') selected="selected" @endif value="dibs (Dhaka)">DIBS (Dhaka)</option>
                                            <option @if($singleEmployeeDetail->ssc_board == 'bangladesh open university') selected="selected" @endif value="bangladesh open university">Bangladesh Open University</option>
                                            <option @if($singleEmployeeDetail->ssc_result == 'other') selected="selected" @endif value="other">Other</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $singleEmployeeDetail->ssc_passing_year }}" name="ssc_passing_year" id="ssc_passing_year"  placeholder="Years"/>
                                        <span class="text-danger" id="ssc_passing_year_check">{{ $errors->has('ssc_passing_year') ? $errors->first('ssc_passing_year') : ' ' }}</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>HSC/Equivalent <span class="text-danger">*</span></td>
                                    <td>
                                        <select name="hsc_exam" id="hsc_exam" class="form-control">
                                            <option @if($singleEmployeeDetail->hsc_exam == 'hsc') selected="selected" @endif value="hsc" selected>HSC</option>
                                            <option @if($singleEmployeeDetail->hsc_exam == 'alim') selected="selected" @endif value="alim">Alim</option>
                                            <option @if($singleEmployeeDetail->hsc_exam == 'a level') selected="selected" @endif value="a level">A level</option>
                                            <option @if($singleEmployeeDetail->hsc_exam == 'diploma') selected="selected" @endif value="diploma">Diploma</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="hsc_group" id="hsc_group" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->hsc_group == 'science') selected="selected" @endif  value="science">Science</option>
                                            <option @if($singleEmployeeDetail->hsc_group == 'arts') selected="selected" @endif value="arts">Arts</option>
                                            <option @if($singleEmployeeDetail->hsc_group == 'commerce') selected="selected" @endif value="commerce">Commerce</option>
                                            <option @if($singleEmployeeDetail->hsc_group == 'general') selected="selected" @endif value="general">General</option>
                                            <option @if($singleEmployeeDetail->hsc_group == 'others') selected="selected" @endif value="others">Others</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="hsc_result" id="hsc_result" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->hsc_result == 'grade') selected="selected" @endif value="grade">Grade</option>
                                            <option @if($singleEmployeeDetail->hsc_result == 'first') selected="selected" @endif value="first">First</option>
                                            <option @if($singleEmployeeDetail->hsc_result == 'second') selected="selected" @endif  value="second">Second</option>
                                        </select>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" placeholder="cgpa" type="text" value="{{ $singleEmployeeDetail->hsc_cgpa }}" name="hsc_cgpa" id="hsc_cgpa"/>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" placeholder="scale" type="text" value="{{ $singleEmployeeDetail->hsc_scale }}" name="hsc_scale" id="hsc_scale"/>
                                    </td>
                                    <td width="11%">
                                        <input  class="form-control" placeholder="marks %" type="text" value="{{ $singleEmployeeDetail->hsc_marks }}" name="hsc_marks" id="hsc_marks"/>
                                    </td>
                                    <td>
                                        <select required name="hsc_board" id="hsc_board" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'barishal') selected="selected" @endif value="barishal">Barishal</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'chattogram') selected="selected" @endif value="chattogram">Chattogram</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'cumilla') selected="selected" @endif value="cumilla">Cumilla</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'dhaka') selected="selected" @endif value="dhaka">Dhaka</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'dinajpur') selected="selected" @endif value="dinajpur">Dinajpur</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'jashore') selected="selected" @endif value="jashore">Jashore</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'rajshahi') selected="selected" @endif value="rajshahi">Rajshahi</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'sylhet') selected="selected" @endif value="sylhet">Sylhet</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'madrasah') selected="selected" @endif value="madrasah">Madrasah</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'technical') selected="selected" @endif value="technical">Technical</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'didbs (Dhaka)') selected="selected" @endif value="didbs (Dhaka)">DIBS (Dhaka)</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'bangladesh open university') selected="selected" @endif value="bangladesh open university">Bangladesh Open University</option>
                                            <option @if($singleEmployeeDetail->hsc_board == 'other') selected="selected" @endif  value="other">Other</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $singleEmployeeDetail->hsc_passing_year }}" name="hsc_passing_year" id="hsc_passing_year" placeholder="Years"/>
                                        <span class="text-danger" id="hsc_passing_year_check">{{ $errors->has('hsc_passing_year') ? $errors->first('hsc_passing_year') : ' ' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Graduation</td>
                                    <td>
                                        <select name="honors_exam" id="honors_exam" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bsc honors') selected="selected" @endif value="bsc honors">BSC Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bsc eng') selected="selected" @endif value="bsc eng">BSC Eng.</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bcom honors') selected="selected" @endif value="bcom honors">BCom Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'ba honors') selected="selected" @endif value="ba honors">BA Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bss honors') selected="selected" @endif value="bss honors">BSS Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bbs honors') selected="selected" @endif value="bbs honors">BBS Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bed honors') selected="selected" @endif value="bed honors">BED Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'llb honors') selected="selected" @endif value="llb honors">LLB Hons</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bba') selected="selected" @endif value="bba">BBA</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bsc') selected="selected" @endif value="bsc">BSC</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bcom') selected="selected" @endif value="bcom">BCom</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'ba') selected="selected" @endif value="ba">BA</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bss') selected="selected" @endif value="bss">BSS</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bbs') selected="selected" @endif value="bbs">BBS</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'bed') selected="selected" @endif value="bed">BED</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'b.pharm') selected="selected" @endif value="b.pharm">B.Pharm</option>
                                            <option @if($singleEmployeeDetail->honors_exam == 'b others') selected="selected" @endif value="b others">Honors Others</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="honors_group" id="honors_group" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Accounting & Information System') selected="selected" @endif value="Accounting & Information System">Accounting & Information System</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Accounting') selected="selected" @endif value="Accounting">Accounting</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agribusiness And Marketing') selected="selected" @endif value="Agribusiness And Marketing">Agribusiness And Marketing</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agricultural Botany') selected="selected" @endif value="Agricultural Botany">Agricultural Botany</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agricultural Extension And Information System') selected="selected" @endif value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agricultural Extension And Rural Development') selected="selected" @endif value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agricultural Extension Education') selected="selected" @endif value="Agricultural Extension Education">Agricultural Extension Education</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agricultural Statistics') selected="selected" @endif value="Agricultural Statistics">Agricultural Statistics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture And Mineral Sciences') selected="selected" @endif value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Chemistry') selected="selected" @endif value="Agriculture Chemistry">Agriculture Chemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Co-Operatives') selected="selected" @endif value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Economics') selected="selected" @endif value="Agriculture Economics">Agriculture Economics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Engineering') selected="selected" @endif value="Agriculture Engineering">Agriculture Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Finance') selected="selected" @endif value="Agriculture Finance">Agriculture Finance</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Marketing') selected="selected" @endif value="Agriculture Marketing">Agriculture Marketing</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Science') selected="selected" @endif value="Agriculture Science">Agriculture Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture Soil Science') selected="selected" @endif value="Agriculture Soil Science">Agriculture Soil Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agriculture') selected="selected" @endif value="Agriculture">Agriculture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agroforestry') selected="selected" @endif value="Agroforestry">Agroforestry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agronomy And Agricultural Extension') selected="selected" @endif value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agronomy') selected="selected" @endif value="Agronomy">Agronomy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Agrotechnology') selected="selected" @endif value="Agrotechnology">Agrotechnology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Al-Fiqh') selected="selected" @endif value="Al-Fiqh">Al-Fiqh</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Al-Hadith And Islamic Studies') selected="selected" @endif value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Al-Quran And Islamic Studies') selected="selected" @endif value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Anatomy And Histology') selected="selected" @endif value="Anatomy And Histology">Anatomy And Histology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Husbandry And Veterinary Science') selected="selected" @endif value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Husbandry') selected="selected" @endif value="Animal Husbandry">Animal Husbandry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Nutrition') selected="selected" @endif value="Animal Nutrition">Animal Nutrition</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Production And Biproduction Technology') selected="selected" @endif value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Production And Management') selected="selected" @endif value="Animal Production And Management">Animal Production And Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Science And Nutrition') selected="selected" @endif value="Animal Science And Nutrition">Animal Science And Nutrition</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Animal Science') selected="selected" @endif value="Animal Science">Animal Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Anthropology') selected="selected" @endif value="Anthropology">Anthropology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied And Environmental Chemistry') selected="selected" @endif value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Chemistry And Chemical Engineering') selected="selected" @endif value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Chemistry') selected="selected" @endif value="Applied Chemistry">Applied Chemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Linguisties & Elt') selected="selected" @endif value="Applied Linguisties & Elt">Applied Linguisties & Elt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Mathematics') selected="selected" @endif value="Applied Mathematics">Applied Mathematics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Physics And Electronic Engineering') selected="selected" @endif value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Physics') selected="selected" @endif value="Applied Physics">Applied Physics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Sciences And Technology') selected="selected" @endif value="Applied Sciences And Technology">Applied Sciences And Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Applied Statistics') selected="selected" @endif value="Applied Statistics">Applied Statistics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Aquaculture') selected="selected" @endif value="Aquaculture">Aquaculture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Arabic') selected="selected" @endif value="Arabic">Arabic</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Archaeology') selected="selected" @endif value="Archaeology">Archaeology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Architecture') selected="selected" @endif value="Architecture">Architecture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Arts') selected="selected" @endif value="Arts">Arts</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Astronomy') selected="selected" @endif value="Astronomy">Astronomy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Bangla') selected="selected" @endif value="Bangla">Bangla</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Banking And Insurance') selected="selected" @endif value="Banking And Insurance">Banking And Insurance</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Banking') selected="selected" @endif value="Banking">Banking</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Basic Science') selected="selected" @endif value="Basic Science">Basic Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biochemistry And Food Analysis') selected="selected" @endif value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biochemistry And Molicular Biology') selected="selected" @endif value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biochemistry') selected="selected" @endif value="Biochemistry">Biochemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biomedical Engineering') selected="selected" @endif value="Biomedical Engineering">Biomedical Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biomedical Phy And Tech') selected="selected" @endif value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biotechnology And Genetic Engineering') selected="selected" @endif value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Biotechnology') selected="selected" @endif value="Biotechnology">Biotechnology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Botany And Crop Science') selected="selected" @endif value="Botany And Crop Science">Botany And Crop Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Botany') selected="selected" @endif value="Botany">Botany</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Buddist Studies') selected="selected" @endif value="Buddist Studies">Buddist Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Business Administration') selected="selected" @endif value="Business Administration">Business Administration</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Chemical') selected="selected" @endif value="Chemical">Chemical</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Chemistry') selected="selected" @endif value="Chemistry">Chemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Civil') selected="selected" @endif value="Civil">Civil</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Clinical Psychology') selected="selected" @endif value="Clinical Psychology">Clinical Psychology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Communication Disorder') selected="selected" @endif value="Communication Disorder">Communication Disorder</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Community Health And Hygiene') selected="selected" @endif value="Community Health And Hygiene">Community Health And Hygiene</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Computer Science And Eng.') selected="selected" @endif value="Computer Science And Eng.">Computer Science And Eng.</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Computer Science') selected="selected" @endif value="Computer Science">Computer Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Criminology And Police Science') selected="selected" @endif value="Criminology And Police Science">Criminology And Police Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Criminology') selected="selected" @endif value="Criminology">Criminology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Crop Botany') selected="selected" @endif value="Crop Botany">Crop Botany</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Crop Science And Technology') selected="selected" @endif value="Crop Science And Technology">Crop Science And Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Dairy Science') selected="selected" @endif value="Dairy Science">Dairy Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Dawah And Islamic Studies') selected="selected" @endif value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Development And Proverty Studies') selected="selected" @endif value="Development And Proverty Studies">Development And Proverty Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Development Studies') selected="selected" @endif value="Development Studies">Development Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Disaster Management') selected="selected" @endif value="Disaster Management">Disaster Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Disaster Risk Mgt') selected="selected" @endif value="Disaster Risk Mgt">Disaster Risk Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Drama And Dramatics') selected="selected" @endif value="Drama And Dramatics">Drama And Dramatics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Drama And Music') selected="selected" @endif value="Drama And Music">Drama And Music</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Drama') selected="selected" @endif value="Drama">Drama</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Ecology') selected="selected" @endif value="Ecology">Ecology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Economics And Sociology') selected="selected" @endif value="Economics And Sociology">Economics And Sociology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Economics') selected="selected" @endif value="Economics">Economics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Education') selected="selected" @endif value="Education">Education</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Electrical And Electronics') selected="selected" @endif value="Electrical And Electronics">Electrical And Electronics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Electrical') selected="selected" @endif value="Electrical">Electrical</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Electronics And Communication Engineering') selected="selected" @endif value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Electronics') selected="selected" @endif value="Electronics">Electronics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Emergency Mgt') selected="selected" @endif value="Emergency Mgt">Emergency Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Engineering') selected="selected" @endif value="Engineering">Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'English') selected="selected" @endif value="English">English</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Entomology') selected="selected" @endif value="Entomology">Entomology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Environmental Sanitation') selected="selected" @endif value="Environmental Sanitation">Environmental Sanitation</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Environmental Science And Resource Management') selected="selected" @endif value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Environmental Science') selected="selected" @endif value="Environmental Science">Environmental Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Epidemiology') selected="selected" @endif value="Epidemiology">Epidemiology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Farm Power And Machinery') selected="selected" @endif value="Farm Power And Machinery">Farm Power And Machinery</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Farm Stucture And Environmental Engineering') selected="selected" @endif value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Farsi Language And Literature') selected="selected" @endif value="Farsi Language And Literature">Farsi Language And Literature</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fesheries Technology') selected="selected" @endif value="Fesheries Technology">Fesheries Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Finance And Banking') selected="selected" @endif value="Finance And Banking">Finance And Banking</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Finance') selected="selected" @endif value="Finance">Finance</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fine Art') selected="selected" @endif value="Fine Art">Fine Art</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fisheries And Marine Technology') selected="selected" @endif value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fisheries Biology And Genetics') selected="selected" @endif value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fisheries Mgt') selected="selected" @endif value="Fisheries Mgt">Fisheries Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Fisheries') selected="selected" @endif value="Fisheries">Fisheries</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Folklore') selected="selected" @endif value="Folklore">Folklore</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Food And Nutrition') selected="selected" @endif value="Food And Nutrition">Food And Nutrition</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Food Technology And Engineering') selected="selected" @endif value="Food Technology And Engineering">Food Technology And Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Food Technology And Nutritional Science') selected="selected" @endif value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Food Technology And Rural Industries') selected="selected" @endif value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Foood Microbiology') selected="selected" @endif value="Foood Microbiology">Foood Microbiology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Forestry And Environmental Sciences') selected="selected" @endif value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Forestry') selected="selected" @endif value="Forestry">Forestry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Foresty And Wood Technology') selected="selected" @endif value="Foresty And Wood Technology">Foresty And Wood Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Genetic Engineering And Biotechnology') selected="selected" @endif value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Genetics And Animal Breeding') selected="selected" @endif value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Genetics And Plant Breeding') selected="selected" @endif value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Genetics') selected="selected" @endif value="Genetics">Genetics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geo Information') selected="selected" @endif value="Geo Information">Geo Information</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geochemistry') selected="selected" @endif value="Geochemistry">Geochemistry</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geography') selected="selected" @endif value="Geography">Geography</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geological Sciences') selected="selected" @endif value="Geological Sciences">Geological Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geology And Mining') selected="selected" @endif value="Geology And Mining">Geology And Mining</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Geology') selected="selected" @endif value="Geology">Geology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Glass And Ceramic Engineering') selected="selected" @endif value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Government And Politics') selected="selected" @endif value="Government And Politics">Government And Politics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Health Economics') selected="selected" @endif value="Health Economics">Health Economics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'History') selected="selected" @endif value="History">History</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Home Economics') selected="selected" @endif value="Home Economics">Home Economics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Homeopathy') selected="selected" @endif value="Homeopathy">Homeopathy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Horticulture') selected="selected" @endif value="Horticulture">Horticulture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Human Nurition And Dietetics') selected="selected" @endif value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Human Resource Management') selected="selected" @endif value="Human Resource Management">Human Resource Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Human Right') selected="selected" @endif value="Human Right">Human Right</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Humanities(Hum)') selected="selected" @endif value="Humanities(Hum)">Humanities(Hum)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Industrial Production Engineering(Ipe)') selected="selected" @endif value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Industrial') selected="selected" @endif value="Industrial">Industrial</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Info. Sc. And  Library Management') selected="selected" @endif value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Information And Commun Eng') selected="selected" @endif value="Information And Commun Eng">Information And Commun Eng</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'International Business') selected="selected" @endif value="International Business">International Business</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'International Relation') selected="selected" @endif value="International Relation">International Relation</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Irrigation And Water Management') selected="selected" @endif value="Irrigation And Water Management">Irrigation And Water Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Is And Library Mgt') selected="selected" @endif value="Is And Library Mgt">Is And Library Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Islamic History And Culture') selected="selected" @endif value="Islamic History And Culture">Islamic History And Culture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Islamic Philosophy') selected="selected" @endif value="Islamic Philosophy">Islamic Philosophy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Islamic Studies') selected="selected" @endif value="Islamic Studies">Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Journalism And Media Studies') selected="selected" @endif value="Journalism And Media Studies">Journalism And Media Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Journalism') selected="selected" @endif value="Journalism">Journalism</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Laguages') selected="selected" @endif value="Laguages">Laguages</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Law And Muslim Jurisprudence') selected="selected" @endif value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Law') selected="selected" @endif value="Law">Law</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Leather Technology') selected="selected" @endif value="Leather Technology">Leather Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Life Sciences') selected="selected" @endif value="Life Sciences">Life Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Linguistics') selected="selected" @endif value="Linguistics">Linguistics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Livestock') selected="selected" @endif value="Livestock">Livestock</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Management And Business Administration') selected="selected" @endif value="Management And Business Administration">Management And Business Administration</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Management And Finance') selected="selected" @endif value="Management And Finance">Management And Finance</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Management Information System') selected="selected" @endif value="Management Information System">Management Information System</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Management') selected="selected" @endif value="Management">Management</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Marine Fisheries And Oceanography') selected="selected" @endif value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Marine') selected="selected" @endif value="Marine">Marine</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Marketing') selected="selected" @endif value="Marketing">Marketing</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Mass Commn. And Journalism') selected="selected" @endif value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Materials And Metallurgical Engineering(Mme)') selected="selected" @endif value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Materials Science') selected="selected" @endif value="Materials Science">Materials Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Mathematics') selected="selected" @endif value="Mathematics">Mathematics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Mbm') selected="selected" @endif value="Mbm">Mbm</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Mechanical') selected="selected" @endif value="Mechanical">Mechanical</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Media And Journalism') selected="selected" @endif value="Media And Journalism">Media And Journalism</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Medical Sciences') selected="selected" @endif value="Medical Sciences">Medical Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Medicine Surgery And Obstetrics') selected="selected" @endif value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Medicine') selected="selected" @endif value="Medicine">Medicine</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Microbiology And Virology') selected="selected" @endif value="Microbiology And Virology">Microbiology And Virology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Microbiology') selected="selected" @endif value="Microbiology">Microbiology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Modern Language') selected="selected" @endif value="Modern Language">Modern Language</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Music') selected="selected" @endif value="Music">Music</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Naval Architecture And Marine Engineering(Name)') selected="selected" @endif value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Neuroscience') selected="selected" @endif value="Neuroscience">Neuroscience</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Nutrition And Food Technology') selected="selected" @endif value="Nutrition And Food Technology">Nutrition And Food Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Others') selected="selected" @endif value="Others">Others</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pali(Oriental Language)') selected="selected" @endif value="Pali(Oriental Language)">Pali(Oriental Language)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Parasitology') selected="selected" @endif value="Parasitology">Parasitology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pathology And Paracytology') selected="selected" @endif value="Pathology And Paracytology">Pathology And Paracytology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pathology') selected="selected" @endif value="Pathology">Pathology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Peace And Conflict') selected="selected" @endif value="Peace And Conflict">Peace And Conflict</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Persian Language And Literature') selected="selected" @endif value="Persian Language And Literature">Persian Language And Literature</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Petroleum And Mineral Resources Engineering(Pmre)') selected="selected" @endif value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Petroleum And Mining Engineering(Pme)') selected="selected" @endif value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pharmacology And Toxicology') selected="selected" @endif value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pharmacology') selected="selected" @endif value="Pharmacology">Pharmacology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Pharmacy') selected="selected" @endif value="Pharmacy">Pharmacy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Philosophy') selected="selected" @endif value="Philosophy">Philosophy</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Physical Education And Sports Science(Pess)') selected="selected" @endif value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Physical Science') selected="selected" @endif value="Physical Science">Physical Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Physics') selected="selected" @endif value="Physics">Physics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Physiology And Pharmacology') selected="selected" @endif value="Physiology And Pharmacology">Physiology And Pharmacology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Physiology') selected="selected" @endif value="Physiology">Physiology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Plant Pathology') selected="selected" @endif value="Plant Pathology">Plant Pathology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Political Science') selected="selected" @endif value="Political Science">Political Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Political Studies And Public Adm') selected="selected" @endif value="Political Studies And Public Adm">Political Studies And Public Adm</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Population Science And Human Resource Development') selected="selected" @endif value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Population Science') selected="selected" @endif value="Population Science">Population Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Post Havest Technology') selected="selected" @endif value="Post Havest Technology">Post Havest Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Poultry Science') selected="selected" @endif value="Poultry Science">Poultry Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Production Economics') selected="selected" @endif value="Production Economics">Production Economics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Psychology') selected="selected" @endif value="Psychology">Psychology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Public Administration') selected="selected" @endif value="Public Administration">Public Administration</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Public Finance') selected="selected" @endif value="Public Finance">Public Finance</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Public Health') selected="selected" @endif value="Public Health">Public Health</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Resource Mgt') selected="selected" @endif value="Resource Mgt">Resource Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Sanskrit') selected="selected" @endif value="Sanskrit">Sanskrit</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Seed Science And Technology') selected="selected" @endif value="Seed Science And Technology">Seed Science And Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Social Science') selected="selected" @endif value="Social Science">Social Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Social Studies') selected="selected" @endif value="Social Studies">Social Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Social Welfare') selected="selected" @endif value="Social Welfare">Social Welfare</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Social Work') selected="selected" @endif value="Social Work">Social Work</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Sociology') selected="selected" @endif value="Sociology">Sociology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Soil Science') selected="selected" @endif value="Soil Science">Soil Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Statistics') selected="selected" @endif value="Statistics">Statistics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Surgery And Obstetrics') selected="selected" @endif value="Surgery And Obstetrics">Surgery And Obstetrics</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Surgery And Theriogenology') selected="selected" @endif value="Surgery And Theriogenology">Surgery And Theriogenology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Television And Film') selected="selected" @endif value="Television And Film">Television And Film</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Textile Technology') selected="selected" @endif value="Textile Technology">Textile Technology</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Theatre And Performance Studies') selected="selected" @endif value="Theatre And Performance Studies">Theatre And Performance Studies</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Theatre') selected="selected" @endif value="Theatre">Theatre</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Tourism And Hospitality Mgt') selected="selected" @endif value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Urban And Regional Planning(Urp)') selected="selected" @endif value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Urban And Rural Planning') selected="selected" @endif value="Urban And Rural Planning">Urban And Rural Planning</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Urdu') selected="selected" @endif value="Urdu">Urdu</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Vetenary Science') selected="selected" @endif value="Vetenary Science">Vetenary Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Water Resources Engineering(Wre)') selected="selected" @endif value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Water Science') selected="selected" @endif value="Water Science">Water Science</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Womens And Gender') selected="selected" @endif value="Womens And Gender">Womens And Gender</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'World Religions And Culture') selected="selected" @endif value="World Religions And Culture">World Religions And Culture</option>
                                            <option @if($singleEmployeeDetail->honors_group == 'Zoology') selected="selected" @endif value="Zoology">Zoology</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="honors_result" id="honors_result" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->honors_result == 'grade') selected="selected" @endif value="grade">Grade</option>
                                            <option @if($singleEmployeeDetail->honors_result == 'first') selected="selected" @endif value="first">First</option>
                                            <option @if($singleEmployeeDetail->honors_result == 'second') selected="selected" @endif value="second">Second</option>
                                        </select>
                                    </td>
                                    <td width="8%">
                                        <input class="form-control" placeholder="cgpa" type="text" value="{{ $singleEmployeeDetail->honors_cgpa }}" name="honors_cgpa" id="honors_cgpa"/>
                                    </td>
                                    <td width="8%">
                                        <input class="form-control" placeholder="scale" type="text" value="{{ $singleEmployeeDetail->honors_scale }}" name="honors_scale" id="honors_scale"/>
                                    </td>
                                    <td width="11%">
                                        <input class="form-control" placeholder="marks %" type="text" value="{{ $singleEmployeeDetail->honors_marks }}" name="honors_marks" id="honors_marks"/>
                                    </td>
                                    <td width="12%">
                                        <select name="honors_board" id="honors_board" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'ASA University Bangladesh') selected="selected" @endif value="ASA University Bangladesh">ASA University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Ahsania Mission University of Science and Technology') selected="selected" @endif value="Ahsania Mission University of Science and Technology">Ahsania Mission University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Ahsanullah University of Science and Technology') selected="selected" @endif value="Ahsanullah University of Science and Technology">Ahsanullah University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'American International University-Bangladesh') selected="selected" @endif value="American International University-Bangladesh">American International University-Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Anwer Khan Modern University') selected="selected" @endif value="Anwer Khan Modern University">Anwer Khan Modern University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Army University of Engineering and Technology (BAUET), Qadirabad, Natore') selected="selected" @endif value="Army University of Engineering and Technology (BAUET), Qadirabad, Natore">Army University of Engineering and Technology (BAUET), Qadirabad, Natore</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Asian University for Women') selected="selected" @endif value="Asian University for Women">Asian University for Women</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Asian University of Bangladesh') selected="selected" @endif value="Asian University of Bangladesh">Asian University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Atish Dipankar University of Science & Technology') selected="selected" @endif value="Atish Dipankar University of Science & Technology">Atish Dipankar University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'BGC Trust University Bangladesh') selected="selected" @endif value="BGC Trust University Bangladesh">BGC Trust University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'BGMEA University of Fashion & Technology(BUFT)') selected="selected" @endif value="BGMEA University of Fashion & Technology(BUFT)">BGMEA University of Fashion & Technology(BUFT)</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'BRAC University') selected="selected" @endif value="BRAC University">BRAC University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bandarban University') selected="selected" @endif value="Bandarban University">Bandarban University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangabandhu Sheikh Mujib Medical University') selected="selected" @endif value="Bangabandhu Sheikh Mujib Medical University">Bangabandhu Sheikh Mujib Medical University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangabandhu Sheikh Mujibur Rahman Agricultural University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Agricultural University">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangabandhu Sheikh Mujibur Rahman Digital University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Digital University">Bangabandhu Sheikh Mujibur Rahman Digital University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangabandhu Sheikh Mujibur Rahman Maritime University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Maritime University">Bangabandhu Sheikh Mujibur Rahman Maritime University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangabandhu Sheikh Mujibur Rahman Science & Technology University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Science & Technology University">Bangabandhu Sheikh Mujibur Rahman Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh Agricultural University') selected="selected" @endif value="Bangladesh Agricultural University">Bangladesh Agricultural University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla') selected="selected" @endif value="Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla">Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary') selected="selected" @endif value="Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary">Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh Islami University') selected="selected" @endif value="Bangladesh Islami University">Bangladesh Islami University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh Open University') selected="selected" @endif value="Bangladesh Open University">Bangladesh Open University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University') selected="selected" @endif value="Bangladesh University">Bangladesh University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University of Business & Technology') selected="selected" @endif value="Bangladesh University of Business & Technology">Bangladesh University of Business & Technology </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University of Engineering & Technology') selected="selected" @endif value="Bangladesh University of Engineering & Technology">Bangladesh University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University of Health Sciences') selected="selected" @endif value="Bangladesh University of Health Sciences">Bangladesh University of Health Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University of Professionals') selected="selected" @endif value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Bangladesh University of Textiles') selected="selected" @endif value="Bangladesh University of Textiles">Bangladesh University of Textiles </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Barisal University') selected="selected" @endif value="Barisal University">Barisal University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Begum Rokeya University') selected="selected" @endif value="Begum Rokeya University">Begum Rokeya University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'CCN University of Science & Technology') selected="selected" @endif value="CCN University of Science & Technology">CCN University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Canadian University of Bangladesh') selected="selected" @endif value="Canadian University of Bangladesh">Canadian University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Central University of Science and Technology') selected="selected" @endif value="Central University of Science and Technology">Central University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == "Central Women's University") selected="selected" @endif value="Central Women's University">Central Women's University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Chittagong Independent University') selected="selected" @endif value="Chittagong Independent University">Chittagong Independent University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Chittagong Medical University') selected="selected" @endif value="Chittagong Medical University">Chittagong Medical University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Chittagong University of Engineering & Technology') selected="selected" @endif value="Chittagong University of Engineering & Technology">Chittagong University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Chittagong Veterinary and Animal Sciences University') selected="selected" @endif value="Chittagong Veterinary and Animal Sciences University">Chittagong Veterinary and Animal Sciences University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'City University') selected="selected" @endif value="City University">City University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Comilla University') selected="selected" @endif value="Comilla University">Comilla University</option>
                                            <option @if($singleEmployeeDetail->honors_board == "Cox's Bazar International University") selected="selected" @endif value="Cox's Bazar International University">Cox's Bazar International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Daffodil International University') selected="selected" @endif value="Daffodil International University">Daffodil International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Dhaka International University') selected="selected" @endif value="Dhaka International University">Dhaka International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Dhaka University of Engineering & Technology') selected="selected" @endif value="Dhaka University of Engineering & Technology">Dhaka University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'East Delta University') selected="selected" @endif value="East Delta University">East Delta University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'East West University') selected="selected" @endif value="East West University">East West University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Eastern University') selected="selected" @endif value="Eastern University">Eastern University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'European University of Bangladesh') selected="selected" @endif value="European University of Bangladesh">European University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Exim Bank Agricultural University, Bangladesh') selected="selected" @endif value="Exim Bank Agricultural University, Bangladesh">Exim Bank Agricultural University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Fareast International University') selected="selected" @endif value="Fareast International University">Fareast International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Feni University') selected="selected" @endif value="Feni University">Feni University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'First Capital University of Bangladesh') selected="selected" @endif value="First Capital University of Bangladesh">First Capital University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Foreign University') selected="selected" @endif value="Foreign University">Foreign University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'German University Bangladesh') selected="selected" @endif value="German University Bangladesh">German University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Global University Bangladesh') selected="selected" @endif value="Global University Bangladesh">Global University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Green University of Bangladesh') selected="selected" @endif value="Green University of Bangladesh">Green University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Hajee Mohammad Danesh Science & Technology University') selected="selected" @endif value="Hajee Mohammad Danesh Science & Technology University">Hajee Mohammad Danesh Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Hamdard University Bangladesh') selected="selected" @endif value="Hamdard University Bangladesh">Hamdard University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Independent University, Bangladesh') selected="selected" @endif value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'International Islamic University Chittagong') selected="selected" @endif value="International Islamic University Chittagong">International Islamic University Chittagong</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'International Standard University') selected="selected" @endif value="International Standard University">International Standard University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'International University of Business Agriculture & Technology') selected="selected" @endif value="International University of Business Agriculture & Technology">International University of Business Agriculture & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Ishakha International University, Bangladesh') selected="selected" @endif value="Ishakha International University, Bangladesh">Ishakha International University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Islamic Arabic University') selected="selected" @endif value="Islamic Arabic University">Islamic Arabic University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Islamic University') selected="selected" @endif value="Islamic University">Islamic University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Islamic University of Technology, Gazipur') selected="selected" @endif value="Islamic University of Technology, Gazipur">Islamic University of Technology, Gazipur</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Jagannath University') selected="selected" @endif value="Jagannath University">Jagannath University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Jahangirnagar University') selected="selected" @endif value="Jahangirnagar University">Jahangirnagar University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Jatiya Kabi Kazi Nazrul Islam University') selected="selected" @endif value="Jatiya Kabi Kazi Nazrul Islam University">Jatiya Kabi Kazi Nazrul Islam University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Jessore University of Science & Technology') selected="selected" @endif value="Jessore University of Science & Technology">Jessore University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Khulna Khan Bahadur Ahsanullah University') selected="selected" @endif value="Khulna Khan Bahadur Ahsanullah University">Khulna Khan Bahadur Ahsanullah University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Khulna University') selected="selected" @endif value="Khulna University">Khulna University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Khulna University of Engineering and Technology') selected="selected" @endif value="Khulna University of Engineering and Technology">Khulna University of Engineering and Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Khwaja Yunus Ali University') selected="selected" @endif value="Khwaja Yunus Ali University">Khwaja Yunus Ali University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Leading University') selected="selected" @endif value="Leading University">Leading University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Manarat International University') selected="selected" @endif value="Manarat International University">Manarat International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Mawlana Bhashani Science & Technology University') selected="selected" @endif value="Mawlana Bhashani Science & Technology University">Mawlana Bhashani Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Metropolitan University') selected="selected" @endif value="Metropolitan University">Metropolitan University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'N.P.I University of Bangladesh') selected="selected" @endif value="N.P.I University of Bangladesh">N.P.I University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'National University') selected="selected" @endif value="National University">National University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Noakhali Science & Technology University') selected="selected" @endif value="Noakhali Science & Technology University">Noakhali Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'North Bengal International University') selected="selected" @endif value="North Bengal International University">North Bengal International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'North East University Bangladesh') selected="selected" @endif value="North East University Bangladesh">North East University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'North South University') selected="selected" @endif value="North South University">North South University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'North Western University') selected="selected" @endif value="North Western University">North Western University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Northern University Bangladesh') selected="selected" @endif value="Northern University Bangladesh">Northern University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Northern University of Business & Technology, Khulna') selected="selected" @endif value="Northern University of Business & Technology, Khulna">Northern University of Business & Technology, Khulna</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Notre Dame University Bangladesh') selected="selected" @endif value="Notre Dame University Bangladesh">Notre Dame University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Pabna University of Science and Technology') selected="selected" @endif value="Pabna University of Science and Technology">Pabna University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Patuakhali Science And Technology University') selected="selected" @endif value="Patuakhali Science And Technology University">Patuakhali Science And Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Port City International University') selected="selected" @endif value="Port City International University">Port City International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Presidency University') selected="selected" @endif value="Presidency University">Presidency University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Prime University') selected="selected" @endif value="Prime University">Prime University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Primeasia University') selected="selected" @endif value="Primeasia University">Primeasia University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Pundra University of Science & Technology') selected="selected" @endif value="Pundra University of Science & Technology">Pundra University of Science & Technology </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rabindra Maitree University, Kushtia') selected="selected" @endif value="Rabindra Maitree University, Kushtia">Rabindra Maitree University, Kushtia</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rabindra University, Bangladesh') selected="selected" @endif value="Rabindra University, Bangladesh">Rabindra University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rajshahi Medical University') selected="selected" @endif value="Rajshahi Medical University ">Rajshahi Medical University </option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rajshahi Science & Technology University (RSTU), Natore') selected="selected" @endif value="Rajshahi Science & Technology University (RSTU), Natore">Rajshahi Science & Technology University (RSTU), Natore</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rajshahi University of Engineering & Technology') selected="selected" @endif value="Rajshahi University of Engineering & Technology">Rajshahi University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Ranada Prasad Shaha University') selected="selected" @endif value="Ranada Prasad Shaha University">Ranada Prasad Shaha University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rangamati Science and Technology University') selected="selected" @endif value="Rangamati Science and Technology University">Rangamati Science and Technology University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Royal University of Dhaka') selected="selected" @endif value="Royal University of Dhaka">Royal University of Dhaka</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Rupayan A.K.M Shamsuzzoha University') selected="selected" @endif value="Rupayan A.K.M Shamsuzzoha University">Rupayan A.K.M Shamsuzzoha University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Shah Makhdum Management University, Rajshahi') selected="selected" @endif value="Shah Makhdum Management University, Rajshahi">Shah Makhdum Management University, Rajshahi</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Shahjalal University of Science & Technology') selected="selected" @endif value="Shahjalal University of Science & Technology">Shahjalal University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Shanto-Mariam University of Creative Technology') selected="selected" @endif value="Shanto-Mariam University of Creative Technology">Shanto-Mariam University of Creative Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Sheikh Fazilatunnesa Mujib University') selected="selected" @endif value="Sheikh Fazilatunnesa Mujib University">Sheikh Fazilatunnesa Mujib University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Sher-e-Bangla Agricultural University') selected="selected" @endif value="Sher-e-Bangla Agricultural University">Sher-e-Bangla Agricultural University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Sonargaon University') selected="selected" @endif value="Sonargaon University">Sonargaon University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Southeast University"') selected="selected" @endif value="Southeast University">Southeast University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Stamford University Bangladesh') selected="selected" @endif value="Stamford University Bangladesh">Stamford University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'State University of Bangladesh') selected="selected" @endif value="State University of Bangladesh">State University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Sylhet Agricultural University') selected="selected" @endif value="Sylhet Agricultural University">Sylhet Agricultural University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Tagore University of Creative Arts, Keranigonj, Bangladesh') selected="selected" @endif value="Tagore University of Creative Arts, Keranigonj, Bangladesh">Tagore University of Creative Arts, Keranigonj, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'The International University of Scholars') selected="selected" @endif value="The International University of Scholars">The International University of Scholars</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'The Millennium Universit') selected="selected" @endif value="The Millennium University">The Millennium University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'The University of Asia Pacific') selected="selected" @endif value="The University of Asia Pacific">The University of Asia Pacific</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Times University, Bangladesh') selected="selected" @endif value="Times University, Bangladesh">Times University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Trust University, Barishal') selected="selected" @endif value="Trust University, Barishal">Trust University, Barishal</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'United International University') selected="selected" @endif value="United International University">United International University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Chittagong') selected="selected" @endif value="University of Chittagong">University of Chittagong</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Creative Technology, Chittagong') selected="selected" @endif value="University of Creative Technology, Chittagong">University of Creative Technology, Chittagong</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Development Alternative') selected="selected" @endif value="University of Development Alternative">University of Development Alternative</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Dhaka') selected="selected" @endif value="University of Dhaka">University of Dhaka</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Global Village') selected="selected" @endif value="University of Global Village">University of Global Village</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Information Technology & Sciences') selected="selected" @endif value="University of Information Technology & Sciences">University of Information Technology & Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Liberal Arts Bangladesh') selected="selected" @endif value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'University of Rajshahi') selected="selected" @endif value="University of Rajshahi">University of Rajshahi</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Uttara University') selected="selected" @endif value="Uttara University">Uttara University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Varendra University') selected="selected" @endif value="Varendra University">Varendra University</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Victoria University of Bangladesh') selected="selected" @endif value="Victoria University of Bangladesh">Victoria University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'World University of Bangladesh') selected="selected" @endif value="World University of Bangladesh">World University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Z.H Sikder University of Science & Technology') selected="selected" @endif value="Z.H Sikder University of Science & Technology">Z.H Sikder University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Z.N.R.F. University of Management Sciences') selected="selected" @endif value="Z.N.R.F. University of Management Sciences">Z.N.R.F. University of Management Sciences</option>
                                            <option @if($singleEmployeeDetail->honors_board == 'Others') selected="selected" @endif value="Others">Others</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="honors_passing_year" value="{{ $singleEmployeeDetail->honors_passing_year }}" id="honors_passing_year"  placeholder="Years"/></td>
                                </tr>
                                <tr>
                                    <td>Post Graduation</td>
                                    <td>
                                        <select name="post_graduation_exam" id="post_graduation_exam" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MSc') selected="selected" @endif value="MSc">MSc</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MCom') selected="selected" @endif value="MCom">MCom</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MBS') selected="selected" @endif value="MBS">MBS</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MBA') selected="selected" @endif value="MBA">MBA</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MBM') selected="selected" @endif value="MBM">MBM</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MSS') selected="selected" @endif value="MSS">MSS</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MEng') selected="selected" @endif value="MEng">MEng.</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MA') selected="selected" @endif value="MA">MA</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MSS') selected="selected" @endif value="MSS">MSS</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MDS') selected="selected" @endif value="MDS">MDS</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MED') selected="selected" @endif value="MED">MED</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'M.Pharm') selected="selected" @endif value="M.Pharm">M.Pharm</option>
                                            <option @if($singleEmployeeDetail->post_graduation_exam == 'MOthers') selected="selected" @endif value="MOthers">Masters Others</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="post_graduation_group" id="post_graduation_group" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Accounting & Information System') selected="selected" @endif value="Accounting & Information System">Accounting & Information System</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Accounting') selected="selected" @endif value="Accounting">Accounting</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agribusiness And Marketing') selected="selected" @endif value="Agribusiness And Marketing">Agribusiness And Marketing</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agricultural Botany') selected="selected" @endif value="Agricultural Botany">Agricultural Botany</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agricultural Extension And Information System') selected="selected" @endif value="Agricultural Extension And Information System">Agricultural Extension And Information System</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agricultural Extension And Rural Development') selected="selected" @endif value="Agricultural Extension And Rural Development">Agricultural Extension And Rural Development</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agricultural Extension Education') selected="selected" @endif value="Agricultural Extension Education">Agricultural Extension Education</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agricultural Statistics') selected="selected" @endif value="Agricultural Statistics">Agricultural Statistics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture And Mineral Sciences') selected="selected" @endif value="Agriculture And Mineral Sciences">Agriculture And Mineral Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Chemistry') selected="selected" @endif value="Agriculture Chemistry">Agriculture Chemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Co-Operatives') selected="selected" @endif value="Agriculture Co-Operatives">Agriculture Co-Operatives</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Economics') selected="selected" @endif value="Agriculture Economics">Agriculture Economics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Engineering') selected="selected" @endif value="Agriculture Engineering">Agriculture Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Finance') selected="selected" @endif value="Agriculture Finance">Agriculture Finance</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Marketing') selected="selected" @endif value="Agriculture Marketing">Agriculture Marketing</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Science') selected="selected" @endif value="Agriculture Science">Agriculture Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture Soil Science') selected="selected" @endif value="Agriculture Soil Science">Agriculture Soil Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agriculture') selected="selected" @endif value="Agriculture">Agriculture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agroforestry') selected="selected" @endif value="Agroforestry">Agroforestry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agronomy And Agricultural Extension') selected="selected" @endif value="Agronomy And Agricultural Extension">Agronomy And Agricultural Extension</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agronomy') selected="selected" @endif value="Agronomy">Agronomy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Agrotechnology') selected="selected" @endif value="Agrotechnology">Agrotechnology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Al-Fiqh') selected="selected" @endif value="Al-Fiqh">Al-Fiqh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Al-Hadith And Islamic Studies') selected="selected" @endif value="Al-Hadith And Islamic Studies">Al-Hadith And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Al-Quran And Islamic Studies') selected="selected" @endif value="Al-Quran And Islamic Studies">Al-Quran And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Anatomy And Histology') selected="selected" @endif value="Anatomy And Histology">Anatomy And Histology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Husbandry And Veterinary Science') selected="selected" @endif value="Animal Husbandry And Veterinary Science">Animal Husbandry And Veterinary Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Husbandry') selected="selected" @endif value="Animal Husbandry">Animal Husbandry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Nutrition') selected="selected" @endif value="Animal Nutrition">Animal Nutrition</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Production And Biproduction Technology') selected="selected" @endif value="Animal Production And Biproduction Technology">Animal Production And Biproduction Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Production And Management') selected="selected" @endif value="Animal Production And Management">Animal Production And Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Science And Nutrition') selected="selected" @endif value="Animal Science And Nutrition">Animal Science And Nutrition</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Animal Science') selected="selected" @endif value="Animal Science">Animal Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Anthropology') selected="selected" @endif value="Anthropology">Anthropology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied And Environmental Chemistry') selected="selected" @endif value="Applied And Environmental Chemistry">Applied And Environmental Chemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Chemistry And Chemical Engineering') selected="selected" @endif value="Applied Chemistry And Chemical Engineering">Applied Chemistry And Chemical Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Chemistry') selected="selected" @endif value="Applied Chemistry">Applied Chemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Linguisties & Elt') selected="selected" @endif value="Applied Linguisties & Elt">Applied Linguisties & Elt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Mathematics') selected="selected" @endif value="Applied Mathematics">Applied Mathematics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Physics And Electronic Engineering') selected="selected" @endif value="Applied Physics And Electronic Engineering">Applied Physics And Electronic Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Physics') selected="selected" @endif value="Applied Physics">Applied Physics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Sciences And Technology') selected="selected" @endif value="Applied Sciences And Technology">Applied Sciences And Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Applied Statistics') selected="selected" @endif value="Applied Statistics">Applied Statistics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Aquaculture') selected="selected" @endif value="Aquaculture">Aquaculture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Arabic') selected="selected" @endif value="Arabic">Arabic</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Archaeology') selected="selected" @endif value="Archaeology">Archaeology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Architecture') selected="selected" @endif value="Architecture">Architecture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Arts') selected="selected" @endif value="Arts">Arts</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Astronomy') selected="selected" @endif value="Astronomy">Astronomy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Bangla') selected="selected" @endif value="Bangla">Bangla</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Banking And Insurance') selected="selected" @endif value="Banking And Insurance">Banking And Insurance</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Banking') selected="selected" @endif value="Banking">Banking</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Basic Science') selected="selected" @endif value="Basic Science">Basic Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biochemistry And Food Analysis') selected="selected" @endif value="Biochemistry And Food Analysis">Biochemistry And Food Analysis</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biochemistry And Molicular Biology') selected="selected" @endif value="Biochemistry And Molicular Biology">Biochemistry And Molicular Biology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biochemistry') selected="selected" @endif value="Biochemistry">Biochemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biomedical Engineering') selected="selected" @endif value="Biomedical Engineering">Biomedical Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biomedical Phy And Tech') selected="selected" @endif value="Biomedical Phy And Tech">Biomedical Phy And Tech</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biotechnology And Genetic Engineering') selected="selected" @endif value="Biotechnology And Genetic Engineering">Biotechnology And Genetic Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Biotechnology') selected="selected" @endif value="Biotechnology">Biotechnology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Botany And Crop Science') selected="selected" @endif value="Botany And Crop Science">Botany And Crop Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Botany') selected="selected" @endif value="Botany">Botany</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Buddist Studies') selected="selected" @endif value="Buddist Studies">Buddist Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Business Administration') selected="selected" @endif value="Business Administration">Business Administration</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Chemical') selected="selected" @endif value="Chemical">Chemical</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Chemistry') selected="selected" @endif value="Chemistry">Chemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Civil') selected="selected" @endif value="Civil">Civil</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Clinical Psychology') selected="selected" @endif value="Clinical Psychology">Clinical Psychology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Communication Disorder') selected="selected" @endif value="Communication Disorder">Communication Disorder</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Community Health And Hygiene') selected="selected" @endif value="Community Health And Hygiene">Community Health And Hygiene</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Computer Science And Eng.') selected="selected" @endif value="Computer Science And Eng.">Computer Science And Eng.</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Computer Science') selected="selected" @endif value="Computer Science">Computer Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Criminology And Police Science') selected="selected" @endif value="Criminology And Police Science">Criminology And Police Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Criminology') selected="selected" @endif value="Criminology">Criminology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Crop Botany') selected="selected" @endif value="Crop Botany">Crop Botany</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Crop Science And Technology') selected="selected" @endif value="Crop Science And Technology">Crop Science And Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Dairy Science') selected="selected" @endif value="Dairy Science">Dairy Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Dawah And Islamic Studies') selected="selected" @endif value="Dawah And Islamic Studies">Dawah And Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Development And Proverty Studies') selected="selected" @endif value="Development And Proverty Studies">Development And Proverty Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Development Studies') selected="selected" @endif value="Development Studies">Development Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Disaster Management') selected="selected" @endif value="Disaster Management">Disaster Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Disaster Risk Mgt') selected="selected" @endif value="Disaster Risk Mgt">Disaster Risk Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Drama And Dramatics') selected="selected" @endif value="Drama And Dramatics">Drama And Dramatics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Drama And Music') selected="selected" @endif value="Drama And Music">Drama And Music</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Drama') selected="selected" @endif value="Drama">Drama</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Ecology') selected="selected" @endif value="Ecology">Ecology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Economics And Sociology') selected="selected" @endif value="Economics And Sociology">Economics And Sociology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Economics') selected="selected" @endif value="Economics">Economics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Education') selected="selected" @endif value="Education">Education</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Electrical And Electronics') selected="selected" @endif value="Electrical And Electronics">Electrical And Electronics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Electrical') selected="selected" @endif value="Electrical">Electrical</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Electronics And Communication Engineering') selected="selected" @endif value="Electronics And Communication Engineering">Electronics And Communication Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Electronics') selected="selected" @endif value="Electronics">Electronics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Emergency Mgt') selected="selected" @endif value="Emergency Mgt">Emergency Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Engineering') selected="selected" @endif value="Engineering">Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'English') selected="selected" @endif value="English">English</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Entomology') selected="selected" @endif value="Entomology">Entomology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Environmental Sanitation') selected="selected" @endif value="Environmental Sanitation">Environmental Sanitation</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Environmental Science And Resource Management') selected="selected" @endif value="Environmental Science And Resource Management">Environmental Science And Resource Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Environmental Science') selected="selected" @endif value="Environmental Science">Environmental Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Epidemiology') selected="selected" @endif value="Epidemiology">Epidemiology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Farm Power And Machinery') selected="selected" @endif value="Farm Power And Machinery">Farm Power And Machinery</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Farm Stucture And Environmental Engineering') selected="selected" @endif value="Farm Stucture And Environmental Engineering">Farm Stucture And Environmental Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Farsi Language And Literature') selected="selected" @endif value="Farsi Language And Literature">Farsi Language And Literature</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fesheries Technology') selected="selected" @endif value="Fesheries Technology">Fesheries Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Finance And Banking') selected="selected" @endif value="Finance And Banking">Finance And Banking</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Finance') selected="selected" @endif value="Finance">Finance</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fine Art') selected="selected" @endif value="Fine Art">Fine Art</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fisheries And Marine Technology') selected="selected" @endif value="Fisheries And Marine Technology">Fisheries And Marine Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fisheries Biology And Genetics') selected="selected" @endif value="Fisheries Biology And Genetics">Fisheries Biology And Genetics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fisheries Mgt') selected="selected" @endif value="Fisheries Mgt">Fisheries Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Fisheries') selected="selected" @endif value="Fisheries">Fisheries</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Folklore') selected="selected" @endif value="Folklore">Folklore</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Food And Nutrition') selected="selected" @endif value="Food And Nutrition">Food And Nutrition</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Food Technology And Engineering') selected="selected" @endif value="Food Technology And Engineering">Food Technology And Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Food Technology And Nutritional Science') selected="selected" @endif value="Food Technology And Nutritional Science">Food Technology And Nutritional Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Food Technology And Rural Industries') selected="selected" @endif value="Food Technology And Rural Industries">Food Technology And Rural Industries</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Foood Microbiology') selected="selected" @endif value="Foood Microbiology">Foood Microbiology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Forestry And Environmental Sciences') selected="selected" @endif value="Forestry And Environmental Sciences">Forestry And Environmental Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Forestry') selected="selected" @endif value="Forestry">Forestry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Foresty And Wood Technology') selected="selected" @endif value="Foresty And Wood Technology">Foresty And Wood Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Genetic Engineering And Biotechnology') selected="selected" @endif value="Genetic Engineering And Biotechnology">Genetic Engineering And Biotechnology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Genetics And Animal Breeding') selected="selected" @endif value="Genetics And Animal Breeding">Genetics And Animal Breeding</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Genetics And Plant Breeding') selected="selected" @endif value="Genetics And Plant Breeding">Genetics And Plant Breeding</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Genetics') selected="selected" @endif value="Genetics">Genetics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geo Information') selected="selected" @endif value="Geo Information">Geo Information</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geochemistry') selected="selected" @endif value="Geochemistry">Geochemistry</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geography') selected="selected" @endif value="Geography">Geography</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geological Sciences') selected="selected" @endif value="Geological Sciences">Geological Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geology And Mining') selected="selected" @endif value="Geology And Mining">Geology And Mining</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Geology') selected="selected" @endif value="Geology">Geology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Glass And Ceramic Engineering') selected="selected" @endif value="Glass And Ceramic Engineering">Glass And Ceramic Engineering</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Government And Politics') selected="selected" @endif value="Government And Politics">Government And Politics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Health Economics') selected="selected" @endif value="Health Economics">Health Economics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'History') selected="selected" @endif value="History">History</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Home Economics') selected="selected" @endif value="Home Economics">Home Economics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Homeopathy') selected="selected" @endif value="Homeopathy">Homeopathy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Horticulture') selected="selected" @endif value="Horticulture">Horticulture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Human Nurition And Dietetics') selected="selected" @endif value="Human Nurition And Dietetics">Human Nurition And Dietetics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Human Resource Management') selected="selected" @endif value="Human Resource Management">Human Resource Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Human Right') selected="selected" @endif value="Human Right">Human Right</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Humanities(Hum)') selected="selected" @endif value="Humanities(Hum)">Humanities(Hum)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Industrial Production Engineering(Ipe)') selected="selected" @endif value="Industrial Production Engineering(Ipe)">Industrial Production Engineering(Ipe)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Industrial') selected="selected" @endif value="Industrial">Industrial</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Info. Sc. And  Library Management') selected="selected" @endif value="Info. Sc. And  Library Management">Info. Sc. And  Library Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Information And Commun Eng') selected="selected" @endif value="Information And Commun Eng">Information And Commun Eng</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'International Business') selected="selected" @endif value="International Business">International Business</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'International Relation') selected="selected" @endif value="International Relation">International Relation</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Irrigation And Water Management') selected="selected" @endif value="Irrigation And Water Management">Irrigation And Water Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Is And Library Mgt') selected="selected" @endif value="Is And Library Mgt">Is And Library Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Islamic History And Culture') selected="selected" @endif value="Islamic History And Culture">Islamic History And Culture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Islamic Philosophy') selected="selected" @endif value="Islamic Philosophy">Islamic Philosophy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Islamic Studies') selected="selected" @endif value="Islamic Studies">Islamic Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Journalism And Media Studies') selected="selected" @endif value="Journalism And Media Studies">Journalism And Media Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Journalism') selected="selected" @endif value="Journalism">Journalism</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Laguages') selected="selected" @endif value="Laguages">Laguages</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Law And Muslim Jurisprudence') selected="selected" @endif value="Law And Muslim Jurisprudence">Law And Muslim Jurisprudence</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Law') selected="selected" @endif value="Law">Law</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Leather Technology') selected="selected" @endif value="Leather Technology">Leather Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Life Sciences') selected="selected" @endif value="Life Sciences">Life Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Linguistics') selected="selected" @endif value="Linguistics">Linguistics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Livestock') selected="selected" @endif value="Livestock">Livestock</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Management And Business Administration') selected="selected" @endif value="Management And Business Administration">Management And Business Administration</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Management And Finance') selected="selected" @endif value="Management And Finance">Management And Finance</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Management Information System') selected="selected" @endif value="Management Information System">Management Information System</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Management') selected="selected" @endif value="Management">Management</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Marine Fisheries And Oceanography') selected="selected" @endif value="Marine Fisheries And Oceanography">Marine Fisheries And Oceanography</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Marine') selected="selected" @endif value="Marine">Marine</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Marketing') selected="selected" @endif value="Marketing">Marketing</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Mass Commn. And Journalism') selected="selected" @endif value="Mass Commn. And Journalism">Mass Commn. And Journalism</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Materials And Metallurgical Engineering(Mme)') selected="selected" @endif value="Materials And Metallurgical Engineering(Mme)">Materials And Metallurgical Engineering(Mme)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Materials Science') selected="selected" @endif value="Materials Science">Materials Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Mathematics') selected="selected" @endif value="Mathematics">Mathematics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Mbm') selected="selected" @endif value="Mbm">Mbm</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Mechanical') selected="selected" @endif value="Mechanical">Mechanical</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Media And Journalism') selected="selected" @endif value="Media And Journalism">Media And Journalism</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Medical Sciences') selected="selected" @endif value="Medical Sciences">Medical Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Medicine Surgery And Obstetrics') selected="selected" @endif value="Medicine Surgery And Obstetrics">Medicine Surgery And Obstetrics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Medicine') selected="selected" @endif value="Medicine">Medicine</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Microbiology And Virology') selected="selected" @endif value="Microbiology And Virology">Microbiology And Virology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Microbiology') selected="selected" @endif value="Microbiology">Microbiology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Modern Language') selected="selected" @endif value="Modern Language">Modern Language</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Music') selected="selected" @endif value="Music">Music</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Naval Architecture And Marine Engineering(Name)') selected="selected" @endif value="Naval Architecture And Marine Engineering(Name)">Naval Architecture And Marine Engineering(Name)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Neuroscience') selected="selected" @endif value="Neuroscience">Neuroscience</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Nutrition And Food Technology') selected="selected" @endif value="Nutrition And Food Technology">Nutrition And Food Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Others') selected="selected" @endif value="Others">Others</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pali(Oriental Language)') selected="selected" @endif value="Pali(Oriental Language)">Pali(Oriental Language)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Parasitology') selected="selected" @endif value="Parasitology">Parasitology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pathology And Paracytology') selected="selected" @endif value="Pathology And Paracytology">Pathology And Paracytology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pathology') selected="selected" @endif value="Pathology">Pathology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Peace And Conflict') selected="selected" @endif value="Peace And Conflict">Peace And Conflict</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Persian Language And Literature') selected="selected" @endif value="Persian Language And Literature">Persian Language And Literature</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Petroleum And Mineral Resources Engineering(Pmre)') selected="selected" @endif value="Petroleum And Mineral Resources Engineering(Pmre)">Petroleum And Mineral Resources Engineering(Pmre)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Petroleum And Mining Engineering(Pme)') selected="selected" @endif value="Petroleum And Mining Engineering(Pme)">Petroleum And Mining Engineering(Pme)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pharmacology And Toxicology') selected="selected" @endif value="Pharmacology And Toxicology">Pharmacology And Toxicology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pharmacology') selected="selected" @endif value="Pharmacology">Pharmacology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Pharmacy') selected="selected" @endif value="Pharmacy">Pharmacy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Philosophy') selected="selected" @endif value="Philosophy">Philosophy</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Physical Education And Sports Science(Pess)') selected="selected" @endif value="Physical Education And Sports Science(Pess)">Physical Education And Sports Science(Pess)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Physical Science') selected="selected" @endif value="Physical Science">Physical Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Physics') selected="selected" @endif value="Physics">Physics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Physiology And Pharmacology') selected="selected" @endif value="Physiology And Pharmacology">Physiology And Pharmacology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Physiology') selected="selected" @endif value="Physiology">Physiology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Plant Pathology') selected="selected" @endif value="Plant Pathology">Plant Pathology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Political Science') selected="selected" @endif value="Political Science">Political Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Political Studies And Public Adm') selected="selected" @endif value="Political Studies And Public Adm">Political Studies And Public Adm</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Population Science And Human Resource Development') selected="selected" @endif value="Population Science And Human Resource Development">Population Science And Human Resource Development</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Population Science') selected="selected" @endif value="Population Science">Population Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Post Havest Technology') selected="selected" @endif value="Post Havest Technology">Post Havest Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Poultry Science') selected="selected" @endif value="Poultry Science">Poultry Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Production Economics') selected="selected" @endif value="Production Economics">Production Economics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Psychology') selected="selected" @endif value="Psychology">Psychology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Public Administration') selected="selected" @endif value="Public Administration">Public Administration</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Public Finance') selected="selected" @endif value="Public Finance">Public Finance</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Public Health') selected="selected" @endif value="Public Health">Public Health</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Resource Mgt') selected="selected" @endif value="Resource Mgt">Resource Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Sanskrit') selected="selected" @endif value="Sanskrit">Sanskrit</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Seed Science And Technology') selected="selected" @endif value="Seed Science And Technology">Seed Science And Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Social Science') selected="selected" @endif value="Social Science">Social Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Social Studies') selected="selected" @endif value="Social Studies">Social Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Social Welfare') selected="selected" @endif value="Social Welfare">Social Welfare</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Social Work') selected="selected" @endif value="Social Work">Social Work</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Sociology') selected="selected" @endif value="Sociology">Sociology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Soil Science') selected="selected" @endif value="Soil Science">Soil Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Statistics') selected="selected" @endif value="Statistics">Statistics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Surgery And Obstetrics') selected="selected" @endif value="Surgery And Obstetrics">Surgery And Obstetrics</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Surgery And Theriogenology') selected="selected" @endif value="Surgery And Theriogenology">Surgery And Theriogenology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Television And Film') selected="selected" @endif value="Television And Film">Television And Film</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Textile Technology') selected="selected" @endif value="Textile Technology">Textile Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Theatre And Performance Studies') selected="selected" @endif value="Theatre And Performance Studies">Theatre And Performance Studies</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Theatre') selected="selected" @endif value="Theatre">Theatre</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Tourism And Hospitality Mgt') selected="selected" @endif value="Tourism And Hospitality Mgt">Tourism And Hospitality Mgt</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Urban And Regional Planning(Urp)') selected="selected" @endif value="Urban And Regional Planning(Urp)">Urban And Regional Planning(Urp)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Urban And Rural Planning') selected="selected" @endif value="Urban And Rural Planning">Urban And Rural Planning</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Urdu') selected="selected" @endif value="Urdu">Urdu</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Vetenary Science') selected="selected" @endif value="Vetenary Science">Vetenary Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Water Resources Engineering(Wre)') selected="selected" @endif value="Water Resources Engineering(Wre)">Water Resources Engineering(Wre)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Water Science') selected="selected" @endif value="Water Science">Water Science</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Womens And Gender') selected="selected" @endif value="Womens And Gender">Womens And Gender</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'World Religions And Culture') selected="selected" @endif value="World Religions And Culture">World Religions And Culture</option>
                                            <option @if($singleEmployeeDetail->post_graduation_group == 'Zoology') selected="selected" @endif value="Zoology">Zoology</option>
                                        </select>
                                    </td>
                                    <td width="12%">
                                        <select name="post_graduation_result" id="post_graduation_result" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->post_graduation_result == 'grade') selected="selected" @endif value="grade">Grade</option>
                                            <option @if($singleEmployeeDetail->post_graduation_result == 'first') selected="selected" @endif value="first">First</option>
                                            <option @if($singleEmployeeDetail->post_graduation_result == 'second') selected="selected" @endif value="second">Second</option>
                                        </select>
                                    </td>
                                    <td width="8%">
                                        <input class="form-control" placeholder="cgpa" value="{{ $singleEmployeeDetail->post_graduation_cgpa }}" type="text" name="post_graduation_cgpa" id="post_graduation_cgpa"/>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" placeholder="scale" type="text" value="{{ $singleEmployeeDetail->post_graduation_scale }}" name="post_graduation_scale" id="post_graduation_scale"/>
                                    </td>
                                    <td width="11%">
                                        <input  class="form-control" placeholder="marks %" type="text" value="{{ $singleEmployeeDetail->post_graduation_marks }}" name="post_graduation_marks" id="post_graduation_marks"/>
                                    </td>
                                    <td>
                                        <select name="post_graduation_board" id="post_graduation_board" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'ASA University Bangladesh') selected="selected" @endif value="ASA University Bangladesh">ASA University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Ahsania Mission University of Science and Technology') selected="selected" @endif value="Ahsania Mission University of Science and Technology">Ahsania Mission University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Ahsanullah University of Science and Technology') selected="selected" @endif value="Ahsanullah University of Science and Technology">Ahsanullah University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'American International University-Bangladesh') selected="selected" @endif value="American International University-Bangladesh">American International University-Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Anwer Khan Modern University') selected="selected" @endif value="Anwer Khan Modern University">Anwer Khan Modern University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Army University of Engineering and Technology (BAUET), Qadirabad, Natore') selected="selected" @endif value="Army University of Engineering and Technology (BAUET), Qadirabad, Natore">Army University of Engineering and Technology (BAUET), Qadirabad, Natore</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Asian University for Women') selected="selected" @endif value="Asian University for Women">Asian University for Women</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Asian University of Bangladesh') selected="selected" @endif value="Asian University of Bangladesh">Asian University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Atish Dipankar University of Science & Technology') selected="selected" @endif value="Atish Dipankar University of Science & Technology">Atish Dipankar University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'BGC Trust University Bangladesh') selected="selected" @endif value="BGC Trust University Bangladesh">BGC Trust University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'BGMEA University of Fashion & Technology(BUFT)') selected="selected" @endif value="BGMEA University of Fashion & Technology(BUFT)">BGMEA University of Fashion & Technology(BUFT)</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'BRAC University') selected="selected" @endif value="BRAC University">BRAC University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bandarban University') selected="selected" @endif value="Bandarban University">Bandarban University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangabandhu Sheikh Mujib Medical University') selected="selected" @endif value="Bangabandhu Sheikh Mujib Medical University">Bangabandhu Sheikh Mujib Medical University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangabandhu Sheikh Mujibur Rahman Agricultural University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Agricultural University">Bangabandhu Sheikh Mujibur Rahman Agricultural University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangabandhu Sheikh Mujibur Rahman Digital University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Digital University">Bangabandhu Sheikh Mujibur Rahman Digital University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangabandhu Sheikh Mujibur Rahman Maritime University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Maritime University">Bangabandhu Sheikh Mujibur Rahman Maritime University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangabandhu Sheikh Mujibur Rahman Science & Technology University') selected="selected" @endif value="Bangabandhu Sheikh Mujibur Rahman Science & Technology University">Bangabandhu Sheikh Mujibur Rahman Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh Agricultural University') selected="selected" @endif value="Bangladesh Agricultural University">Bangladesh Agricultural University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla') selected="selected" @endif value="Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla">Bangladesh Army International University of Science & Technology(BAIUST) ,Comilla</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary') selected="selected" @endif value="Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary">Bangladesh Army University of Science and Technology(BAUST), Saidpur, Nilphamary</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh Islami University') selected="selected" @endif value="Bangladesh Islami University">Bangladesh Islami University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh Open University') selected="selected" @endif value="Bangladesh Open University">Bangladesh Open University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University') selected="selected" @endif value="Bangladesh University">Bangladesh University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University of Business & Technology') selected="selected" @endif value="Bangladesh University of Business & Technology">Bangladesh University of Business & Technology </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University of Engineering & Technology') selected="selected" @endif value="Bangladesh University of Engineering & Technology">Bangladesh University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University of Health Sciences') selected="selected" @endif value="Bangladesh University of Health Sciences">Bangladesh University of Health Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University of Professionals') selected="selected" @endif value="Bangladesh University of Professionals">Bangladesh University of Professionals</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Bangladesh University of Textiles') selected="selected" @endif value="Bangladesh University of Textiles">Bangladesh University of Textiles </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Barisal University') selected="selected" @endif value="Barisal University">Barisal University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Begum Rokeya University') selected="selected" @endif value="Begum Rokeya University">Begum Rokeya University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'CCN University of Science & Technology') selected="selected" @endif value="CCN University of Science & Technology">CCN University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Canadian University of Bangladesh') selected="selected" @endif value="Canadian University of Bangladesh">Canadian University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Central University of Science and Technology') selected="selected" @endif value="Central University of Science and Technology">Central University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == "Central Women's University") selected="selected" @endif value="Central Women's University">Central Women's University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Chittagong Independent University') selected="selected" @endif value="Chittagong Independent University">Chittagong Independent University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Chittagong Medical University') selected="selected" @endif value="Chittagong Medical University">Chittagong Medical University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Chittagong University of Engineering & Technology') selected="selected" @endif value="Chittagong University of Engineering & Technology">Chittagong University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Chittagong Veterinary and Animal Sciences University') selected="selected" @endif value="Chittagong Veterinary and Animal Sciences University">Chittagong Veterinary and Animal Sciences University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'City University') selected="selected" @endif value="City University">City University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Comilla University') selected="selected" @endif value="Comilla University">Comilla University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == "Cox's Bazar International University") selected="selected" @endif value="Cox's Bazar International University">Cox's Bazar International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Daffodil International University') selected="selected" @endif value="Daffodil International University">Daffodil International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Dhaka International University') selected="selected" @endif value="Dhaka International University">Dhaka International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Dhaka University of Engineering & Technology') selected="selected" @endif value="Dhaka University of Engineering & Technology">Dhaka University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'East Delta University') selected="selected" @endif value="East Delta University">East Delta University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'East West University') selected="selected" @endif value="East West University">East West University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Eastern University') selected="selected" @endif value="Eastern University">Eastern University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'European University of Bangladesh') selected="selected" @endif value="European University of Bangladesh">European University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Exim Bank Agricultural University, Bangladesh') selected="selected" @endif value="Exim Bank Agricultural University, Bangladesh">Exim Bank Agricultural University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Fareast International University') selected="selected" @endif value="Fareast International University">Fareast International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Feni University') selected="selected" @endif value="Feni University">Feni University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'First Capital University of Bangladesh') selected="selected" @endif value="First Capital University of Bangladesh">First Capital University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Foreign University') selected="selected" @endif value="Foreign University">Foreign University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'German University Bangladesh') selected="selected" @endif value="German University Bangladesh">German University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Global University Bangladesh') selected="selected" @endif value="Global University Bangladesh">Global University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Green University of Bangladesh') selected="selected" @endif value="Green University of Bangladesh">Green University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Hajee Mohammad Danesh Science & Technology University') selected="selected" @endif value="Hajee Mohammad Danesh Science & Technology University">Hajee Mohammad Danesh Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Hamdard University Bangladesh') selected="selected" @endif value="Hamdard University Bangladesh">Hamdard University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Independent University, Bangladesh') selected="selected" @endif value="Independent University, Bangladesh">Independent University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'International Islamic University Chittagong') selected="selected" @endif value="International Islamic University Chittagong">International Islamic University Chittagong</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'International Standard University') selected="selected" @endif value="International Standard University">International Standard University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'International University of Business Agriculture & Technology') selected="selected" @endif value="International University of Business Agriculture & Technology">International University of Business Agriculture & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Ishakha International University, Bangladesh') selected="selected" @endif value="Ishakha International University, Bangladesh">Ishakha International University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Islamic Arabic University') selected="selected" @endif value="Islamic Arabic University">Islamic Arabic University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Islamic University') selected="selected" @endif value="Islamic University">Islamic University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Islamic University of Technology, Gazipur') selected="selected" @endif value="Islamic University of Technology, Gazipur">Islamic University of Technology, Gazipur</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Jagannath University') selected="selected" @endif value="Jagannath University">Jagannath University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Jahangirnagar University') selected="selected" @endif value="Jahangirnagar University">Jahangirnagar University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Jatiya Kabi Kazi Nazrul Islam University') selected="selected" @endif value="Jatiya Kabi Kazi Nazrul Islam University">Jatiya Kabi Kazi Nazrul Islam University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Jessore University of Science & Technology') selected="selected" @endif value="Jessore University of Science & Technology">Jessore University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Khulna Khan Bahadur Ahsanullah University') selected="selected" @endif value="Khulna Khan Bahadur Ahsanullah University">Khulna Khan Bahadur Ahsanullah University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Khulna University') selected="selected" @endif value="Khulna University">Khulna University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Khulna University of Engineering and Technology') selected="selected" @endif value="Khulna University of Engineering and Technology">Khulna University of Engineering and Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Khwaja Yunus Ali University') selected="selected" @endif value="Khwaja Yunus Ali University">Khwaja Yunus Ali University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Leading University') selected="selected" @endif value="Leading University">Leading University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Manarat International University') selected="selected" @endif value="Manarat International University">Manarat International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Mawlana Bhashani Science & Technology University') selected="selected" @endif value="Mawlana Bhashani Science & Technology University">Mawlana Bhashani Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Metropolitan University') selected="selected" @endif value="Metropolitan University">Metropolitan University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'N.P.I University of Bangladesh') selected="selected" @endif value="N.P.I University of Bangladesh">N.P.I University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'National University') selected="selected" @endif value="National University">National University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Noakhali Science & Technology University') selected="selected" @endif value="Noakhali Science & Technology University">Noakhali Science & Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'North Bengal International University') selected="selected" @endif value="North Bengal International University">North Bengal International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'North East University Bangladesh') selected="selected" @endif value="North East University Bangladesh">North East University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'North South University') selected="selected" @endif value="North South University">North South University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'North Western University') selected="selected" @endif value="North Western University">North Western University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Northern University Bangladesh') selected="selected" @endif value="Northern University Bangladesh">Northern University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Northern University of Business & Technology, Khulna') selected="selected" @endif value="Northern University of Business & Technology, Khulna">Northern University of Business & Technology, Khulna</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Notre Dame University Bangladesh') selected="selected" @endif value="Notre Dame University Bangladesh">Notre Dame University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Pabna University of Science and Technology') selected="selected" @endif value="Pabna University of Science and Technology">Pabna University of Science and Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Patuakhali Science And Technology University') selected="selected" @endif value="Patuakhali Science And Technology University">Patuakhali Science And Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Port City International University') selected="selected" @endif value="Port City International University">Port City International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Presidency University') selected="selected" @endif value="Presidency University">Presidency University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Prime University') selected="selected" @endif value="Prime University">Prime University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Primeasia University') selected="selected" @endif value="Primeasia University">Primeasia University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Pundra University of Science & Technology') selected="selected" @endif value="Pundra University of Science & Technology">Pundra University of Science & Technology </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rabindra Maitree University, Kushtia') selected="selected" @endif value="Rabindra Maitree University, Kushtia">Rabindra Maitree University, Kushtia</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rabindra University, Bangladesh') selected="selected" @endif value="Rabindra University, Bangladesh">Rabindra University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rajshahi Medical University') selected="selected" @endif value="Rajshahi Medical University ">Rajshahi Medical University </option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rajshahi Science & Technology University (RSTU), Natore') selected="selected" @endif value="Rajshahi Science & Technology University (RSTU), Natore">Rajshahi Science & Technology University (RSTU), Natore</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rajshahi University of Engineering & Technology') selected="selected" @endif value="Rajshahi University of Engineering & Technology">Rajshahi University of Engineering & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Ranada Prasad Shaha University') selected="selected" @endif value="Ranada Prasad Shaha University">Ranada Prasad Shaha University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rangamati Science and Technology University') selected="selected" @endif value="Rangamati Science and Technology University">Rangamati Science and Technology University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Royal University of Dhaka') selected="selected" @endif value="Royal University of Dhaka">Royal University of Dhaka</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Rupayan A.K.M Shamsuzzoha University') selected="selected" @endif value="Rupayan A.K.M Shamsuzzoha University">Rupayan A.K.M Shamsuzzoha University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Shah Makhdum Management University, Rajshahi') selected="selected" @endif value="Shah Makhdum Management University, Rajshahi">Shah Makhdum Management University, Rajshahi</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Shahjalal University of Science & Technology') selected="selected" @endif value="Shahjalal University of Science & Technology">Shahjalal University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Shanto-Mariam University of Creative Technology') selected="selected" @endif value="Shanto-Mariam University of Creative Technology">Shanto-Mariam University of Creative Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Sheikh Fazilatunnesa Mujib University') selected="selected" @endif value="Sheikh Fazilatunnesa Mujib University">Sheikh Fazilatunnesa Mujib University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Sher-e-Bangla Agricultural University') selected="selected" @endif value="Sher-e-Bangla Agricultural University">Sher-e-Bangla Agricultural University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Sonargaon University') selected="selected" @endif value="Sonargaon University">Sonargaon University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Southeast University"') selected="selected" @endif value="Southeast University">Southeast University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Stamford University Bangladesh') selected="selected" @endif value="Stamford University Bangladesh">Stamford University Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'State University of Bangladesh') selected="selected" @endif value="State University of Bangladesh">State University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Sylhet Agricultural University') selected="selected" @endif value="Sylhet Agricultural University">Sylhet Agricultural University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Tagore University of Creative Arts, Keranigonj, Bangladesh') selected="selected" @endif value="Tagore University of Creative Arts, Keranigonj, Bangladesh">Tagore University of Creative Arts, Keranigonj, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'The International University of Scholars') selected="selected" @endif value="The International University of Scholars">The International University of Scholars</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'The Millennium Universit') selected="selected" @endif value="The Millennium University">The Millennium University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'The University of Asia Pacific') selected="selected" @endif value="The University of Asia Pacific">The University of Asia Pacific</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Times University, Bangladesh') selected="selected" @endif value="Times University, Bangladesh">Times University, Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Trust University, Barishal') selected="selected" @endif value="Trust University, Barishal">Trust University, Barishal</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'United International University') selected="selected" @endif value="United International University">United International University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Chittagong') selected="selected" @endif value="University of Chittagong">University of Chittagong</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Creative Technology, Chittagong') selected="selected" @endif value="University of Creative Technology, Chittagong">University of Creative Technology, Chittagong</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Development Alternative') selected="selected" @endif value="University of Development Alternative">University of Development Alternative</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Dhaka') selected="selected" @endif value="University of Dhaka">University of Dhaka</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Global Village') selected="selected" @endif value="University of Global Village">University of Global Village</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Information Technology & Sciences') selected="selected" @endif value="University of Information Technology & Sciences">University of Information Technology & Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Liberal Arts Bangladesh') selected="selected" @endif value="University of Liberal Arts Bangladesh">University of Liberal Arts Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'University of Rajshahi') selected="selected" @endif value="University of Rajshahi">University of Rajshahi</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Uttara University') selected="selected" @endif value="Uttara University">Uttara University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Varendra University') selected="selected" @endif value="Varendra University">Varendra University</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Victoria University of Bangladesh') selected="selected" @endif value="Victoria University of Bangladesh">Victoria University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'World University of Bangladesh') selected="selected" @endif value="World University of Bangladesh">World University of Bangladesh</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Z.H Sikder University of Science & Technology') selected="selected" @endif value="Z.H Sikder University of Science & Technology">Z.H Sikder University of Science & Technology</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Z.N.R.F. University of Management Sciences') selected="selected" @endif value="Z.N.R.F. University of Management Sciences">Z.N.R.F. University of Management Sciences</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'Others') selected="selected" @endif value="Others">Others</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $singleEmployeeDetail->post_graduation_passing_year }}" class="form-control" name="post_graduation_passing_year" id="post_graduation_passing_year"  placeholder="Years"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>
                                        <input type="text" value="{{ $singleEmployeeDetail->other_graduation_exam }}" name="other_graduation_exam" id="other_graduation_exam" class="form-control" placeholder="Exam name"/>
                                    </td>
                                    <td width="12%">
                                        <input type="text" value="{{ $singleEmployeeDetail->other_graduation_group }}" name="other_graduation_group" id="other_graduation_group" class="form-control" placeholder="Group name"/>
                                    </td>
                                    <td width="12%">
                                        <select name="other_graduation_result" id="other_graduation_result" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'grade') selected="selected" @endif value="grade">Grade</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'first') selected="selected" @endif value="first">First</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'second') selected="selected" @endif value="second">Second</option>
                                            <option @if($singleEmployeeDetail->post_graduation_board == 'cc') selected="selected" @endif  value="cc">CC</option>
                                        </select>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" placeholder="cgpa" type="text" value="{{ $singleEmployeeDetail->other_graduation_cgpa }}" name="other_graduation_cgpa" id="other_graduation_cgpa"/>
                                    </td>
                                    <td width="8%">
                                        <input  class="form-control" placeholder="scale" type="text" value="{{ $singleEmployeeDetail->other_graduation_scale }}" name="other_graduation_scale" id="other_graduation_scale"/>
                                    </td>
                                    <td width="11%">
                                        <input  class="form-control" placeholder="marks %" type="text" value="{{ $singleEmployeeDetail->other_graduation_marks }}" name="other_graduation_marks" id="other_graduation_marks"/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $singleEmployeeDetail->other_graduation_board }}" name="other_graduation_board" id="other_graduation_board" placeholder="University"/>
                                    </td>
                                    <td><input type="text" class="form-control" value="{{ $singleEmployeeDetail->other_graduation_passing_year }}" name="other_graduation_passing_year" id="other_graduation_passing_year" placeholder="Years"/></td>
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
                                    <td><input type="text" value="{{ $singleEmployeeDetail->eOrganizationNameOne }}" name="eOrganizationNameOne" id="eOrganizationNameOne" class="form-control"/></td>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->edesignationOne }}" name="edesignationOne" id="edesignationOne" class="form-control"/></td>
                                    <td width="18%">
                                        <select name="eJobTypeOne" id="eJobTypeOne" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->eJobTypeOne == 'fulltime') selected="selected" @endif value="fulltime">Full Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeOne == 'parttime') selected="selected" @endif value="parttime">Part Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeOne == 'contractual') selected="selected" @endif value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->eResponsibilitiesOne }}" name="eResponsibilitiesOne" id="eResponsibilitiesOne" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" value="{{ $singleEmployeeDetail->eJoiningDateOne }}" name="eJoiningDateOne" id="eJoiningDateOne" class="form-control"/></td>
                                    <td>
                                        <input type="date"  value="{{ $singleEmployeeDetail->eReleaseDateOne }}" name="eReleaseDateOne" id="eReleaseDateOne" class="form-control"/>
                                        <input type="checkbox" value="{{ $singleEmployeeDetail->eRunningDateOne }}" name="eRunningDateOne" id="eRunningDateOne"/> To continue
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->eOrganizationNameTwo }}" name="eOrganizationNameTwo" id="eOrganizationNameTwo" class="form-control"/></td>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->edesignationTwo }}" name="edesignationTwo" id="edesignationTwo" class="form-control"/></td>
                                    <td>
                                        <select name="eJobTypeTwo" id="eJobTypeTwo" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->eJobTypeTwo == 'fulltime') selected="selected" @endif value="fulltime">Full Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeTwo == 'parttime') selected="selected" @endif value="parttime">Part Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeTwo == 'contractual') selected="selected" @endif value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->eResponsibilitiesTwo }}" name="eResponsibilitiesTwo" id="eResponsibilitiesTwo" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" value="{{ $singleEmployeeDetail->eJoiningDateTwo }}" name="eJoiningDateTwo" id="eJoiningDateTwo" class="form-control"/></td>
                                    <td>
                                        <input type="date" value="{{ $singleEmployeeDetail->eReleaseDateTwo }}" name="eReleaseDateTwo" id="eReleaseDateTwo" class="form-control"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->eOrganizationNameThree }}" name="eOrganizationNameThree" id="eOrganizationNameThree" class="form-control"/></td>
                                    <td><input type="text" value="{{ $singleEmployeeDetail->edesignationThree }}" name="edesignationThree" id="edesignationThree" class="form-control"/></td>
                                    <td>
                                        <select name="eJobTypeThree" id="eJobTypeThree" class="form-control">
                                            <option value="0">Select</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'fulltime') selected="selected" @endif value="fulltime">Full Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'parttime') selected="selected" @endif value="parttime">Part Time</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'contractual') selected="selected" @endif value="contractual">Contractual</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="eResponsibilitiesThree" value="{{ $singleEmployeeDetail->eResponsibilitiesThree }}" id="eResponsibilitiesThree" class="form-control" placeholder="Maximum 500 Character"/></td>
                                    <td><input type="date" name="eJoiningDateThree" value="{{ $singleEmployeeDetail->eJoiningDateThree }}" id="eJoiningDateThree" class="form-control"/></td>
                                    <td>
                                        <input type="date" name="eReleaseDateThree" value="{{ $singleEmployeeDetail->eReleaseDateThree }}" id="eReleaseDateThree" class="form-control"/>
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
                                        <select name="bSpeaking" id="bSpeaking" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->bSpeaking == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->bSpeaking == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->bSpeaking == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bReading" id="bReading" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->bReading == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->bReading == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->bReading == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bListening" id="bListening" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->bListening == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->bListening == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->bListening == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="bWriting" id="bWriting" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->bWriting == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->bWriting == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->bWriting == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>English</td>
                                    <td>
                                        <select name="eSpeaking" id="eSpeaking" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->eSpeaking == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->eSpeaking == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->eSpeaking == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eReading" id="eReading" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->eReading == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->eReading == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->eReading == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eListening" id="eListening" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->eListening == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->eListening == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->eListening == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="eWriting" id="eWriting" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->eWriting == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->eWriting == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->eWriting == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="other_language" id="other_language"/></td>
                                    <td>
                                        <select name="oSpeaking" id="oSpeaking" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->oSpeaking == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->oSpeaking == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->oSpeaking == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oReading" id="oReading" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->eJobTypeThree == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oListening" id="oListening" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->oListening == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->oListening == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->oListening == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="oWriting" id="oWriting" class="form-control">
                                            <option value="0">--Select--</option>
                                            <option @if($singleEmployeeDetail->oWriting == 'H') selected="selected" @endif value="H">High</option>
                                            <option @if($singleEmployeeDetail->oWriting == 'M') selected="selected" @endif value="M">Medium</option>
                                            <option @if($singleEmployeeDetail->oWriting == 'L') selected="selected" @endif value="L">Low</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Skills</legend>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="skills" id="skills" placeholder="Please input your skills Like: C , C++ , C# , Java, Php, Python, Mysql, Software Testing , Customer Management, CA, MS office , Marketing">{{ $singleEmployeeDetail->skills }}</textarea>
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
                                            <span class="font-weight-bold text-secondary">References 1<span class="text-danger">*</span></span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-6">
                                            <label for="referencesNameOne">Name<span class="required text-danger">*</span></label>
                                            <input type="text" value="{{ $singleEmployeeDetail->referencesNameOne }}" id="referencesNameOne" name="referencesNameOne"  class="form-control">
                                            <span class="text-danger" id="referencesNameOne_check">{{ $errors->has('referencesNameOne') ? $errors->first('referencesNameOne') : ' ' }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referencesMobileOne">Mobile<span class="required text-danger">*</span></label>
                                            <input maxlength="11" value="{{ $singleEmployeeDetail->referencesMobileOne }}" type="text" id="referencesMobileOne" name="referencesMobileOne"  class="form-control">
                                            <span class="text-danger" id="referencesMobileOne_check">{{ $errors->has('referencesMobileOne') ? $errors->first('referencesMobileOne') : ' ' }}</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesEmailOne">Email<span class="required text-danger">*</span></label>
                                            <input type="text" value="{{ $singleEmployeeDetail->referencesEmailOne }}" id="referencesEmailOne" name="referencesEmailOne"  class="form-control">
                                            <span class="text-danger" id="referencesEmailOne_check">{{ $errors->has('referencesEmailOne') ? $errors->first('referencesEmailOne') : ' ' }}</span>
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesAddressOne">Address (max 200 char)<span class="required text-danger">*</span></label>
                                            <textarea maxlength="200" class="form-control" name="referencesAddressOne" id="referencesAddressOne">{{ $singleEmployeeDetail->referencesAddressOne }}</textarea>
                                            <span class="text-danger" id="referencesAddressOne_check">{{ $errors->has('referencesAddressOne') ? $errors->first('referencesAddressOne') : ' ' }}</span>
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
                                            <label for="referencesNameTwo">Name</label>
                                            <input type="text" id="referencesNameTwo" value="{{ $singleEmployeeDetail->referencesNameTwo }}" name="referencesNameTwo" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="referencesMobileTwo">Mobile</label>
                                            <input type="text" value="{{ $singleEmployeeDetail->referencesMobileTwo }}" id="referencesMobileTwo" name="referencesMobileTwo"  class="form-control">
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesEmailTwo">Email</label>
                                            <input type="text" value="{{ $singleEmployeeDetail->referencesEmailTwo }}" id="referencesEmailTwo" name="referencesEmailTwo"  class="form-control">
                                        </div>
                                        <div class="mt-3 col-md-12"></div>
                                        <div class="col-md-12">
                                            <label for="referencesAddressTwo">Address (max 200 char)</label>
                                            <textarea class="form-control" name="referencesAddressTwo" id="referencesAddressTwo">{{ $singleEmployeeDetail->referencesAddressTwo }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mt-3 col-md-12"></div>

                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Photogrphy<span class="text-danger">*</span></legend>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="form-group text-center">
                                        <img src="{{ asset($singleEmployeeDetail->photo) }}" alt="User Photo" width="100" height="100">
                                        <p class="empty-message">Please upload photo </p>
                                        <span class="text-danger" id="photo_check">{{ $errors->has('photo') ? $errors->first('photo') : ' ' }}</span>
                                        <input class="file-back form-control" id="photo" name="photo" type="file" accept="image/*"><br/>
                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-1">
                                    <div class="form-group text-center signature">
                                        <img style="border:1px solid #ddd;" src="{{ asset($singleEmployeeDetail->signature) }}" alt="User Photo" width="300" height="80">
                                        <p class="empty-message"> Please upload Signature here </p>
                                        <span class="text-danger" id="signature_check">{{ $errors->has('signature') ? $errors->first('signature') : ' ' }}</span>
                                        <input class="file-back form-control" id="signature" name="signature" type="file" accept="image/*"><br/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-md-4 text-center">
                                    <input type="submit" class="btn btn-success" name="applyOnlineSubmit" id="applyOnlineSubmit" value="Update">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <script>
            document.forms['singleEmployeeInfoUpdate'].elements['gender'].value = '{{ $singleEmployeeDetail->gender }}';
            document.forms['singleEmployeeInfoUpdate'].elements['marital_status'].value = '{{ $singleEmployeeDetail->marital_status }}';
        </script>
    </div>
@endsection