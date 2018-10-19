@extends('front-end.master')
@section('body')
    <div class="front-end-content bg-white pl-4 pt-3 pr-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="applyOnlineContent">
                    {{ Form::open(['route'=>'save-onlineApply-one','method'=>'POST','class'=>'form-horizontal','name'=>'onlineApplyFormOne','id'=>'onlineApplyFormOne']) }}
                    <div class="form-group">
                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Personal Info</legend>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="first_name">First Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="first_name" name="first_name"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="last_name">Last Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="last_name" name="last_name"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="father_name">Father's Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="father_name" name="father_name"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="mother_name">Mother's Name <span class="required text-danger">*</span></label>
                                    <input type="text" id="mother_name" name="mother_name"  class="form-control">
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="dob">Date of birth <span class="required text-danger">*</span></label>
                                <input type="date" id="dob" name="dob"  class="form-control">
                            </div>
                                <div class="col-md-3">
                                    <label for="gender">Gender <span class="required text-danger">*</span></label>
                                    <select name="gender" class="form-control">
                                        <option> --- Select Gender --- </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="religion">Religion <span class="required text-danger">*</span></label>
                                    <input type="text" id="religion" name="religion"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="marital_status">Marital Status<span class="required text-danger">*</span></label>
                                    <select name="marital_status" class="form-control" >
                                        <option value="Unmarried" selected>Unmarried</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-3">
                                    <label for="nationality">Nationality<span class="required text-danger">*</span></label>
                                    <input type="text" id="nationality" name="nationality"  readonly value="Bangladeshi" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="national_id_no">National Id No<span class="required text-danger">*</span></label>
                                    <input type="text" id="national_id_no" name="national_id_no"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="mobile_number">Mobile<span class="required text-danger">*</span></label>
                                    <input type="text" id="mobile_number" name="mobile_number"  class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Email Address<span class="required text-danger">*</span></label>
                                    <input type="email" id="email_address" name="email_address"  class="form-control">
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-6">
                                    <label for="present_address">Present Address<span class="required text-danger">*</span></label>
                                    <textarea name="present_address" id="present_address" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="permanent_address">Permanent Address<span class="required text-danger">*</span></label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control"></textarea>
                                </div>
                                <div class="mt-3 col-md-12"></div>
                                <div class="col-md-2 offset-10">
                                    <input type="submit" name="formOne" value="Continue" class="btn btn-success">
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